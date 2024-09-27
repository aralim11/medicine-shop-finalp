<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\View\View;
use Session;

session_start();

use Illuminate\Support\Facades\Redirect;

class AdminDashController extends Controller {

    public function index() {
        $this->auth_check();

        $home_content = view('admin.admin_page.home');

        return view('admin.admin_main')
                        ->with('main_comtent', $home_content);
    }

    public function auth_check() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/admin')->send();
        }
    }

    //  Sellelr
    public function addSeller() {
        $this->auth_check();
        $add_seller = view('admin.admin_page.add_seller');

        return view('admin.admin_main')
                        ->with('main_comtent', $add_seller);
    }

    public function manageSeller() {
        $this->auth_check();
        $all_seller = DB::table('sellers')
                ->join('districts', 'sellers.seller_district', '=', 'districts.district_id')
                ->join('pstations', 'sellers.seller_policeStation', '=', 'pstations.pstation_id')
                ->select('sellers.*', 'districts.district_name', 'pstations.pstation_name')
                ->get();


        $view_seller = view('admin.admin_page.view_seller')
                ->with('all_seller', $all_seller);

        return view('admin.admin_main')
                        ->with('main_comtent', $view_seller);
    }

    public function saveSelller(Request $request) {
        $this->auth_check();

        $sellerinfo = DB::table('sellers')
                ->where('seller_email', $request->seller_email)
                ->first();

        $data = array();
        $data['seller_name'] = $request->seller_name;
        $data['shop_name'] = $request->shop_name;
        $data['seller_district'] = $request->seller_district;
        $data['seller_policeStation'] = $request->seller_policeStation;
        $data['seller_email'] = $request->seller_email;
        $data['seller_phone'] = $request->seller_phone;
        $data['password'] = md5($request->password);
        $data['seller_label'] = 0;
        $data['created_at'] = date('y-m-d h:i:s');

        if ($sellerinfo == null) {
            DB::table('sellers')
                    ->insert($data);

            Session::put('message', 'Save Seller Information Successfully !');
            return Redirect::to('/add/seller');
        } else {
            Session::put('message', 'This Email Already Registered!');
            return Redirect::to('/add/seller');
        }
    }

    public function editSeller($seller_id) {
        $this->auth_check();

        $sellerById = DB::table('sellers')
                ->where('seller_id', $seller_id)
                ->first();


        $editSeller = view('admin.admin_page.editSeller')
                ->with('sellerById', $sellerById);

        return \view('admin.admin_main')
                        ->with('main_comtent', $editSeller);
    }

    public function updateSeller(Request $request) {
        $this->auth_check();

        $data = array();
        $seller_id = $request->seller_id;
        $data['seller_name'] = $request->seller_name;
        $data['shop_name'] = $request->shop_name;
        $data['seller_district'] = $request->seller_district;
        $data['seller_policeStation'] = $request->seller_policeStation;
        $data['seller_email'] = $request->seller_email;
        $data['seller_phone'] = $request->seller_phone;
        $data['password'] = md5($request->password);
        $data['seller_label'] = 0;
        $data['updated_at'] = date('y-m-d h:i:s');

        DB::table('sellers')
                ->where('seller_id', $seller_id)
                ->update($data);

        Session::put('message', 'Seller Data Update Successfully!');

        return Redirect::to('/view/seller');
    }

    public function suspendSeller($seller_id) {
        $this->auth_check();

        DB::table('sellers')
                ->where('seller_id', $seller_id)
                ->update(['seller_label' => 1]);

        Session::put('exception', 'Seller Suspended!');

        return Redirect::to('/view/seller');
    }

    public function activeSeller($seller_id) {
        $this->auth_check();

        DB::table('sellers')
                ->where('seller_id', $seller_id)
                ->update(['seller_label' => 0]);

        Session::put('message', 'Seller Active!');

        return Redirect::to('/view/seller');
    }

//    public function deleteSeller($id) {
//        $this->auth_check();
//      
//       
//       DB::table('invoices')
//                ->where('seller_id',$id)
//               ->delete();
//
//              DB::table('stock')
//                ->where('seller_id',$id)
//               ->delete();
//              
//              DB::table('suppliers')
//                ->where('seller_id',$id)
//               ->delete();
//              
//              DB::table('tbl__products')
//                ->where('seller_id',$id)
//               ->delete();
//              
//             
//              
//              DB::table('tb_sales')
//                ->where('seller_id',$id)
//               ->delete();
//   
//                Session::put('exception', 'Seller All Data deleted successfully!');
//
//        return Redirect::to('/view/seller');
//        
//        
//        
//        
//    }
// Logout

    public function adminLogout() {
        Session::put('admin_id');
        Session::put('admin_name');
        Session::put('exception', 'Log Out Succesfully!');
        return Redirect::to('/admin');
    }

    //Add District
    public function addDistrict() {
        $this->auth_check();
        $add_district = view('admin.admin_page.add_district');

        return view('admin.admin_main')
                        ->with('main_comtent', $add_district);
    }

    public function saveDistrict(Request $request) {
        $data = array();
        $data['district_name'] = $request->district_name;
        DB::table('districts')->insert($data);
        Session::put('message', 'District add successfully!');
        return Redirect::to('/add/district');
    }

    public function addUpozila() {
        $this->auth_check();
        $districts = DB::table('districts')->get();
        $add_upozila = view('admin.admin_page.add_upozila', compact('districts'));

        return view('admin.admin_main')
                        ->with('main_comtent', $add_upozila);
    }

    public function saveUpozila(Request $request) {
        $data = array();
        $data['pstation_name'] = $request->pstation_name;
        $data['district_id'] = $request->district_id;
        DB::table('pstations')->insert($data);
        Session::put('message', 'Upozila add successfully!');
        return Redirect::to('/add/pstation');
    }

    public function manageDP() {
        
        $allData=DB::table('districts')
                ->join('pstations','districts.district_id','=','pstations.district_id')
                ->get();
       $all_dp_upozila = view('admin.admin_page.view_all_dp', compact('allData'));

        return view('admin.admin_main')
                        ->with('main_comtent', $all_dp_upozila);
    }

}
