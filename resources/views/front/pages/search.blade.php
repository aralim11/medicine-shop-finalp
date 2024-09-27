@extends('front.master')
@section('title','Search')
@section('main_content')
<div class="services-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a><i>|</i></li>
            <li>Search Products</li>
        </ul>
    </div>
</div>

<div class="container">

    <div class="row">	
        <div class="product_h2">
            <h3 class="text-center" style="font-family: verdana;">Search Products</h3>
        </div>
        
        <h4 align="center" style="font-family: verdana;">
                    <?php
                    $exception = Session::get('exception');
                    if ($exception) {
                        echo $exception;
                        Session::put('exception');
                    }
                    ?>
        </h4>
        
        <div class="col-md-12 col-sm-12 product_search">
            <div class="row">
                @foreach($search as $searches)
                <div class="col-md-3">
                    <div class="well">
                        <a href="{{url('single/product/'.$searches->product_id)}}"><img alt="" src="{{$searches->product_picture }}"  /></a>	
                        <p class="text-center" style="font-weight: bold; color: black">{{$searches->product_name}}</p>
                        <p class="text-center"><span style="float: left;">{{$searches->shop_name}}</span><span style="color: black;">{{$searches->supplier_name }}</span></p>
                        <h4 class="text-center">TK.{{$searches->sale_price }}</h4>
                        <a href="{{url('single/product/'.$searches->product_id)}}" class="btn btn-primary btn-block">View Details</a>
                    </div>

                </div>
                @endforeach              





            </div>


        </div>

        <div class="row">
            <div class="col-sm-0 col-sm-offset-10">
                <ul class="pagination pagination-sm">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </div>
        </div>





    </div>
</div>









<!-- //Tab-1 -->

<!-- Tab-2 -->

<!-- //Tab-2 -->

<!-- Tab-3 -->

<!-- //Tab-3 -->




<!-- //Portfolio -->

@endsection

