
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
                        <a href="#">Update Seller Data</a>
                    </li>

                </ul>


            </div>

            <div class="page-content">
                <div class="page-header">
                </div>

                <div class="row">
                    <div class="col-xs-12">

                        {!! Form::open(['url' => '/update/seller', 'method'=>'POST', 'class' => 'form-horizontal' , 'name' => 'edit_seller_form']) !!}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > Seller name </label>

                            <div class="col-sm-9">
                                <input type="text" value="{{$sellerById->seller_name}}" name="seller_name" placeholder="Seller Name" required="" class="col-xs-10 col-sm-5" />
                                <input type="hidden" value="{{$sellerById->seller_id}}" name="seller_id" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Shop Name </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" value="{{$sellerById->shop_name}}" name="shop_name" placeholder="Shop Name" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> District</label>

                            <?php

                            $district = DB::table('districts')
                                ->get();

                            ?>

                            <div class="col-sm-3">
                                <select name="seller_district"  class="chosen-select form-control" id="form-field-select-3" required="" data-placeholder="Choose Users...">
                                    <option >----------Select District-----------</option>
                                    @foreach($district as $v_district)
                                    <option value="{{$v_district->district_id}}">{{$v_district->district_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3"> Thana</label>

                            <?php

                                $policeStation = DB::table('pstations')
                                                ->get();

                            ?>

                            <div class="col-sm-3">
                                <select name="seller_policeStation"  class="chosen-select form-control" required="" id="form-field-select-3" data-placeholder="Choose Users...">

                                    <option >----------Select Thana-----------</option>
                                    @foreach($policeStation as $v_policeStation)
                                    <option value="{{$v_policeStation->pstation_id}}">{{$v_policeStation->pstation_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone</label>

                            <div class="col-sm-9">
                                <input type="number" id="form-field-1" value="{{$sellerById->seller_phone}}" name="seller_phone" placeholder="Phone Number" required="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email Address </label>

                            <div class="col-sm-9">
                                <input type="email" id="form-field-1" value="{{$sellerById->seller_email}}" name="seller_email" placeholder="Email Address" required="" class="col-xs-10 col-sm-5" />
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
        document.forms['edit_seller_form'].elements['seller_policeStation'].value="{{$sellerById->seller_policeStation}}";
        document.forms['edit_seller_form'].elements['seller_district'].value="{{$sellerById->seller_district}}";
    </script>

@endsection


