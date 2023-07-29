<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherMenuController extends Controller
{
    //
    public function about_us()
    {
        try {
            return view('frontend.about-us'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
    public function contact_us()
    {
        try {
            return view('frontend.contact-us'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
    public function delivery_info()
    {
        try {
            return view('frontend.delivery-policy'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
    public function privacy_policy()
    {
        try {
            return view('frontend.privacy'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
    public function terms_condition()
    {
        try {
            return view('frontend.terms'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
    public function return_policies()
    {
        try {
            return view('frontend.return'); 
        } catch (\Exception $e) {

            return $e->getMessage();
           }
    }
}
