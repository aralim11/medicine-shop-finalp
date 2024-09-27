
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
                    <a href="#">Add Products</a>
                </li>

            </ul>

            
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

                    {!! Form::open(['url' => '/save/product', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="product_name" required="" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Miligram </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="product_mg" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Company</label>

                        <div class="col-sm-3">
                            <select  name="supplier_id"  class="chosen-select form-control"  id="form-field-select-3" required="required">
                                <option value="">----------Select Company-----------</option>
                                @foreach($all_supplier as $suppliers)
                                <option value="{{$suppliers->supplier_id}}">{{$suppliers->supplier_name}}</option>
                                @endforeach

                            </select>
                                    <!-- <input type="text" id="form-field-1" name="user_label" placeholder="label" class="col-xs-10 col-sm-5" /> -->
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-1" name="product_details" required=""  class="col-xs-10 col-sm-5" ></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Purchase Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" name="purchase_price" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sale Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" name="sale_price" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Retail Price</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" name="retail_price" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vat Tax</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="vat_tax" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Picture</label>

                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" name="product_picture" placeholder="" required="" class="col-xs-10 col-sm-5" />
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