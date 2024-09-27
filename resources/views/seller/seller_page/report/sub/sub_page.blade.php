@extends('seller.seller_page.report.purchase')
@section('sub_report_page')
<div class="row">
    <div class="col-xs-12">


        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Purchase Report <span><?php echo Session::get('$p_start_date');?></span>
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
            <table id="employee_table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>

                        <th>Product Name</th>
                        <th>Supplier Name</th>
                        <th>Purchase Price</th>
                        <th>Total Purchase price</th>
                        <th>Advance</th>
                        <th>Due</th>
                        <th>Purchase Date</th>

                    </tr>
                </thead>

                <tbody>

                   @foreach($p_report as $v_report)

                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <a href="#">{{$v_report->product_name}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->supplier_name}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->purchase_price}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->total_purchase_price}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->total_advance_price}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->total_due_price}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v_report->created_at}}</a>
                        </td>

                    </tr>

                  @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection