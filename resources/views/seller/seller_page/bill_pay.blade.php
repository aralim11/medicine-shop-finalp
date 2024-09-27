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
                    <a href="#">Bill Pay</a>
                </li>

            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1 align="center">

                </h1>

                <h1 align="center">Monthly Bill Payment</h1>
                <h4 align="center">Date: {{date('d-M-Y')}}</h4>
                
                <center style="color: red;"><h4 align="center">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message');
                    }
                    ?>
                        </h4></center>

                {!! Form::open(['url' => '/view/bill-payment', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}

                <div style="float: right; margin-left: 30px;">
                    <a href="">
                        <button class="btn btn-success">View All Payment</button>
                    </a>
                </div> 


                {!! Form::close() !!}
            </div>



            <div class="row">
                <div class="col-xs-12">

                    {!! Form::open(['url' => '/save/payment', 'method'=>'POST', 'class' => 'form-horizontal' , 'id' => 'myForm']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Company</label>

                        <div class="col-sm-3">
                            <select name="month"  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                <option >----------Select Month-----------</option>

                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Year</label>

                        <div class="col-sm-3">
                            <select name="year"  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                <option >----------Select Year-----------</option>

                                <option value="2017">2017</option>
                                <option value="2018">2018</option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Payment Method</label>

                        <div class="col-sm-3">
                            <select name="pay_method"  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                <option >----------Select Payment Method-----------</option>

                                <option value="dbbl">Dutch Bangla Mobile Bank</option>
                                <option value="bkash">Bkash</option>
                                <option value="ucash">UCASH</option>
                                <option value="bank">Bank Payment</option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account Number </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="account_number" placeholder="Account Number" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Transaction Id </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="transaction_id" placeholder="Transaction Id" class="col-xs-10 col-sm-5" />
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
            </div>
        </div>
    </div>
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