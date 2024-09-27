<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

session_start();

use Illuminate\Support\Facades\Redirect;

class StockController extends Controller {

    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

    public function stockProduct() {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        

        $show_product = DB::table('stock')
                ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
                ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
                ->where('stock.seller_id', $seller_id)
                ->get();

      

        $stock_product = view('seller.seller_page.viewStock')
                ->with('show_stock_product', $show_product);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $stock_product);
    }

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
