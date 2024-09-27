
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
                        <a href="#">Change Password</a>
                    </li>

                </ul>


            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1 align="center" style="color: red;">
                        <?php
                        $passchange = Session::get('passchange');
                        if ($passchange) {
                            echo $passchange;
                            Session::put('passchange');
                        }
                        ?>
                    </h1>
                </div>

                <div class="row">
                    <div class="col-xs-12">

                        {!! Form::open(['url' => '/update/password', 'method'=>'POST', 'class' => 'form-horizontal' , 'name' => 'edit_seller_form' ,'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > Old Password </label>

                            <div class="col-sm-9">
                                <input type="password" name="oldPassword" placeholder="Old Password" required="" class="col-xs-10 col-sm-5" />
                                <input type="hidden" name="seller_id" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> New Password </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" name="newPassword" placeholder="New Password" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Retype New Password </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-1" name="reNewPassword" placeholder="Retype New Password" required="" class="col-xs-10 col-sm-5" />
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


@endsection