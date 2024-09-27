<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <h3>Welcome Admin</h3>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="{{URL::to('/admin-dash')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>



        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Seller </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{url('/add/seller')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add Seller
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{url('/view/seller')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Seller
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> All Districts & Upozila </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{url('/add/district')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add district
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{url('/add/pstation')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add Upozila
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{url('/view/alldp')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View District & Upozila
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Payment </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                {{--<li class="">--}}
                {{--<a href="{{URL::to('/pay/request')}}">--}}
                {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                {{--This Month--}}
                {{--</a>--}}

                {{--<b class="arrow"></b>--}}
                {{--</li>--}}
                <li class="">
                    <a href="{{URL::to('/pay/view/current')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Current Month Report
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{URL::to('/bill/payment/search')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Search All Year
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>



        <li class="">
            <a href="{{URL::to('/seller-request')}}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">Seller Request 
                    <span class="badge badge-grey">
                        <?php
                        $requestcount = DB::table('tbl_registrations')
                                ->get();


                        echo $count = count($requestcount);
                        ?>
                    </span>

                </span>
            </a>


            <b class="arrow"></b>
        </li>

    </ul>

</div>