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

                <li>
                    <a href="#">Sale Report</a>
                </li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">




            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="center">
                        <h3>
                            Date To Date And Supplier Wise search
                        </h3>
                        <hr>
                    </div>


                    <div class="row" style="margin-left: 10%;">
                    {!! Form::open(['url' => '/view/sale/report', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}

                        <div class="col-md-3 col-xs-3">
                            <!-- <h4>Start </h4> -->
                            <div class="input-group">

                                <input class="form-control date-picker" name="start" id="start" type="text" data-date-format="yyyy-mm-dd"dd />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>

                            </div>
                        </div>


                        
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
                                Purchase Report <span><?php echo Session::get('$p_start_date'); ?></span>
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            
                            @yield('sub_report_page')
                            
                        </div>
                    </div>

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




@endsection

