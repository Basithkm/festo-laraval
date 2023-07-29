<?php

namespace App\Observers;

use App\Models\CustomerRegistration;
use App\Models\User;
use App\Models\BranchScheme;
use App\Models\SchemeWeek;
use App\Models\CustomerWeek;
use App\Models\MeCollection;
use App\Models\MeTargetAnnual;
use App\Models\MeTargetMonthly;
use App\Models\FestoYear;
use App\Models\FestoMonth;
use App\Models\Settings;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Hash;
use App\Models\OtpMobile;
class CustomerRegistrationObserver
{
    /**
     * Handle the CustomerRegistration "created" event.
     *
     * @param  \App\Models\CustomerRegistration  $customerRegistration
     * @return void
     */
    public function created(CustomerRegistration $customerRegistration)
    {
        //
        $user =new  User;
        $user->name=$customerRegistration->name;
        $user->email=$customerRegistration->mobile.'@fezto';
        $user->username=$customerRegistration->mobile.'@fezto';
        $user->mobile=$customerRegistration->mobile;
        $user->usertype='customer';
        $user->password=Hash::make($customerRegistration->password);
        $user->save();
        
        $Settings=Settings::first();
        if($Settings){
            if($customerRegistration->referral==0){$commission=$Settings->joining_amount;}else{$commission=$Settings->refral_amount_staff;}
        }
        else{
            $commission=0;
        }
        $customerRegistration=CustomerRegistration::find($customerRegistration->id);
        $customerRegistration->commission=$commission;
        $customerRegistration->account_id=$user->id;
        $customerRegistration->save();

        $mobb = $customerRegistration->whatsapp_no;
        $moble = "91".$mobb;
        $string   = '1234567890'; //otp
        $string_shuffled = str_shuffle($string);
        $otp = substr($string_shuffled, 1, 6);
        $OtMob=new OtpMobile;
        $OtMob->user_id=$user->id;
        $OtMob->otp=$otp;
        $OtMob->save();
        $userotp=$otp;
        
        
           $message = "$userotp is the One Time Password (OTP) for your registration to the Fezto Golden Scheme . OTP is valid for next 10 minutes.";
        $message = urlencode($message);
        
        $homepage = file_get_contents("https://dealsms.in/api/send.php?number=$moble&type=text&message=$message&instance_id=641300AA1F054&access_token=ffadfdf8a154f87367c47a66ad73279c");
        
        // $homepage = file_get_contents("https://dealsms.in/api/send.php?number=$moble&type=text&message=$message&instance_id=640885BACDD45&access_token=783c698eef4306a2d370c9de3862744c");
        
        //   //Your authentication key
        //   $authKey = "387078Aw17qnDl063a19a68P1";

        //   //Multiple mobiles numbers separated by comma
        //   $mobileNumber = $moble;

        //   //Sender ID,While using route4 sender id should be 6 characters long.
        //   $senderId = "msgind";

        //   //Your message to send, Add URL encoding here.
        //   $message = "$userotp.Dear Customer, Kindly use this One Time Password(OTP)";
        //   $message = urlencode($message);

        //   //Define route 
        //   $route = "default";
        //   //Prepare you post parameters
        //   $postData = array(
        //       'authkey' => $authKey,
        //       'mobiles' => $mobileNumber,
        //       'message' => $message,
        //       'sender' => $senderId,
        //       'route' => $route
        //   );
        //     //API URL
        //     $url="http://api.msg91.com/api/sendotp.php?authkey=$authKey&mobile=$mobileNumber&message=$message&sender=$senderId&otp=$userotp";

        //     // init the resource
        //     $ch = curl_init();
        //     curl_setopt_array($ch, array(
        //         CURLOPT_URL => $url,
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_POST => true,
        //         CURLOPT_POSTFIELDS => $postData
        //         //,CURLOPT_FOLLOWLOCATION => true
        //     ));



        //     //Ignore SSL certificate verification
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //     //get response
        //     $output = curl_exec($ch);

        //     //Print error if any
        //     if(curl_errno($ch))
        //     {
        //         echo 'error:' . curl_error($ch);
        //     }

        //     curl_close($ch);

        $branchScheme=BranchScheme::find($customerRegistration->scheme_id);
        $branchScheme->scheme_members=$branchScheme->scheme_members+1;
        $branchScheme->save();
        
        for($i = 1;$i<=$branchScheme->scheme_duration;$i++)
        {
          
            $customerweek =new CustomerWeek;
            $customerweek->customer_id=$user->id;
            $customerweek->week_id='Week'.$i;
            $customerweek->scheme_id=$branchScheme->id;
            $customerweek->cluster_id=$customerRegistration->cluster_id;
            $customerweek->branch_id=$customerRegistration->branch_id;
            $customerweek->save();

        }
        $customerweek =CustomerWeek::where('scheme_id',$branchScheme->id)->where('customer_id',$user->id)->where('week_id','Week1')->first();
        $customerweek->paid=1;
        $customerweek->paid_type='CASH';
        $customerweek->colleted_amount=200;
        $customerweek->colleted_user_id=$customerRegistration->under_of_user;
        $customerweek->colleted_date=date('Y-m-d', strtotime($customerRegistration->created_at));
        $customerweek->colleted_day=$customerRegistration->created_at->format('l');
        $customerweek->save();
$today=Carbon::now();

        $exist=MeCollection::where('user_id',$customerRegistration->under_of_user)->where('date',$today)->where('payment_status','pending')->first();
        if($exist)
        {
            $MeCollection=MeCollection::where('user_id',$customerRegistration->under_of_user)->where('payment_status','pending')->where('date',$today)->first();
            $MeCollection->amount=$MeCollection->amount+200;
            $MeCollection->save();
        }
        else{
            $MeCollection=new MeCollection;
            $MeCollection->user_id=$customerRegistration->under_of_user;
            $MeCollection->date=$today;
            $MeCollection->amount=200;
            $MeCollection->cluster_id=$customerRegistration->cluster_id;
            $MeCollection->branch_id=$customerRegistration->branch_id;
            $MeCollection->scheme_id=0;
            $MeCollection->save();
        }
         $cu_year=FestoYear::where('status',1)->first();
        $MeTargetAnnual=MeTargetAnnual::where('user_id',$customerRegistration->under_of_user)->where('year_id',$cu_year->id)->first();
        if($MeTargetAnnual){
            $MeTargetAnnual=MeTargetAnnual::where('user_id',$customerRegistration->under_of_user)->where('year_id',$cu_year->id)->first();
            $MeTargetAnnual->archived=$MeTargetAnnual->archived+1;
            $MeTargetAnnual->save();
        }
//         else{
//             $MeTargetAnnual= new MeTargetAnnual;
//             $MeTargetAnnual->user_id=$customerRegistration->under_of_user;
//             $MeTargetAnnual->year_id=$cu_year->id;
//             $MeTargetAnnual->target=0;
//             $MeTargetAnnual->archived=1;
//             $MeTargetAnnual->cluster_id=$customerRegistration->cluster_id;
//             $MeTargetAnnual->branch_id=$customerRegistration->branch_id;
//             $MeTargetAnnual->status=1;
//             $MeTargetAnnual->save();
// }
            $today=Carbon::now();

            $MeTargetMonthly=MeTargetMonthly::where('user_id',$customerRegistration->under_of_user)->where('year_id',$cu_year->id)->where('year',$today->year)->where('month_id',$today->month)->first();
            if($MeTargetMonthly){
                $MeTargetMonthly=MeTargetMonthly::where('user_id',$customerRegistration->under_of_user)->where('year_id',$cu_year->id)->where('year',$today->year)->where('month_id',$today->month)->first();
                $MeTargetMonthly->archived=$MeTargetAnnual->archived+1;
                $MeTargetMonthly->save();
            }
            // else
            // {
            //     $MeTargetMonthly=new MeTargetMonthly;
            //     $MeTargetMonthly->user_id=$customerRegistration->under_of_user;
            //     $MeTargetMonthly->year_id=$cu_year->id;
            //     $MeTargetMonthly->year=$today->year;
            //     $MeTargetMonthly->month_id=$today->month;
            //     $MeTargetMonthly->target=0;
            //     $MeTargetMonthly->archived=1;
            //     $MeTargetMonthly->cluster_id=$customerRegistration->cluster_id;
            //     $MeTargetMonthly->branch_id=$customerRegistration->branch_id;
            //     $MeTargetMonthly->status=1;
            //     $MeTargetMonthly->save();
            // }
        
    }

    /**
     * Handle the CustomerRegistration "updated" event.
     *
     * @param  \App\Models\CustomerRegistration  $customerRegistration
     * @return void
     */
    public function updated(CustomerRegistration $customerRegistration)
    {
        //
    }

    /**
     * Handle the CustomerRegistration "deleted" event.
     *
     * @param  \App\Models\CustomerRegistration  $customerRegistration
     * @return void
     */
    public function deleted(CustomerRegistration $customerRegistration)
    {
        //
    }

    /**
     * Handle the CustomerRegistration "restored" event.
     *
     * @param  \App\Models\CustomerRegistration  $customerRegistration
     * @return void
     */
    public function restored(CustomerRegistration $customerRegistration)
    {
        //
    }

    /**
     * Handle the CustomerRegistration "force deleted" event.
     *
     * @param  \App\Models\CustomerRegistration  $customerRegistration
     * @return void
     */
    public function forceDeleted(CustomerRegistration $customerRegistration)
    {
        //
    }
}
