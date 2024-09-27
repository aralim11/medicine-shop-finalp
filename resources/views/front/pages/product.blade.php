@extends('front.master')
@section('title','Product')
@section('main_content')
<div class="services-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a><i>|</i></li>
            <li style="font-family: verdana;">Products</li>
        </ul>
    </div>
</div>

<div class="container">

    <div class="row">	
        <div class="product_h2">
            <h3 class="text-center" style="font-family: verdana;">Our Products</h3>
        </div>


        <div class="col-md-12 col-sm-12 product_hos">
            <div class="row">
                @foreach($all_product as $all_products)
                <div class="col-md-3">
                    <div class="well product_img">



                        <a href="{{url('single/product/'.$all_products->product_id)}}"><img alt="" src="{{$all_products->product_picture }}"  /></a>	
                        <p class="text-center" style="font-weight: bold; color: black;font-family: verdana;">{{$all_products->product_name}}</p>
                        <p class="text-center"><span style="float: left; font-family: verdana;">{{$all_products->shop_name}}</span><span style="color: black; margin-left: 50px;">{{$all_products->supplier_name }}</span></p>
                        <h4 class="text-center">TK.{{$all_products->sale_price }}</h4>
                        <a href="{{url('single/product/'.$all_products->product_id)}}" class="btn btn-primary btn-block" style="font-family: verdana;">View Details</a>
<!--
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                <input type="hidden" name="amount" value="20.99" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <p class="text-center"><input type="submit" name="submit" value="Add to cart" class="btn btn-block btn-primary" /></p><br/>
                            </fieldset>
                        </form>-->


                    </div>


                </div>
                @endforeach              





            </div>


        </div>

<!--        <div class="row">
            <div class="col-sm-0 col-sm-offset-10">
                <ul class="pagination pagination-sm">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </div>
        </div>-->





    </div>
</div>









<!-- //Tab-1 -->

<!-- Tab-2 -->

<!-- //Tab-2 -->

<!-- Tab-3 -->

<!-- //Tab-3 -->




<!-- //Portfolio -->

@endsection