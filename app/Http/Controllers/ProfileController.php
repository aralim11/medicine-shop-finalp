<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }


    public function index()
    {
        $this->auth_check();
        $seller_id = Session::get('seller_id');

            $viewProfile = DB::table('sellers')
                ->join('districts', 'sellers.seller_district', '=' , 'districts.district_id')
                ->join('pstations', 'sellers.seller_policeStation', '=' , 'pstations.pstation_id')
                ->select('sellers.*' , 'districts.district_name' , 'pstations.pstation_name')
                ->where('sellers.seller_id', $seller_id)
                ->first();

        $profile = view('seller.seller_page.profile.profile')
            ->with('viewProfile', $viewProfile);

        return view('seller.sellerMaster')
            ->with('seller_main_comtent', $profile);
    }


    public function edit()
    {
        $this->auth_check();
        $seller_id = Session::get('seller_id');

        $sellerDataById = DB::table('sellers')
            ->join('districts', 'sellers.seller_district', '=' , 'districts.district_id')
            ->join('pstations', 'sellers.seller_policeStation', '=' , 'pstations.pstation_id')
            ->select('sellers.*' , 'districts.district_name' , 'pstations.pstation_name')
            ->where('seller_id' , $seller_id)
            ->first();

        $editProfile = view('seller.seller_page.profile.editProfile')
            ->with('sellerDataById', $sellerDataById);

        return view('seller.sellerMaster')
            ->with('seller_main_comtent', $editProfile);
    }


    public function update(Request $request)
    {
        $this->auth_check();
        $seller_id = Session::get('seller_id');


        $data = array();
        $data['seller_id'] = $seller_id;
        $data['seller_name'] = $request->seller_name;
        $data['shop_name'] = $request->shop_name;
        $data['seller_address'] = $request->seller_address;
        $data['seller_district'] = $request->seller_district;
        $data['seller_policeStation'] = $request->seller_policeStation;
        $data['seller_phone'] = $request->seller_phone;
        $data['seller_email'] = $request->seller_email;
        $data['updated_at'] = date('y-m-d h:i:s');

        $image = $request->file('seller_picture');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/seller_picture/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['seller_picture'] = $image_url;

                DB::table('sellers')
                    ->where('seller_id', $seller_id)
                    ->update($data);


                $old_product_picture_path = $request->old_product_picture_path;
                if($old_product_picture_path){
                unlink($old_product_picture_path);
                }
                Session::put('message', 'Profile Update Succesfully!');
                return Redirect::to('/my/profile');
            }

        }else{

                DB::table('sellers')
                    ->where('seller_id', $seller_id)
                    ->update($data);

                Session::put('message', 'Profile Update Succesfully!');
                return Redirect::to('/my/profile');
        }

    }


    public function changePassword()
    {
        $this->auth_check();

        $changePassword= view('seller.seller_page.password.changePassword');

        return view('seller.sellerMaster')
            ->with('seller_main_comtent', $changePassword);

    }


    public function updatePassword(Request $request){
        $this->auth_check();
        $seller_id = Session::get('seller_id');

        $sellerInfo = DB::table('sellers')
            ->where('seller_id' , $seller_id)
            ->first();

        $sellerPassword = $sellerInfo->password;

        $oldPassword = md5($request->oldPassword);

        if ($sellerPassword == $oldPassword){

            $newPassword = md5($request->reNewPassword);

            DB::table('sellers')
                ->where('seller_id' , $seller_id)
                ->update(['password' => $newPassword , 'updated_at' => date('y-m-d h:i:s')]);

            Session::put('message' , 'Password Change Successfully!');
            return Redirect::to('/my/profile');
        }else{

            Session::put('passchange' , 'Old Password Not Match!!');
            return Redirect::to('/change/password');

        }


    }
}
