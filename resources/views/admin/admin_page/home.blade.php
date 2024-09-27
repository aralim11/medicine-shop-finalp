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
                <li class="active">Dashboard</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Dashboard
                </h1>
            </div>

            <div class="row">
                <div class="col-xs-12">

                    <div class="row">
                        <div class="space-6"></div>

                        <div class="col-sm-7 infobox-container">
                            <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-male"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number">
                                        <?php
                                        $allSeller = DB::table('sellers')->where('seller_label', 0)->get();

                                        echo count($allSeller);
                                        ?>
                                    </span>
                                    <div class="infobox-content">All Sellers</div>
                                </div>
                            </div>

                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-twitter"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number">

                                        <?php
                                        $currentMonth = date('m');
                                        $newThisMonth = DB::table('sellers')
                                                ->whereRaw('MONTH(created_at) = ?', [$currentMonth])
                                                ->get();

                                        echo $count = count($newThisMonth);
                                        ?>


                                    </span>
                                    <div class="infobox-content">New Seller[ <?php echo date('M'); ?> ]</div>
                                </div>
                            </div>

                            <div class="infobox infobox-pink">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number">
                                        <?php
                                        $allSeller = DB::table('tbl_registrations')->get();

                                        echo count($allSeller);
                                        ?> 
                                    </span>
                                    <div class="infobox-content">New Seller Request</div>
                                </div>
                            </div>

                            <!--                        <div class="infobox infobox-red">
                                                        <div class="infobox-icon">
                                                            <i class="ace-icon fa fa-flask"></i>
                                                        </div>
                            
                                                        <div class="infobox-data">
                                                            <span class="infobox-data-number">7</span>
                                                            <div class="infobox-content">experiments</div>
                                                        </div>
                                                    </div>-->

                            <!--                        <div class="infobox infobox-orange2">
                                                        <div class="infobox-chart">
                                                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
                                                        </div>
                            
                                                        <div class="infobox-data">
                                                            <span class="infobox-data-number">6,251</span>
                                                            <div class="infobox-content">pageviews</div>
                                                        </div>
                            
                                                        <div class="badge badge-success">
                                                            7.2%
                                                            <i class="ace-icon fa fa-arrow-up"></i>
                                                        </div>
                                                    </div>-->

                            <!--                        <div class="infobox infobox-blue2">
                                                        <div class="infobox-progress">
                                                            <div class="easy-pie-chart percentage" data-percent="42" data-size="46">
                                                                <span class="percent">42</span>%
                                                            </div>
                                                        </div>
                            
                                                        <div class="infobox-data">
                                                            <span class="infobox-text">traffic used</span>
                            
                                                            <div class="infobox-content">
                                                                <span class="bigger-110">~</span>
                                                                58GB remaining
                                                            </div>
                                                        </div>
                                                    </div>-->

                            <div class="space-6"></div>

                        </div>

                        <div class="vspace-12-sm"></div>


                    </div><!-- /.row -->

                    <div class="hr hr32 hr-dotted"></div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>

@endsection