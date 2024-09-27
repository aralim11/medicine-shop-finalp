<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();
use Session;
use Barryvdh\DomPDF\PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seller_id = Session::get('seller_id');
        
        $salesgetid = Session::get('salesgetid');
        $invoiceid = Session::get('invoiceid');
     
        $invoiceById=DB::table('invoices')
                ->where('id', $invoiceid)
                ->where('seller_id', $seller_id)
                ->first();
        
        $allsaleinfo = DB::table('tb_sales')
                ->where('seller_id', $seller_id)
                ->where('invoice_id', $invoiceid)
                ->get();
        
 
        $sellerinfo = DB::table('sellers')
                ->join('districts', 'sellers.seller_district', '=', 'districts.district_id')
                ->join('pstations', 'sellers.seller_policeStation', '=', 'pstations.pstation_id')
                ->where('sellers.seller_id', $seller_id)
                ->first();

        return view('seller.seller_page.invoice' , compact('allsaleinfo', 'sellerinfo','invoiceById') );
    }
    
    public function Pdf(){
        
        $seller_id = Session::get('seller_id');
        
        $salesgetid = Session::get('salesgetid');
        $invoiceid = Session::get('invoiceid');
     
        $invoiceById=DB::table('invoices')
                ->where('id', $invoiceid)
                ->where('seller_id', $seller_id)
                ->first();
        
        $allsaleinfo = DB::table('tb_sales')
                ->where('seller_id', $seller_id)
                ->where('invoice_id', $invoiceid)
                ->get();
        
 
        $sellerinfo = DB::table('sellers')
                ->join('districts', 'sellers.seller_district', '=', 'districts.district_id')
                ->join('pstations', 'sellers.seller_policeStation', '=', 'pstations.pstation_id')
                ->where('sellers.seller_id', $seller_id)
                ->first();
        
        $pdf = \PDF::loadView('seller.seller_page.demo', ['invoiceById' => $invoiceById, 'allsaleinfo' => $allsaleinfo, 'sellerinfo' => $sellerinfo]);
 
        return $pdf->download($invoiceById->invoice_id.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
