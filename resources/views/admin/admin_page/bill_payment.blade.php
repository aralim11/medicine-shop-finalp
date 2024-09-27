@extends('admin.admin_main')
@section('main_comtent')


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
                            Month Wise Payment Report
                        </h3>
                        <hr>
                    </div>


            {!! Form::open(['url' => '/bill/payment/view', 'method'=>'post', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                    <div class="row" style="margin-left: 10%;">

                        
                        <div class="col-md-4 col-xs-3">
                            <div style="float: right;">
                                
                                
                                <select name="month" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                    <option >---Select Month---</option>
                                    <?php
                                    $month = DB::table('tbl_month')
                                            ->get();

                                    foreach ($month as $v_month) {
                                        ?>
                                        <option value="{{$v_month->month_id}}">{{$v_month->month_name}}</option>

                                    <?php } ?>
                                </select>   
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-3">
                            <div style="float: right;">
                                
                                <select name="year" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                    <option >---Select Year---</option>
                                        <option value="2017">2017</option>
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
                       
                        
                        
                    </div>
                    {!! Form::close() !!}

                    @yield('sub_page')

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

