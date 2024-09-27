<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

use DB;

class BillPayController extends Controller {

    public function admin_auth_check() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/admin')->send();
        }
    }

    //Admin Section
    public function billPayYearSearch() {
        $this->admin_auth_check();


        return view('admin.admin_page.bill_payment');
    }

    public function billPayView(Request $request) {

        $year = $request->year;
        $month = $request->month;

        $billPayView = DB::table('tbl_payment')
            ->join('sellers' , 'tbl_payment.seller_id','=','sellers.seller_id')
            ->join('tbl_month' , 'tbl_payment.month','=','tbl_month.month_id')
            ->where('tbl_payment.year', $year)
            ->where('tbl_payment.month', $month)
            ->select('tbl_payment.*' , 'tbl_month.*' , 'sellers.seller_id', 'sellers.seller_name', 'sellers.shop_name')
            ->get();

        $totalAmount = DB::table('tbl_payment')
            ->where('tbl_payment.year', $year)
            ->where('tbl_payment.month', $month)
            ->sum('amount');


        $sub = view('admin.admin_page.sub.bill_sub')
                        ->with('billPayView', $billPayView)
                        ->with('totalAmount', $totalAmount);

        return view('admin.admin_page.bill_payment')
                        ->with('sub_page', $sub);
    }

    public function payRequest() {

        $seller_name = DB::table('sellers')
                ->get();

        $pay_request = view('admin.admin_page.payRequest')
                ->with('seller_name', $seller_name);

        return view('admin.admin_main')
                        ->with('main_comtent', $pay_request);
    }

    public function currentView() {

        $month = date('m');
        $year = date('Y');

        $allSellerCurrentPayment = DB::table('tbl_payment')
                ->join('sellers', 'tbl_payment.seller_id', '=', 'sellers.seller_id')
                ->where('month', $month)
                ->where('year', $year)
                ->select('tbl_payment.*', 'sellers.seller_id', 'sellers.seller_name', 'sellers.shop_name')
                ->get();

        $totalAmount = DB::table("tbl_payment")
                ->where('month', $month)
                ->where('year', $year)
                 ->sum('amount');
        

        $monthPayView = view('admin.admin_page.viewMonthPay')
                ->with('allSellerCurrentPayment', $allSellerCurrentPayment)
                ->with('totalAmount', $totalAmount);

        return view('admin.admin_main')
                        ->with('main_comtent', $monthPayView);
    }




    //Seller Section Bill Payment

    public function seller_auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

    public function sellerBill() {
        $this->seller_auth_check();

        $bill_pay = view('seller.seller_page.bill_pay');


        return view('seller.sellerMaster')
                        ->with('bill_pay', $bill_pay);
    }

    public function savePayment(Request $request) {
        $this->seller_auth_check();
        $seller_id = Session::get('seller_id');


        $idata = array();
        $idata['month'] = $request->month;
        $idata['year'] = $request->year;



        $chk = DB::table('tbl_payment')
                ->where('seller_id', $seller_id)
                ->where('month', $idata['month'])
                ->where('year', $idata['year'])
                ->first();

        if ($chk != NULL) {
            $udata = array();
            $udata['seller_id'] = $seller_id;
            $udata['account_number'] = $request->account_number;
            $udata['pay_method'] = $request->pay_method;
            $udata['transaction_id'] = $request->transaction_id;
            $udata['warning_lavel'] = 0;
            $udata['amount'] = 600;
            $udata['updated_at'] = date('y-m-d h:i:s');

            DB::table('tbl_payment')
                    ->where('seller_id', $seller_id)
                    ->update($udata);
            
            DB::table('sellers')
                    ->where('seller_id', $seller_id)
                    ->update(['seller_label' => 0]);
            
            Session::put('message' , 'Request Confirmed Succesfully.');
            return Redirect::to('/bill/pay/seller');
            
        } else {
            $udata = array();
            $udata['month'] = $request->month;
            $udata['year'] = $request->year;
            $udata['seller_id'] = $seller_id;
            $udata['account_number'] = $request->account_number;
            $udata['pay_method'] = $request->pay_method;
            $udata['transaction_id'] = $request->transaction_id;
            $udata['warning_lavel'] = 0;
            $udata['amount'] = 600;
            $udata['created_at'] = date('y-m-d h:i:s');


            DB::table('tbl_payment')
                    ->insert($udata);
            
       
            Session::put('message' , 'Bill Paid Succesfully.');
            return Redirect::to('/bill/pay/seller');
        }

        
    }

    public function sellerViewPayment(Request $request) {
        $this->seller_auth_check();
        $seller_id = Session::get('seller_id');
        $year = $request->year;

        $payment = DB::table('tbl_payment')
                ->join('tbl_month', 'tbl_payment.month', '=', 'tbl_month.month_id')
                ->where('year', $year)
                ->where('seller_id', $seller_id)
                ->orderBy('month_id', 'asc')
                ->get();

        $totalAmount = DB::table('tbl_payment')
                ->where('tbl_payment.year', $year)
                ->where('tbl_payment.seller_id', $seller_id)
                ->sum('amount');


        $view_bill_pay = view('seller.seller_page.report.view_bill_pay')
                ->with('payment', $payment)
                ->with('totalAmount', $totalAmount);


        return view('seller.sellerMaster')
                        ->with('view_bill_pay', $view_bill_pay);
    }

}
