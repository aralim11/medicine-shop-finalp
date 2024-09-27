<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    
        public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id != NULL) {
            return Redirect::to('/seller-dash')->send();
        }
    }
    

     public function index() {

        $this->auth_check();
        
        return view('seller.login');
    }
    
   
    
    

          
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
