
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta charset="utf-8" />
            <title></title>

            <meta name="description" content="Common form elements and layouts" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

            <!-- bootstrap & fontawesome -->
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/bootstrap.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

            <!-- page specific plugin styles -->
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/jquery-ui.custom.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/chosen.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/bootstrap-datepicker3.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/bootstrap-timepicker.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/daterangepicker.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/bootstrap-datetimepicker.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/bootstrap-colorpicker.min.css')}}" />

            <!-- text fonts -->
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/fonts.googleapis.com.css')}}" />

            <!-- ace styles -->
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
            <![endif]-->
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/ace-skins.min.css')}}" />
            <link rel="stylesheet" href="{{asset('public/asset/assets/css/ace-rtl.min.css')}}" />

            <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
            <![endif]-->

            <!-- inline styles related to this page -->

            <!-- ace settings handler -->
            <script src="{{asset('public/asset/assets/js/ace-extra.min.js')}}"></script>
            <script src="{{asset('public/asset/assets/js/test.js')}}"></script>

            <style>
                #country-list{float:left;list-style:none;}
                #country-list li{padding: 5px; padding:0px 36px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid; }
                #country-list li:hover{background:#ece3d2;cursor: pointer;}
            </style>



            <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
            <script src="http://code.jquery.com/jquery-1.10.2.js"/>
            <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"/>
            <!--[if lte IE 8]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>



            <![endif]-->


        </head>

        <body class="no-skin">


            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">




                        <div class="row">
                            <div class="col-xs-12">


                                <!-- #section:basics/content.breadcrumbs -->
                                <div class="breadcrumbs" id="breadcrumbs">
                                    <script type="text/javascript">
    try {
        ace.settings.check('breadcrumbs', 'fixed')
    } catch (e) {
    }
                                    </script>

                                    <ul class="breadcrumb">
                                        <li>
                                            <i class="ace-icon fa fa-home home-icon"></i>
                                            <a href="">Home</a>
                                        </li>


                                    </ul>

                                </div>
    <!--<div class="frmSearch">
        <input type="text" id="search-box" placeholder="Country Name" />
        <div id="suggesstion-box"></div>
    </div>-->
                                <div class="page-content">


                                    <section >
                                      
                                            <div class="wrapper">
                                                <div class="row">
                                                    <div class="panel panel-default">
                                                        <div class="col-md-8" style="border:0px solid #ff5722;">
                                                            <div class="row">
                                                                <div class="col-md-12"><h1 style="color:#4527a0;"><b>(</b><b id='count'>0</b><b>)</b></h1></div>
                                                                <div class="col-md-12">
                                                                    <table border="1" style="background-color:#99CCFF;border-collapse:collapse;border:1px solid #666699;color:#000000;width:100%" cellpadding="3" cellspacing="3">
                                                                        <tr>
                                                                            <td>Invoice No.</td>
                                                                            <!-- <td>
                                                                                Customer ID
                                                                            </td> -->
                                                                            <!-- <td>Phone</td> -->
                                                                            <td>Payment type</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input readonly type="text" name="invoice_id" class="Textbox" value="" style="width: 50%;"/></td>

                         <!--        <td><input onchange="customerss()" name="customer_id" id="customer" type="text" class="Textbox" value="" /></td> -->
                             <!--    <td><input onchange="phones()"  id="phone" type="text" class="Textbox" value="" /></td> -->

                                                                            <td>
                                                                                <select id="paymenttpe" name="payment_type"  class="Textbox"style="width: 40%;">
                                                                                    <option value="cash" >Cash</option>
                                                                                    <option value="card" >Card</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top:5px;">
                                                                <form action="total-amount" method="post">
                                                                    {{csrf_field()}}
                                                                <div class="col-md-4">
                                                                    <div class="frmSearch" style="margin-left:20px;">
                                                                        <select name="product_id">
                                                                            <option>---Select Your Product---</option>
                                                                          @foreach($productNameBySellerId as $productNameBySeller)
                                                                            <option value="{{$productNameBySeller->product_id}}">{{$productNameBySeller->product_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    <div id="suggesstion-box"></div>
                                                                    </div>
                                                                </div>
                                                                   <div class="col-md-4">
                                                                       <input name="product_qty" id="product_qty" type="text" class="bg-success" placeholder="Enter Quantity" value=""  style="width:50%;"/>
                                                                       <select name="stock_id" class="text-success bg-success" style="width:40%">
                                                                           
                                                                       </select>
                                                                  </div>
                                                                    
                                                                <div class="col-md-4"><input type="submit"  class="Textbox btn btn-success" value="Add Item" /></div>
                                                                </form>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered">
                                   
                                                                    </table>
                                                                </div>
                                                                 <div class="col-md-12" style="padding:0px;border: 1px solid graytext; background: white none repeat scroll 0% 0%; height:290px; width: 96%; margin-left: 2%; margin-right: 2%; margin-top: 10px; overflow: scroll;" >
                                                                    <!------------------------------------------------------------------>

                                                                    <table class="table table-bordered">
                                                                                                             <tr>
                                                                            <td><b>Product Name</b></td>
                                                                            <td><b>Price</b></td>
                                                                            <td><b>Quantity</b></td>
                                                                            <td><b>VAT</b></td>
                                                                            <td><b>Seller Name</b></td>
                                                                            <td><b>Total</b></td>
                                                                            <td><b>Remove</b></td>

                                                                        </tr>
                                                                         @foreach($sale as $sales)
                                                                         <tr id="td">
                                                                            <td>{{$sales->product_name}}</td>
                                                                            <td>{{$sales->sale_price}}</td>
                                                                            <td>{{$sales->product_qty.'-'."($product_qty)"}}</td>
                                                                            <td>{{$sales->vat_tax}}</td>
                                                                            <td>{{$sales->seller_name}}</td>
                                                                            <td>{{$t}}</td>
                                                                            <td>
                                                                                <button id="off" onclick="remove();" type="button" class="btn btn-danger" style="color:red;">x</button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                       
                                                                    </table>


                                                                    <!------------------------------------------------------------------>
                                                                </div>
                
                                                            </div>


                                                        </div>
                                                        <div class="col-md-4" style="border:0px solid #ff5722;">

                                                            <div class="col-md-12">
                                                                <h1 style="color:red;">
                                                                    <b>TK. </b>
                                                                    <b id="totoals">{{$t}}</b>
                                                                    <input name="totalprices" id="totalprices" type="hidden" class="Textbox" value="{{$t}}" />
                                                                </h1>
                                                            </div>
                                                            <!---------------------------------------------------------------------->


                                                            <p>Payment Information</p>
                                                            <table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
                                                                <tr>
                                                                    <td>Total VAT</td>
                                                                    <td><input id="vat" name="vat" readonly  type="text" class="Textbox" value="0.00" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:100px;">Cash Paid</td>
                                                                    <td><input name="cash" required id="paid" onchange="duechange()" type="text" class="Textbox" value="0.00" /></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Due</td>
                                                                    <td><input name="due" id="due"  readonly type="text" class="Textbox" value="0.00" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Change</td>
                                                                    <td><input  name="change" id="change" readonly type="text" class="Textbox" value="0.00" /></td>
                                                                </tr>


                                                            </table>

                                                            <p id="cardt" style="display:none;">Card Payment</p>
                                                            <table id="card" border="1" style="display:none;background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
                                                                <tr>
                                                                    <td>Card type</td>
                                                                    <td>
                                                                        <select name="cardtype" class="Textbox">
                                                                            <option>VISA</option>
                                                                            <option>MASTER</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Amount Charged</td>
                                                                    <td><input name="card_amount" type="text" class="Textbox" value="" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Card Number</td>
                                                                    <td><input name="card_number" type="text" class="Textbox" value="" /></td>
                                                                </tr>
                                                                <!--
                                                                <tr>
                                                                    <td>Expiration Date</td>
                                                                    <td><input name="card_exp" type="text" class="Textbox" value="" /></td>
                                                                </tr>
                                                                -->

                                                            </table>

                                                            <table border="0" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
                                                                <tr>

                                                                    <td>
                                                                        <input type="button" onclick="submitsales()" class="sub" value="Submit" />

                                                                        <style>
                                                                            .sub{border:0px; width:100%;background-color: red; height: 50px; font-size: 34px; font-weight: bold; color: white; border-radius: 5px; margin-top: 10px;}
                                                                        </style>
                                                                    </td>
                                                                </tr>


                                                            </table>

                                                            <!---------------------------------------------------------------------->
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                     
                                    </section>

                                    <div class="footer">
                                        <div class="footer-inner">
                                            <div class="footer-content">
                                                <span class="bigger-120">
                                                    <span class="blue bolder">Distributor</span>
                                                    &copy; 2017
                                                </span>

                                                &nbsp; &nbsp;
                                                <span class="action-buttons">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                                        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                                    </a>



                                </div>
                            </div><!--/span-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script type="text/javascript">

  $("select[name='product_id']").change(function(){

      var product_id = $(this).val();

      var token = $("input[name='_token']").val();

      $.ajax({

          url: "<?php echo route('select-quantity') ?>",

          method: 'POST',

          data: {product_id:product_id, _token:token},

          success: function(data) {

            $("select[name='stock_id'").html('');

            $("select[name='stock_id'").html(data.options);

          }

      });

  });

</script>
  
<script type="text/javascript">
    $(document).ready(function(){
        $('#off').click(function(){
          $('#td').remove();  
        });
    });
</script>











    </body>
    </html>

