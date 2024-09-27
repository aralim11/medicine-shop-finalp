<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Session;

session_start();

class LogInCheck extends Controller {


    public function adminCheck(Request $request) {
        $admin_email = $request->email;
        $password = $request->password;

        $admin_info = DB::table('tbl_admins')
                ->where('admin_email', $admin_email)
                ->where('password', md5($password))
                ->first();


        if ($admin_info) {
            Session::put('admin_id', $admin_info->admin_id);
            Session::put('admin_name', $admin_info->admin_name);
            return Redirect::to('/admin-dash');
        } else {
            Session::put('exception', 'Email or Password Wrong!');
            return Redirect::to('/admin');
        }
    }
    
    
    public function sellerlogin_check(Request $request) {
        $seller_email = $request->seller_email;
        $password = $request->password;
       

        $seller_info = DB::table('sellers')
                ->where('seller_email', $seller_email)
                ->where('password', md5($password))
                ->first();
        
        if ($seller_info) {
            Session::put('seller_id', $seller_info->seller_id);
            Session::put('seller_name', $seller_info->seller_name);
            Session::put('shop_name', $seller_info->shop_name);
            Session::put('seller_label', $seller_info->seller_label);
            return Redirect::to('/seller-dash');
        } else {
            Session::put('exception', 'Email or Password Wrong!');
            return Redirect::to('/seller');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
