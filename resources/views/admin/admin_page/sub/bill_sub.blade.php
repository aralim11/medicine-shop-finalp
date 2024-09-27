@extends('admin.admin_page.bill_payment')
@section('sub_page')


<div class="row">
    <div class="col-xs-12">


        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
                Payment Report
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
                        <th>Shop Name</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th>Total</th>
                    </tr>
                </thead>


                <tbody>

                @foreach($billPayView as $v_billPayView)

                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>{{$v_billPayView->shop_name}}</td>

                        @if($v_billPayView->warning_lavel == 1)
                            <td style="color: #8A3104;">Not Paid [Warning]</td>
                        @elseif ($v_billPayView->warning_lavel == 2)
                            <td style="color: red;">Not Paid [Suspended]</td>
                        @else
                            <td>Paid</td>
                        @endif

                        @if($v_billPayView->warning_lavel == 0)
                            <td>{{$v_billPayView->updated_at}}</td>
                        @else
                            <td>{{$v_billPayView->created_at}}</td>
                        @endif
                        
                        <td>{{$v_billPayView->amount}}</td>

                    </tr>
                @endforeach
                
                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total : 
                        <?php
                        
                        echo $totalAmount;
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection