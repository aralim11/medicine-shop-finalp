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
                    <a href="#">Purchase Report</a>
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

                    {!! Form::open(['url' => '/view/purchase/report', 'method'=>'POST', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}

                    <div class="row" style="margin-left: 10%;">


                        <div class="col-md-3 col-xs-3">
                            <!-- <h4>Start </h4> -->
                            <div class="input-group">

                                <input class="form-control date-picker" name="start" id="start" type="text" data-date-format="yyyy-mm-dd"dd />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>

                            </div>
                        </div>

                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">

                                <input class="form-control date-picker" name="end" id="end" type="text" data-date-format="yyyy-mm-dd"dd />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>

                            </div>
                        </div>


                        <div class="col-md-3 col-xs-3">
                            <!-- <h4>Supplier/Company </h4> -->
                            <select name="supplier_id"  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose Users...">
                                <?php
                                $seller_id = Session::get('seller_id');

                                $brand = DB::table('suppliers')
                                        ->where('seller_id', $seller_id)
                                        ->get();
                                ?>
                                <option >---Select Brand Name---</option>
                                @foreach ($brand as $v_brand)

                                <option value="{{$v_brand->supplier_id}}">{{$v_brand->supplier_name}}</option>

                                @endforeach
                            </select>
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
                    @yield('sub_report_page')

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

