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
                    <a href="#">All Districts & Upozila</a>
                </li>
            </ul>

            
        </div>
        
        <div class="page-content">

            

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
                                All Districts & Upozila
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
                                            <th>District Name</th>
                                            <th>Upozila Name</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($allData as $allDatas)

                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">{{$allDatas->district_name}}</a>
                                            </td>
                                            <td>{{$allDatas->pstation_name}}</td>
                                            

                                           

                                            
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



