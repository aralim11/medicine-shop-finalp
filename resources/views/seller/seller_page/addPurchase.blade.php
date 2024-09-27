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
                    <a href="#">Purchase Form</a>
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

                <h1 align="center">Pruchase Product</h1>
                <h4 align="center">Product Name: {{$purchase->product_name}}  &nbsp;&nbsp;&nbsp;   Date: {{date('d-M-Y')}}</h4>

            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                    {!! Form::open(['url' => '/save/purchase', 'method'=>'POST', 'class' => 'form-horizontal' , 'id' => 'myForm']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bar Code </label>

                        <div class="col-sm-9">
                            <input type="text" value="{{$purchase->product_id}}-0" id="form-field-1" name="barcode" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" value="{{$purchase->product_id}}" id="form-field-1" name="product_id" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" value="{{$purchase->supplier_id}}" id="form-field-1" name="supplier_id" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" value="{{$purchase->district_id}}" id="form-field-1" name="district_id" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" value="{{$purchase->pstation_id}}" id="form-field-1" name="pstation_id" placeholder="" class="col-xs-10 col-sm-5" />
                            
                            

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Quantity </label>

                        <div class="col-sm-9">
                            <input type="number"  id="quantity" name="product_qty" placeholder="Product Quantity" class="col-xs-10 col-sm-5" required=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pruchase Price </label>

                        <div class="col-sm-9">
                            <input type="text" readonly="" value="{{$purchase->purchase_price}}" id="purchase_price" name="purchase_price" required="" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pruchase Total </label>

                        <div class="col-sm-9">
                            <input type="text"  readonly="" id="purchase_total" name="total_purchase_price" placeholder="" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Advance Paid </label>

                        <div class="col-sm-9">
                            <input type="number" id="advance" name="total_advance_price" placeholder="Advance Paid" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Due </label>

                        <div class="col-sm-9">
                            <input type="text" id="due" name="total_due_price" placeholder="Due" required="" class="col-xs-10 col-sm-5" style="color: red;" />
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('input').on('keyup input', function () {
    var quantity = Number($("#quantity").val().trim());
    var purchase_price = Number($("#purchase_price").val().trim());

    var result = (quantity * purchase_price);

    $("#purchase_total").val(result);

    var advance = Number($("#advance").val().trim());

    var due = (result - advance);
    $("#due").val(due);
});

</script>

@endsection