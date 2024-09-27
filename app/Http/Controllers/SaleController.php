<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Tbl_Product;
use App\Seller;
use App\Supplier;
use Session;

session_start();

class SaleController extends Controller {

    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

//    public function salePanel() {
//
//        $this->auth_check();
//
//        $seller_id = Session::get('seller_id');
//        $productNameBySellerId = Tbl_Product::where('seller_id', $seller_id)->select("product_name", "product_id")->get();
//        $voucher_data = DB::table('stock')
//                ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
//                ->join('sellers', 'stock.seller_id', '=', 'sellers.seller_id')
//                ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
//                ->where('sellers.seller_id', $seller_id)
//                ->select('tbl__products.product_id', 'sellers.seller_id', 'suppliers.supplier_id', 'stock.stock_id')
//                ->get();
//
//
//
//        return view('seller.seller_page.sales', compact('productNameBySellerId', 'voucher_data'));
//    }



    public function salePanel() {
        $this->auth_check();

        $seller_id = Session::get('seller_id');
        $productNameBySellerId = Tbl_Product::where('seller_id', $seller_id)->select("product_name", "product_id")->get();

        $voucher_data = DB::table('tbl__vouchers')
                ->join('tbl__products', 'tbl__vouchers.product_id', '=', 'tbl__products.product_id')
                ->join('suppliers', 'tbl__vouchers.supplier_id', '=', 'suppliers.supplier_id')
                ->where('tbl__vouchers.seller_id', $seller_id)
                ->get();


        return view('seller.seller_page.sales', compact('productNameBySellerId', 'voucher_data'));
    }

    public function selectAjax(Request $request) {
        if ($request->ajax()) {

            $quantity = DB::table('stock')->where('product_id', $request->product_id)->pluck('product_qty', 'product_id')->all();

            $data = view('seller.seller_page.productQuantity', compact('quantity'))->render();

            return response()->json(['options' => $data]);
        }
    }

    public function totalAmount(Request $request) {
        $this->auth_check();

        $seller_id = Session::get('seller_id');
        $productNameBySellerId = Tbl_Product::where('seller_id', $seller_id)->select("product_name", "product_id")->get();

        $product_id = $request->product_id;

        $stockinfo = DB::table('stock')
                ->where('product_id', $product_id)
                ->where('seller_id', $seller_id)
                ->first();

        $stock_id = $stockinfo->stock_id;

        $productinfo = DB::table('tbl__products')
                ->where('product_id', $product_id)
                ->where('seller_id', $seller_id)
                ->first();

        $supplier_id = $productinfo->supplier_id;

        $product_qty = $request->product_qty;
        $total = $product_qty * $productinfo->sale_price;

        $data = array();
        $data['product_id'] = $request->product_id;
        $data['seller_id'] = $seller_id;
        $data['supplier_id'] = $supplier_id;
        $data['stock_id'] = $stock_id;
        $data['sale_qty'] = $product_qty;
        $data['total'] = $total;
        $data['vat'] = $productinfo->vat_tax;
        $data['created_at'] = date('y-m-d h:i:s');
        
        DB::table('stock')
                ->where('seller_id', $seller_id)
                ->where('stock_id', $stock_id)
                ->decrement('product_qty', $product_qty);


        if ($seller_id != null) {
            DB::table('tbl__vouchers')->insert($data);
            return Redirect::to('/sale/panel');
        } else {
            echo 'No data insert';
        }
    }

//
//    public function autocomplete($request) {
//
//        $this->auth_check();
//        $seller_id = Session::get('seller_id');
//
//        $data = DB::table('Tbl__Products')
//                ->where('seller_id', $seller_id)
//                ->where('product_name', 'LIKE', '%' . $request . '%')
//                ->get();
//
//
//
//        echo '<ul id="country-list">';
//        foreach ($data as $key) {
//       
//        }
//        echo '</ul>';
//    }
//    public function XX($request){
//
//        $seller_id = Session::get('seller_id');
//        $product_name = $request;
//
//            $productIdByName = DB::table('tbl__products')
//                ->where('product_name' , $product_name)
//                ->where('seller_id' , $seller_id)
//                ->first();
//
//            $productId = $productIdByName->product_id;
//
//            $stockQty = DB::table('stock')
//                ->where('product_id', $productId)
//                ->where('seller_id' , $seller_id)
//                ->first();
//
//
//        return $request;
//    }



    function cashCheck(Request $request) {
        $this->auth_check();

        $seller_id = Session::get('seller_id');

        $cash = $request->cash;
        $paid_cash = $request->paid_cash;

        if ($cash == $paid_cash) {

            function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $data = array();
            $data['invoice_id'] = generateRandomString();
            $data['seller_id'] = $seller_id;
            
           $invoice_id = DB::table('invoices')
                   ->insertGetId($data);
           
         
           
           $invoiceinfo = DB::table('invoices')
                   ->where('id', $invoice_id)
                   ->first();
           
           $voucher_data = DB::table('tbl__vouchers')
                ->join('tbl__products', 'tbl__vouchers.product_id', '=', 'tbl__products.product_id')
                ->join('suppliers', 'tbl__vouchers.supplier_id', '=', 'suppliers.supplier_id')
                ->where('tbl__vouchers.seller_id', $seller_id)
                ->get();
           
        foreach ($voucher_data as $voucher_datas){
            $data = array();
            $data['invoice_id']=$invoiceinfo->id;
            $data['product_name']=$voucher_datas->product_name;
            $data['sale_price']=$voucher_datas->sale_price;
            $data['quantity']=$voucher_datas->sale_qty;
            $data['vat']=$voucher_datas->vat;
            $data['total']=$voucher_datas->total;
            $data['seller_id'] = $seller_id;
            $data['created_at'] = date('y-m-d');
            
            $salesgetid = DB::table('tb_sales')->insertGetId($data);       
        }
        
        DB::table('tbl__vouchers')->truncate();
        
        Session::put('salesgetid', $salesgetid);
        Session::put('invoiceid', $invoiceinfo->id);
           
            

            return Redirect::to('/invoice');
        } else {
            echo 'not success';
        }
    }
    
    
    public function deleteVoucherData($id){
        $seller_id = Session::get('seller_id');
        $voucherstck = DB::table('tbl__vouchers')
                ->where('voucher_id', $id)
                ->first();
        
        $stockid = $voucherstck->stock_id;
        
        $stockinfo = DB::table('stock')
                ->where('stock_id', $stockid)
                ->first();
        
        $stockqty = $stockinfo->product_qty + $voucherstck->sale_qty;
        
        DB::table('stock')
                ->where('stock_id', $stockid)
                ->where('seller_id', $seller_id)
                ->update(['product_qty' => $stockqty]);
        
        DB::table('tbl__vouchers')->where('voucher_id',$id)->delete();
        return Redirect::to('/sale/panel');
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
