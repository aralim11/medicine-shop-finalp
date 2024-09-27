
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
                    <a href="#">Edit Brand Form</a>
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

                    {!! Form::open(['url' => '/update/brand', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Brand name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="supplier_name" value="{{$brandById->supplier_name}}" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" id="form-field-1" name="supplier_id" value="{{$brandById->supplier_id}}" placeholder="" class="col-xs-10 col-sm-5" />
                            <input type="hidden" id="form-field-1" name="seller_id" value="{{$brandById->seller_id}}" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Brand Description </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-1" name="supplier_description"   class="col-xs-10 col-sm-5" >{{$brandById->supplier_description}}
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact No. </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="supplier_phone" value="{{$brandById->supplier_phone}}" placeholder="" class="col-xs-10 col-sm-5" />
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