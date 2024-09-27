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
                    <li class="active">User Profile</li>
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
                </div>

                <div class="row">
                    <div class="col-xs-12">
                            <div id="user-profile-2" class="user-profile">
                                <div class="tabbable">
                                    <div class="tab-content no-border padding-24">
                                        <div id="home" class="tab-pane in active">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3 center">
                                                    @if($viewProfile->seller_picture)
                                                        <span class="profile-picture">
                                                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="{{asset($viewProfile->seller_picture)}}" />
                                                        </span>
                                                    @else
                                                        <span class="profile-picture">
                                                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="{{asset('public/asset/assets/images/not.jpg')}}"/>
                                                        </span>
                                                    @endif

                                                    <div class="space space-4"></div>

                                                    
                                                </div>

                                                <div class="col-xs-12 col-sm-9">
                                                    <h4 class="blue">
                                                        <span class="middle">{{$viewProfile->shop_name}}</span>
                                                    </h4>

                                                    <div class="profile-user-info">
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Name </div>

                                                            <div class="profile-info-value">
                                                                <span>{{$viewProfile->seller_name}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Full Address </div>

                                                            @if($viewProfile->seller_address != NULL)

                                                                <div class="profile-info-value">
                                                                    <span>{{$viewProfile->seller_address}}</span>
                                                                </div>

                                                            @else
                                                                <div class="profile-info-value">
                                                                    <span style="color: blue;">Please Update Yor Full Address.</span>
                                                                </div>
                                                            @endif

                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Location </div>

                                                            <div class="profile-info-value">
                                                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                                <span>{{$viewProfile->pstation_name}}</span>
                                                                <span>{{$viewProfile->district_name}}</span>
                                                            </div>
                                                        </div>


                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Email </div>

                                                            <div class="profile-info-value">
                                                                <span>{{$viewProfile->seller_email}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Phone Number </div>

                                                            <div class="profile-info-value">
                                                                <span>{{$viewProfile->seller_phone}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Joined </div>

                                                            <div class="profile-info-value">
                                                                <span>{{$viewProfile->created_at}}</span>
                                                            </div>
                                                        </div>


                                                        @if($viewProfile->created_at)
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Update </div>

                                                            <div class="profile-info-value">
                                                                <span>{{$viewProfile->updated_at}}</span>
                                                            </div>
                                                        </div>
                                                        @endif


                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Update </div>

                                                            <div class="profile-info-value">
                                                                <a href="{{URL::to('/edit/profile')}}"><span style="color: red;">Profile Data</span></a>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> </div>

                                                            <div class="profile-info-value">
                                                                <a href="{{URL::to('/change/password')}}"><span style="color: red;">Change Password</span></a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="hr hr-8 dotted"></div>
                                                </div>
                                            </div>

                                            <div class="space-20"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div>

    @endsection