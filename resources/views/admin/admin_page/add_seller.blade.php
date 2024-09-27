
@extends('admin.admin_main')
@section('main_comtent')

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Add Seller</a>
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

                    {!! Form::open(['url' => '/save/seller', 'method'=>'POST', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > Seller name </label>

                        <div class="col-sm-9">
                            <input type="text" id="seller_name" name="seller_name" placeholder="Seller Name" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Shop Name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="shop_name" placeholder="Shop Name" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> District</label>

                        <?php
                        $districtName = DB::table('districts')
                            ->get();

                        ?>

                        <div class="col-sm-3">
                            <select name="seller_district"  class="chosen-select form-control" id="form-field-select-3" required="required">
                                <option value="">----------Select District-----------</option>
                                    @foreach($districtName as $v_districtName)
                                    <option value="{{$v_districtName->district_id}}">{{$v_districtName->district_name}}</option>
                                    @endforeach
                            </select>

                        </div>

                    </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Thana</label>

                            <?php
                            $thanaName = DB::table('pstations')
                                ->get();

                            ?>

                            <div class="col-sm-3">
                            <select name="seller_policeStation"  class="chosen-select form-control" required="" id="form-field-select-3" data-placeholder="Choose Users...">
                                <option value="">----------Select Thana-----------</option>
                                @foreach($thanaName as $v_thanaName)
                                <option value="{{$v_thanaName->pstation_id}}">{{$v_thanaName->pstation_name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone</label>

                        <div class="col-sm-9">
                            <input type="number" id="form-field-1" name="seller_phone" placeholder="Phone Number" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email Address </label>

                        <div class="col-sm-9">
                            <input type="email" id="form-field-1" name="seller_email" placeholder="Email Address" required="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>

                        <div class="col-sm-9">
                            <input type="password" id="form-field-1" name="password" placeholder="Password" required="" class="col-xs-10 col-sm-5" />
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


