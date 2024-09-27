<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Dashboard - Ace Admin</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="public/asset/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="public/asset/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="public/asset/assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="public/asset/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="public/asset/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="public/asset/assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>


    <div class="main-content">
        <div class="main-content-inner">

            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">


                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-large">
                                        <h3 class="widget-title grey lighter">
                                            <i class="ace-icon fa fa-leaf green"></i>
                                            Customer Invoice
                                        </h3>

                                        <div class="widget-toolbar no-border invoice-info">
                                            <span class="invoice-info-label">Invoice:</span>
                                            <span class="red">{{$invoiceById->invoice_id}}</span>

                                            <br />
                                            <span class="invoice-info-label">Date:</span>
                                            <span class="blue">{{date('d-M-Y')}}</span>
                                        </div>

                                        <div class="widget-toolbar hidden-480">
                                            <a href="{{URL::to('pdf')}}">
                                                <i class="ace-icon fa fa-print"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main padding-24">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                                            <b>Company Info</b>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <ul class="list-unstyled spaced">
                                                            <li>
                                                                <i class="ace-icon fa fa-caret-right blue"></i>{{$sellerinfo->shop_name}}
                                                            </li>

                                                            <li>
                                                                <i class="ace-icon fa fa-caret-right blue"></i>{{$sellerinfo->pstation_name}}, {{$sellerinfo->district_name}}
                                                            </li>


                                                            <li>
                                                                <i class="ace-icon fa fa-caret-right blue"></i>
                                                                Phone:
                                                                <b class="red">{{$sellerinfo->seller_phone}}</b>
                                                            </li>

                                                            <li class="divider"></li>

                                                            <li>
                                                                <i class="ace-icon fa fa-caret-right blue"></i>
                                                                Paymant Info
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div><!-- /.col -->


                                            </div><!-- /.row -->

                                            <div class="space"></div>

                                            <div>
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">#</th>
                                                            <th>Product</th>
                                                            <th class="hidden-xs">Quantity</th>
                                                            <th class="hidden-480">Sale Price</th>
                                                            <th class="hidden-480">Vat</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($allsaleinfo as $voucher_datas)

                                                        <tr>
                                                            <td class="center">1</td>

                                                            <td>
                                                                <a href="#">{{$voucher_datas->product_name}}</a>
                                                            </td>
                                                            <td class="hidden-480"> {{$voucher_datas->sale_price}}</td>
                                                            <td>{{$voucher_datas->quantity}}</td>
                                                            <td>{{$voucher_datas->vat}}</td>
                                                            <td>{{$voucher_datas->total}}</td>

                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="hr hr8 hr-double hr-dotted"></div>

                                            <div class="row">


                                                <div class="col-sm-5 pull-right">
                                                    <h4 class="pull-right">
                                                        Total amount :
                                                        <span class="red">$ 
                                                        </span>
                                                    </h4>
                                                </div>
                                                <div class="col-sm-7 pull-left"> Extra Information </div>
                                            </div>

                                            <div class="space-6"></div>
                                            <div class="well">
                                                Thank you for choosing {{$sellerinfo->shop_name}} products.
                                                We believe you will be satisfied by our services.
                                            </div>
                                        </div>
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


    </body>
</html>

