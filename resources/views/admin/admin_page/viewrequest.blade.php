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
                    <a href="#">All Seller</a>
                </li>
            </ul>

        </div>

        <div class="page-content">

            <div class="page-header">
                <h1 align="center"  style="color: red;">
                    <?php
                    $exception = Session::get('exception');
                    if ($exception) {
                        echo $exception;
                        Session::put('exception');
                    }
                    ?>
                </h1>

                <h1 align="center">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message');
                    }
                    ?>
                </h1>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div style="width: 20%">  
                                <input type="text" name="search" id="search" placeholder="Search " class="form-control" />  
                            </div>

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                All Seller
                            </div>
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
                                            
                                            <th>Seller Name</th>
                                            <th>Shop Name</th>
                                            <th class="hidden-480">Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($viewsellerrequest as $v_viewsellerrequest)

                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">{{$v_viewsellerrequest->seller_name}}</a>
                                            </td>
                                            
                                            <td class="hidden-480">{{$v_viewsellerrequest->shop_name}}</td>
                                            <td>{{$v_viewsellerrequest->seller_phone}}</td>

                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                    
                                                    <a class="green" href="{{URL::to('/accept/request')}}/{{$v_viewsellerrequest->seller_id}}" title="Active Seller">
                                                        <i class="ace-icon fa fa-check bigger-130"></i>
                                                    </a>
                                                    

                                                </div>

                                                <div class="hidden-md hidden-lg">
                                                    <div class="inline pos-rel">
                                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                    <span class="blue">
                                                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                    <span class="green">
                                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                    <span class="red">
                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        

                                    </tbody>
                                </table>
                            </div>
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

