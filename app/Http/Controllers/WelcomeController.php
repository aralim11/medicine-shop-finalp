<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tbl_Product;
use Session;

session_start();

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller {

    public function index() {

        $all_district = DB::table('districts')->pluck("district_name")->all();
        return view('front.pages.home', compact("all_district"));
    }

    public function selectAjax(Request $request) {

        if ($request->ajax()) {

            $pstations = DB::table('pstations')->where('district_id', $request->district_id)->pluck('pstation_name', 'pstation_id')->all();

            $data = view('front.includes.pstationSelect', compact('pstations'))->render();

            return response()->json(['options' => $data]);
        }


        $product_id = $request->product_name;
        $district_id = $request->district_id;
        $pstation_id = $request->pstation_id;

        $search = DB::table('stock')
                ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
                ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
                ->join('sellers','stock.seller_id','=','sellers.seller_id')
                ->where('tbl__products.district_id', $district_id)
                ->where('tbl__products.pstation_id', $pstation_id)
                ->where('tbl__products.product_name', $product_id)
                ->where('stock.product_qty', '>', 0)
                ->select('tbl__products.product_id', 'tbl__products.product_name', 'tbl__products.product_picture', 'tbl__products.sale_price', 'tbl__products.product_mg', 'stock.product_qty','supplier_name','shop_name')
                ->get();


        $qty = DB::table('stock')
                ->where('district_id', $district_id)
                ->where('pstation_id', $pstation_id)
                ->pluck('product_qty')
                ->first();

        if ($qty > 0) {
            return view('front.pages.search', compact('search') );
        } else {
           Session::put('exception', 'Product Not Found!');
           return view('front.pages.search', compact('search') );
        }
    }

    public function product() {
        $all_product = DB::table('stock')
                ->join('sellers','stock.seller_id','=','sellers.seller_id')
                ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
                ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
                ->select('stock.*', 'supplier_name', 'product_name', 'product_details', 'sale_price', 'product_picture','shop_name')
                ->get();

        return view('front.pages.product', compact('all_product'));
    }

    public function contact() {

        return view('front.pages.contact');
    }

    public function productDetails($id) {

        $product = DB::table('stock')
                ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
                ->join('sellers','stock.seller_id','=','sellers.seller_id')
                ->join('districts','stock.district_id','=','districts.district_id')
                ->join('pstations','stock.pstation_id','=','pstations.pstation_id')
                ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
                ->where('stock.product_id', $id)
                ->select('stock.*', 'supplier_name', 'product_name', 'product_details', 'sale_price', 'product_picture','shop_name','district_name','pstation_name','seller_phone')
                ->first();

        return view('front.pages.single_page', compact('product'));
    }

    public function becomeSeller() {
        $districts = DB::table('districts')->select("district_name", "district_id")->get();

        return view('front.pages.becomeSeller', compact("districts"));
    }

    public function selectRegistration(Request $request) {

        if ($request->ajax()) {

            $pstations = DB::table('pstations')->where('district_id', $request->district_id)->pluck('pstation_name', 'pstation_id')->all();

            $data = view('front.includes.pstationSelect', compact('pstations'))->render();

            return response()->json(['options' => $data]);
        }
    }

    public function Registration(Request $request) {

        $reg = DB::table('tbl_registrations')
                ->where('seller_email', $request->seller_email)
                ->first();
        
        $seller = DB::table('sellers')
                ->where('seller_email', $request->seller_email)
                ->first();

        $data = array();
        $data['seller_name'] = $request->seller_name;
        $data['seller_email'] = $request->seller_email;
        $data['seller_phone'] = $request->seller_phone;
        $data['district'] = $request->district;
        $data['policestation'] = $request->policestation;
        $data['shop_name'] = $request->shop_name;
        $data['message'] = $request->message;
        $data['created_at'] = date('y-m-d h:i:s');

        if ($reg == null && $seller == null) {
            DB::table('tbl_registrations')->insert($data);

            Session::put('message', 'Seller Request Send Succesfully. You Will Get All Accounts Information within 72 Hours!');
            return Redirect::to('/becomeSeller');
        }else{
            Session::put('exception', 'This Email is Already Registered!');
            return Redirect::to('/becomeSeller');
        }
    }

    public function sellerRequest() {

        $viewsellerrequest = DB::table('tbl_registrations')
                ->get();

        return view('admin.admin_page.viewrequest', compact('viewsellerrequest'));
    }

    public function acceptRequest($id) {

        $viewsellerrequest = DB::table('tbl_registrations')
                ->where('seller_id', $id)
                ->first();

        function generateRandomString($length = 6) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $mainpass = array();
        $pass = generateRandomString();

        $data = array();
        $data['seller_name'] = $viewsellerrequest->seller_name;
        $data['shop_name'] = $viewsellerrequest->shop_name;
        $data['seller_district'] = $viewsellerrequest->district;
        $data['seller_policeStation'] = $viewsellerrequest->policestation;
        $data['seller_email'] = $viewsellerrequest->seller_email;
        $data['seller_phone'] = $viewsellerrequest->seller_phone;
        $data['password'] = md5($pass);
        $data['seller_label'] = 0;
        $data['created_at'] = date('y-m-d');

        DB::table('sellers')->insert($data);

        Session::put('pass', $pass);
        Session::put('data', $data);

        Mail::send('admin.admin_page.mails.confirm', $data, function ($message) use ($data) {
            $message->to($data['seller_email']);
            $message->subject('Registration Confirmed');
        });


        DB::table('tbl_registrations')
                ->where('seller_id', $id)
                ->delete();

        Session::put('message', 'Seller request Accepted Succesfully!');
        return Redirect::to('/view/seller');
    }

}
