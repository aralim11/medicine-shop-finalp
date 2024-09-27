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
            <h3 class="text-center">Search Products</h3>
        </div>
        
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well" style="color: white;background-color: black; border-radius: 30px;">
                        <h3 class="text-center">No Products Here</h3>
                    </div>
                </div>
                          

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



