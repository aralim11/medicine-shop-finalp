
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
                    <a href="#">Add Brands</a>
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
                <h1 align="center" style="color: red;">
                    <?php
                    $exception = Session::get('exception');
                    if ($exception) {
                        echo $exception;
                        Session::put('exception');
                    }
                    ?>
                </h1>
            </div>

            <div class="row">
                <div class="col-xs-12">

                    {!! Form::open(['url' => '/save/brand', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Brand name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="supplier_name" placeholder="" class="col-xs-10 col-sm-5" required=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Brand Description </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-1" name="supplier_description"   class="col-xs-10 col-sm-5" required=""></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact No. </label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" name="supplier_phone" placeholder="" class="col-xs-10 col-sm-5" required=""/>
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