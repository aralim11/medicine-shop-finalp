
@extends('seller.sellerMaster')
@section('seller_main_comtent')

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Forms</a>
                </li>

            </ul><!-- /.breadcrumb -->

            
        </div>

        <div class="page-content">
            

            <div class="page-header">
                <h1 align="center">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message');
                    }
                    ?>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                    {!! Form::open(['url' => '/update/product', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="product_name" value="{{$all_products->product_name}}" placeholder="" required="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" id="form-field-1" name="product_id" value="{{$all_products->product_id}}" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Miligram </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="product_mg" value="{{$all_products->product_mg}}" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Company</label>

                        <div class="col-sm-3">
                            <select name="supplier_id" required=""  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                <option value="{{$all_products->supplier_id}}">{{$all_products->supplier_name}}</option>
                                
                                
                                <?php
                                $seller_id = Session::get('seller_id');
                                
                                    $suppliers = DB::table('suppliers')
                                            ->where('seller_id' , $seller_id)
                                            ->get();
                                ?>
                                
                                @foreach($suppliers as $all_supplier)
                                <option value="{{$all_supplier->supplier_id}}">{{$all_supplier->supplier_name}}</option>
                                @endforeach
                                
                            </select>
                                    <!-- <input type="text" id="form-field-1" name="user_label" placeholder="label" class="col-xs-10 col-sm-5" /> -->
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-1" required="" name="product_details"   class="col-xs-10 col-sm-5" >{{$all_products->product_details}}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Purchase Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" required="" value="{{$all_products->purchase_price}}" name="purchase_price" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sale Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" required="" value="{{$all_products->sale_price}}" name="sale_price" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Retail Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" required="" value="{{$all_products->retail_price}}" name="retail_price" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vat Tax</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" required="" value="{{$all_products->vat_tax}}" name="vat_tax" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Picture</label>

                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" required="" name="product_picture" placeholder="" class="col-xs-10 col-sm-5" />
                            <img name="product_picture"  src="{{asset($all_products->product_picture)}}" style="height: 50px; width: 50px;">
                            <input type="hidden" name="old_product_picture_path" value="{{$all_products->product_picture}}">
                        </div>
                        
                    </div>



                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>


                    {!! Form::close() !!}

                </div>

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>









@endsection