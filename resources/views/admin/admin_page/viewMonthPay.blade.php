@extends('admin.admin_main')
@section('main_comtent')


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#"> Payment Of <?php echo date('M'); ?></a>
                </li>
            </ul>

            
        </div>
        
        <div class="page-content">

           

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    
                    <div class="center">
                        <h3>
                            Monthly Bill Payment
                        </h3>
                        <h4 align="center" style="color: red;"> Today: {{date('d-M-Y')}} &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  Month: {{date('M-Y')}}</h4>
                        
                    </div>


                    <div class="row">
                        <div class="col-xs-12"><hr>
                            <div style="width: 20%">  
                                <input type="text" name="search" id="search" placeholder="Search " class="form-control" />  
                            </div>

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                All Seller
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
                                            <th>Shop Name</th>
                                            <th>Seller Name</th>
                                            <th>Status</th>
                                            <th>payment Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                      @foreach($allSellerCurrentPayment as $v_allSellerCurrentPayment)

                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            
                                            
                                            <td class="hidden-480">{{$v_allSellerCurrentPayment->shop_name}}</td>
                                            <td>{{$v_allSellerCurrentPayment->seller_name}}</td>
                                            
                                            
                                            <?php if($v_allSellerCurrentPayment->warning_lavel == 0) {?>
                                            <td class="hidden-480">
                                                <span class="label label-sm label-success">Paid</span>
                                            </td>
                                            
                                            <?php } else {?>
                                            
                                            <td class="hidden-480">
                                                <span class="label label-sm label-warning">Not Paid Yet</span>
                                            </td>
                                            
                                            <?php }?>
                                            
                                            
                                            <td class="hidden-480">
                                                <span><?php echo $v_allSellerCurrentPayment->created_at;?></span>
                                            </td>
                                            
                                            <td class="hidden-480">
                                                <span><?php echo $v_allSellerCurrentPayment->amount;?></span>
                                            </td>
                                            
                                           

                                            @endforeach
                                        </tr>
                                        
                                   

                                    </tbody>
                                </table>
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

@endsection

