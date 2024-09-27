
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
                        <a href="#">Update Profile</a>
                    </li>

                </ul>


            </div>

            <div class="page-content">
                <div class="page-header">

                </div>

                <div class="row">
                    <div class="col-xs-12">

                        {!! Form::open(['url' => '/update/profile', 'method'=>'POST', 'class' => 'form-horizontal' , 'name' => 'edit_seller_form' ,'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > Name </label>

                            <div class="col-sm-9">
                                <input type="text" value="{{$sellerDataById->seller_name}}" id="seller_name" name="seller_name" placeholder="Name" required="" class="col-xs-10 col-sm-5" />
                                <input type="hidden" value="{{$sellerDataById->seller_id}}" name="seller_id" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Shop Name </label>

                            <div class="col-sm-9">
                                <input type="text" value="{{$sellerDataById->shop_name}}" id="form-field-1" name="shop_name" placeholder="Shop Name" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Full Address </label>

                            <div class="col-sm-9">
                                <textarea id="form-field-1" name="seller_address"   class="col-xs-10 col-sm-5" >{{$sellerDataById->seller_address}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> District</label>

                            <?php
                            $districtName = DB::table('districts')
                                ->get();

                            ?>

                            <div class="col-sm-3">
                                <select name="seller_district"  class="chosen-select form-control" id="form-field-select-3" required="" data-placeholder="Choose Users...">
                                    <option >----------Select District-----------</option>
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
                                    <option>----------Select Thana-----------</option>
                                    @foreach($thanaName as $v_thanaName)
                                        <option value="{{$v_thanaName->pstation_id}}">{{$v_thanaName->pstation_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone</label>

                            <div class="col-sm-9">
                                <input type="number" value="{{$sellerDataById->seller_phone}}" id="form-field-1" name="seller_phone" placeholder="Phone Number" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email Address </label>

                            <div class="col-sm-9">
                                <input type="email" value="{{$sellerDataById->seller_email}}" id="form-field-1" name="seller_email" placeholder="Email Address" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Profile Picture</label>

                            <div class="col-sm-9">
                                <input type="file" id="form-field-1" name="seller_picture" placeholder="" class="col-xs-10 col-sm-5" />
                                <img src="{{asset($sellerDataById->seller_picture)}}" style="height: 50px; width: 50px;">
                                <input type="hidden" name="old_product_picture_path" value="{{$sellerDataById->seller_picture}}">
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

    <script>
        document.forms['edit_seller_form'].elements['seller_policeStation'].value="{{$sellerDataById->seller_policeStation}}";
        document.forms['edit_seller_form'].elements['seller_district'].value="{{$sellerDataById->seller_district}}";
    </script>

@endsection