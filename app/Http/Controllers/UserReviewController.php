<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use Illuminate\Support\Facades\Auth;
class UserReviewController extends Controller
{
    //
   
    public function user_reviews()
    {
         if (session('adminusername')) {
        $data['review'] = Review::orderBy('created_at', 'desc')      
                            ->get();

        return view('review.index',$data);
        }else {
             return redirect('/my-admin');
        }
    }
    
    public function edit_review_status($id)
    {
        if (session('adminusername')) {
        $data['edit_review'] =Review::where('review_id','=',$id)
                            ->get();
                       
        return view('review.edit',$data);
        }else {
             return redirect('/my-admin');
        }
    }
    
    public function update_review(Request $request)
    {
        $review_id = $request->input('review_id');
        $status = $request->input('re_status');
    
        Review::where('review_id','=',$review_id)->update([
            'review_status' => $status
    
        ]);
    
        return redirect('/user_reviews');
    }
    
    public function delete_review($id)
    {
    
        Review::where('review_id','=',$id)->delete();
            return redirect('user_reviews');
    
    }
      
    
}
