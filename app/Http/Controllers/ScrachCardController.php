<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ScrachCard;
use Image;
class ScrachCardController extends Controller
{
    //
    public function index()
    {
        try {
            if (session('adminusername')) {

                $data['scrach']=ScrachCard::orderBy('id', 'desc')  
                                ->get();
                return view('scrach-card/index',$data);
                
                 }
                    else {
                         return redirect('/my-admin');
                    }
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }

    public function create()
    {
        try {
            if (session('adminusername')) {
           
                return view('scrach-card/create');
                 }
                    else {
                         return redirect('/my-admin');
                    }
          
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
    public function store(Request $request)
    {
      
        $data = request()->validate([
            'name' => 'required',
            'image'=>'required'
        ]);
        try {
           
            $photo = $request->file('image'); 
    $storyimagename = time().'.'.$photo->getClientOriginalExtension();
    $destinationPath = 'uploads/scrach';
    $thumb_img = Image::make($photo->getRealPath())->resize(117,99);
    $thumb_img->save($destinationPath.'/'.$storyimagename,80);

    ScrachCard::insert([

'name'=>$request->input('name'),
'image' => $storyimagename,
]);

$request->session()->flash('succ','Successfully Added New Category');
return back();

    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }

   
   
    public function delete_scrach($id,Request $request)
    {
        try {
            ScrachCard::where('id','=',$id)->delete();       
           
            $request->session()->flash('succ','Succesfully Deleted!');
            return redirect('scrach-card/index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
