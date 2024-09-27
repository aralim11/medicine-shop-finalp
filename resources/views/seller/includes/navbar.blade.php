<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{URL::to('/seller-dash')}}" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    <?php
                    $shop_name = Session::get('shop_name');
                    echo $shop_name;
                    ?>
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <?php
                        $sellerLebel = Session::get('seller_label');
                        if ($sellerLebel == 0){

                    ?>
                <li class="purple dropdown-modal" title="Product Notification">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-medkit icon-animated-bell icon-animated-vertical"></i>
                        <span class="badge badge-important">

                            <?php
                            $seller_id = Session::get('seller_id');

                            $show_product = DB::table('stock')
                                    ->join('tbl__products', 'stock.product_id', '=', 'tbl__products.product_id')
                                    ->join('suppliers', 'stock.supplier_id', '=', 'suppliers.supplier_id')
                                    ->where('stock.seller_id', $seller_id)
                                    ->where('stock.product_qty', 0)
                                    ->get();

                            echo $count = count($show_product);
                            ?>


                        </span>
                    </a>
                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            Product Notification
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                        @foreach($show_product as $v_show_product)

                                        <li title="Purchase Product">
                                            <a href="{{URL::to('/add/purchase-product/'.$v_show_product->product_id)}}">
                                                <i class="btn btn-xs btn-primary fa fa-user"></i>
                                                {{$v_show_product->product_name}} is Out Of Stock.
                                            </a>
                                        </li>

                                        @endforeach


                                    </ul>
                                </li>

                            </ul>
                        </li>
                    </ul>
                       
                </li>
                        <?php } ?>
                
               

                <li class="green dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-money icon-animated-vertical"></i>
                        <span class="badge badge-success">
                           <?php
                            $seller_id = Session::get('seller_id');
                                $due = DB::table('tbl_payment')
                                        ->join('tbl_month' , 'tbl_payment.month', '=' , 'tbl_month.month_id')
                                        ->where('seller_id' , $seller_id)
                                        ->where('warning_lavel' , 1)
                                        ->get();
                                
                                
                                echo $count = count($due);        
                            
                            ?>  
                               
                        </span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            Bill Notification
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                        @foreach($due as $v_due)

                                        <li title="Purchase Product">
                                            <a href="{{URL::to('/bill/pay/seller')}}">
                                                <i class="btn btn-xs btn-primary fa fa-user"></i>
                                                {{$v_due->month_name}} Is Not paid.
                                            </a>
                                        </li>

                                        @endforeach


                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-footer">
                            
                        </li>
                    </ul>
                </li>

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        
                        <span class="user-info">
                            <small>Welcome,</small>
                            <?php
                            $seller_name = Session::get('seller_name');
                            echo $seller_name;
                            ?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        

                        <li>
                            <a href="{{URL::to('/my/profile')}}">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{URL::to('/seller-logout')}}">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>