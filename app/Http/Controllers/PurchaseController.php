<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class PurchaseController extends Controller {

    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

    public function purchase() {
        $this->auth_check();

        $seller_id = Session::get('seller_id');


        $product = DB::table('tbl__products')
                ->join('suppliers', 'tbl__products.supplier_id', '=', 'suppliers.supplier_id')
                ->where(['tbl__products.seller_id' => $seller_id])
                ->get();


        $purchase = view('seller.seller_page.purchase')
                ->with('purchase_product', $product);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $purchase);
    }

    public function addPurchase($product_id) {
        $this->auth_check();
        $seller_id = Session::get('seller_id');


        $purchase = DB::table('tbl__products')
                ->join('suppliers', 'tbl__products.supplier_id', '=', 'suppliers.supplier_id')
                ->where('product_id', $product_id)
                ->first();


        $addPurchase = view('seller.seller_page.addPurchase')
                ->with('purchase', $purchase);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $addPurchase);
    }

    public function savePurchase(Request $request) {
        $this->auth_check();
        $seller_id = Session::get('seller_id');

        $data = array();
        $data['seller_id'] = $seller_id;
        $data['product_id'] = $request->product_id;
        $data['total_purchase_price'] = $request->total_purchase_price;
        $data['total_advance_price'] = $request->total_advance_price;
        $data['total_due_price'] = $request->total_due_price;
        $data['product_qty'] = $request->product_qty;
        $data['supplier_id'] = $request->supplier_id;
        $data['created_at'] = date('y-m-d');


        DB::table('purchase')
                ->insert($data);

        $stock = DB::table('stock')
                ->where('seller_id', $seller_id)
                ->where('product_id', $data['product_id'])
                ->first();



        if ($stock == null) {

            $sdata = array();

            $sdata['seller_id'] = $seller_id;
            $sdata['product_id'] = $request->product_id;
            $sdata['product_qty'] = $request->product_qty;
            $sdata['supplier_id'] = $request->supplier_id;
            $sdata['barcode'] = $request->barcode;
            $sdata['district_id'] = $request->district_id;
            $sdata['pstation_id'] = $request->pstation_id;
            $sdata['created_at'] = date('y-m-d');

            DB::table('stock')
                    ->insert($sdata);


            Session::put('message', 'Purchase Add Succesfully');
            return Redirect::to('/stock/product');
        } else {

            $stock_id = $stock->stock_id;
            $stock_qty = $stock->product_qty;

            $udata['product_qty'] = $request->product_qty + $stock_qty;

            DB::table('stock')
                    ->where('stock_id', $stock_id)
                    ->update($udata);


            Session::put('message', 'Purchase Add Succesfully');
            return Redirect::to('/stock/product');
        }
    }

    public function create() {
        
    }

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
