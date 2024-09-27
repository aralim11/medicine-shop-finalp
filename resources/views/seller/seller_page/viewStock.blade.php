@extends('seller.sellerMaster')
@section('seller_main_comtent')


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{URL::to('/seller-dash')}}">Home</a>
                </li>

                <li>
                    <a href="#">Stock Product</a>
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
                    <!-- PAGE CONTENT BEGINS -->


                    <div class="row">
                        <div class="col-xs-12">
                            <div style="width: 20%">  
                                <input type="text" name="search" id="search" placeholder="Search " class="form-control" />  
                            </div> 

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                All Stock Product
                            </div>


                            <div>
                                <table id="employee_table"  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th>Product Name</th>
                                            <th>MG</th>
                                            <th>Brand</th>
                                            <th>Purchase Price</th>
                                            <th>Sale Price Price</th>
                                            <th>Quantity</th>


                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($show_stock_product as $v_show_product)

                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">{{$v_show_product->product_name}}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{$v_show_product->product_mg}}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{$v_show_product->supplier_name}}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{$v_show_product->purchase_price}}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{$v_show_product->sale_price}}</a>
                                            </td>

                                            <td>
                                                <a href="#">{{$v_show_product->product_qty}}</a>
                                            </td>


                                            
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#search').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#employee_table tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (found == 'true')
                {
                    $(this).show();
                } else
                {
                    $(this).hide();
                }
            });
        }
    });


</script>


@endsection

