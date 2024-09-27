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


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="center">
                        <h3>
                            Year Wise Payment
                        </h3>
                        <hr>
                    </div>



                    <div class="row" style="margin-left: 10%;">

                        {!! Form::open(['url' => '/view/bill-payment', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                        <div class="col-md-4 col-xs-3">
                            <div style="float: right;">
                                <select name="year"  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">

                                    <option >---Select Year---</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                        </div>




                        <div class="col-md-2 col-xs-3">

                        </div>


                        <!-- <div class="clearfix form-actions"> -->
                        <div class="col-md-3 ">
                            <!-- <h4></h4> -->
                            <button class="btn btn-info" >
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Search
                            </button>

                        </div>
                        {!! Form::close() !!}
                    </div>


                    <div class="row">
                        <div class="col-xs-12">


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
                                            <th>Month</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>

                                    @foreach($payment as $v_payment)
                                    <tbody>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">{{$v_payment->month_name}}</a>
                                            </td> 

                                            <?php 
                                            if($v_payment->warning_lavel ==0){
                                            ?>
                                            <td>
                                                <a href="#">Paid</a>
                                            </td> 
                                            <?php } else{ ?>
                                            
                                            <td style="background: #00cc99; color: red;">
                                                <a href="#" style="color: red;">Not Paid</a>
                                            </td>
                                            
                                            <?php }?>

                                            <td>
                                                <a href="#">{{$v_payment->created_at}}</a>
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

