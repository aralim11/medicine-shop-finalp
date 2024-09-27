<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class ReportController extends Controller {

    public function purchaseReport() {
        $this->auth_check();
        
        return view('seller.seller_page.report.purchase');
    }

    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

    public function viewPurchaseReport(Request $request) {
        $seller_id = Session::get('seller_id');
        $this->auth_check();

        $start_date = $request->start;
        $end_date = $request->end;
        $supplier_id = $request->supplier_id;


        $p_report = DB::table('purchase')
                ->join('suppliers', 'purchase.supplier_id', '=', 'suppliers.supplier_id')
                ->join('tbl__products', 'purchase.product_id', '=', 'tbl__products.product_id')
                ->where('purchase.seller_id', $seller_id)
                ->where('purchase.supplier_id', $supplier_id)
                ->whereBetween('purchase.created_at', [$start_date, $end_date])
                ->select('purchase.*', 'suppliers.*', 'product_name', 'purchase_price')
                ->get();
        
        
                $sub = view('seller.seller_page.report.sub.sub_page')
                                        ->with('p_report', $p_report);
                
                $p_start_date = Session::put('p_start_date',$start_date);
                 

            return view('seller.seller_page.report.purchase')
                                ->with('sub_report_page' , $sub);
        
    }
    
    
    public function saleReport(Request $request){
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        
        return view('seller.seller_page.report.salereport');
        
    }
    
    public function viewReport(Request $request){
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        $start_date = $request->start;
        
        $salereport = DB::table('tb_sales')
                ->join('invoices','tb_sales.invoice_id','=','invoices.id')
                ->where('tb_sales.seller_id',$seller_id)
                ->where('tb_sales.created_at',$start_date)
                ->get();
    
         return view('seller.seller_page.report.sub.sale_page',  compact('salereport') );
    }

    public function create() {
        
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
