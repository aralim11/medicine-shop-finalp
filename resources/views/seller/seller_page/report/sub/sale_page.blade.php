@extends('seller.seller_page.report.salereport')
@section('sub_report_page')
<div class="row">
    <div class="col-xs-12">


        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
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

                        <th>Invoice Id</th>
                        <th>Seller Id</th>
                        <th>Total Amount</th>
                        

                    </tr>
                </thead>

                <tbody>

                   
                    @foreach($salereport as $salereports)
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            <a href="#">{{$salereports->invoice_id}}</a>
                        </td>
                        <td>
                            <a href="#">{{$salereports->seller_id}}</a>
                        </td>
                        <td>
                            <a href="#">{{$salereports->total}}</a>
                        </td>
                    </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection