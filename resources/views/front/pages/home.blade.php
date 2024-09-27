@extends('front.master')
@section('title','Home')
@section('main_content')
<div class="banner-silder">
    <div id="JiSlider" class="jislider">
        <ul>
            <li>
                <div class="w3layouts-banner-top">

                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Health Plus</span>
                            <h3>Medicare</h3>
                            <p>Join with us to make world more safe and healthier.</p>

                        </div>	
                    </div>
                </div>
            </li>
            <li>
                <div class="w3layouts-banner-top w3layouts-banner-top1">
                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Real</span>
                            <h3>Medicare</h3>
                            <p>Medicine is an important part of our everyday life.By our service you can find your medicine from any where at your nearest place.</p>

                        </div>	
                    </div>
                </div>
            </li>
            <li>
                <div class="w3layouts-banner-top w3layouts-banner-top2">
                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Amazing</span>
                            <h3>MediCare </h3>
                            <p>In future we have plan to increase our service by home delivery.</p>

                        </div>

                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>

<div class="about" id="about">
    <div class="container">
        <h2 class="w3_heade_tittle_agile">Welcome to our Medicare</h2>
        <p class="sub_t_agileits">Short Description</p>

        <p class="ab" style="font-family: verdana; font-size: 16px;">
            Medicare is a medicine service website.You can find your desired medicine at your nearest place from Bangladesh anytime from anywhere.<br/>
            Join with us to make world more safe and healthier.
        </p>

        <div class="about-w3lsrow"> 

            <div class="col-md-6 w3about-img"> 
                <img src="{{asset('public/front/images/medicine.jpg')}}" alt=" " class="img-responsive">
            </div> 
            <div class="col-md-6 col-sm-7 w3about-img two"> 
                <div class="w3about-text"> 
                    <h5 class="w3l-subtitle">We Care About Your Health</h5>
                    <p style="font-family: verdana; font-size: 16px;">
                        Medicine is an important part of our everyday life.By our service you can find your medicine from any where at your nearest place.This way are help you 
                        save your time and distance.In future we have plan to increase our service by home delivery.
                    </p>

                    
                   
                </div>
            </div> 
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- /about-bottom -->
<!-- /girds_agileits -->

<!-- //girds_agileits -->


<!-- services section -->
<!--<div class="service-w3l jarallax" id="service">
    <div class="container">
        <h3 class="w3_heade_tittle_agile two">What We Do Best</h3>
        <p class="sub_t_agileits">Add Short Description</p>
        <div class="col-lg-4 col-md-4 col-sm-12 serv-agileinfo1">
            <div class="col-lg-12 col-md-12 col-sm-6 serv-wthree1" data-aos="zoom-in">
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item">				
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                                <div class="ch-info-back">
                                    <h5>Health Plus</h5>
                                    <p>Best In Services</p>
                                </div>	
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center">Easy Booking</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat risus eu pretium commodo.</p>	
            </div>
            <div class="col-lg-12 col-md-12 col-sm-6 serv-wthree2" data-aos="zoom-in">
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item">				
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-2"><i class="fa fa-user-md" aria-hidden="true"></i></div>
                                <div class="ch-info-back">
                                    <h5>Health Plus</h5>
                                    <p>Best In Services</p>
                                </div>	
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center">Experience</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat risus eu pretium commodo.</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 serv-agileinfo2">
            <div class="col-lg-12 col-md-12 col-sm-6 serv-wthree4" data-aos="zoom-in">
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item">				
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-3"><i class="fa fa-ambulance" aria-hidden="true"></i></div>
                                <div class="ch-info-back">
                                    <h5>Health Plus</h5>
                                    <p>Best In Services</p>
                                </div>	
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center">Emergency Care</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat risus eu pretium commodo.</p>
            </div>
            <div class="clearfix"></div>
        </div>	
        <div class="col-lg-4 col-md-4 col-sm-6 serv-agileinfo3">
            <div class="col-lg-12 col-md-12 col-sm-6 serv-wthree6" data-aos="zoom-in">
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item">				
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-4"><i class="fa fa-tint" aria-hidden="true"></i></div>
                                <div class="ch-info-back">
                                    <h5>Health Plus</h5>
                                    <p>Best In Services</p>
                                </div>	
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center">DNA Testing</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat risus eu pretium commodo.</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-6 serv-wthree5" data-aos="zoom-in">
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item">				
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-5"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
                                <div class="ch-info-back">
                                    <h5>Health Plus</h5>
                                    <p>Best In Services</p>
                                </div>	
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center">General Treatment</h4>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat risus eu pretium commodo.</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>-->
<!-- /services section -->

<!-- stats -->
<div class="stats" id="stats">
    <div class="container"> 
        <div class="inner_w3l_agile_grids">
            <div class="col-md-3 w3layouts_stats_left w3_counter_grid">
                <i class="fa fa-area-chart" aria-hidden="true"></i>
                <p class="counter">
                    <?php
                    echo count(DB::table('districts')
                                    ->get());
                    ?> 
                </p>
                <h3 style="font-family: verdana;">Districts</h3>
            </div>
            <div class="col-md-3 w3layouts_stats_left w3_counter_grid1">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <p class="counter">
                    <?php
                    echo count(DB::table('pstations')
                                    ->get());
                    ?>
                </p>
                <h3 style="font-family: verdana;">Upazila</h3>
            </div>
            <div class="col-md-3 w3layouts_stats_left w3_counter_grid2">
                <i class="fa fa-ambulance" aria-hidden="true"></i>
                <p class="counter">
                   <?php
                    echo count(DB::table('sellers')
                                    ->where('seller_label' , 0)
                                    ->get());
                    ?> 
                </p>
                <h3 style="font-family: verdana;">Sellers</h3>
            </div>
            <div class="col-md-3 w3layouts_stats_left w3_counter_grid3">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                <p class="counter">
                    <?php
                      echo DB::table('stock')->sum('product_qty');
                    ?> 
                </p>
                <h3 style="font-family: verdana;">Products</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>	
</div>@endsection