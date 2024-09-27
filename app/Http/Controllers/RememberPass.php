<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

use Mail;

class RememberPass extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = array();
        $data['seller_email'] = $request->seller_email;

        $sellermailchk = DB::table('sellers')
                ->where('seller_email', $data['seller_email'])
                ->first();

        if ($sellermailchk) {

            function generateRandomString($length = 6) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $randpass = generateRandomString();

            Session::put('pass', $randpass);
            Session::put('data', $data);

            Mail::send('seller.seller_page.remember.rememberpass', $data, function ($message) use ($data) {
                $message->to($data['seller_email']);
                $message->subject('Reset Password');
            });

            $data['password'] = md5($randpass);

            $sellermailupdt = DB::table('sellers')
                    ->where('seller_email', $data['seller_email'])
                    ->update(['password' => $data['password']]);

            Session::put('message', 'Please Cheak Your Email!');
            return Redirect::to('/seller');
        } else {
            Session::put('exception', 'Email Do not Match. Try Again!');
            return Redirect::to('/seller');
        }
    }

    public function adminrememberpass(Request $request) {
        $data = array();
        $data['admin_email'] = $request->admin_email;

        $adminrmailchk = DB::table('tbl_admins')
                ->where('admin_email' , $data['admin_email'])
                ->first();

        if ($adminrmailchk) {

            function generateRandomString($length = 6) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $randpass = generateRandomString();

            Session::put('pass', $randpass);
            Session::put('data', $data);

            Mail::send('admin.admin_page.mails.resetpass', $data, function ($message) use ($data) {
                $message->to($data['admin_email']);
                $message->subject('Reset Password');
            });

            $data['password'] = md5($randpass);

            $sellermailupdt = DB::table('tbl_admins')
                    ->where('admin_email', $data['admin_email'])
                    ->update(['password' => $data['password']]);

            Session::put('message', 'Please Cheak Your Email!');
            return Redirect::to('/admin');
        } else {
            Session::put('exception', 'Email Do not Match. Try Again!');
            return Redirect::to('/admin');
        }
    }

}
