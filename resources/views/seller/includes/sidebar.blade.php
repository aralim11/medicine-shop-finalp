<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <h5>Welcome Dashboard</h5>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>

    <ul class="nav nav-list">
        
        <?php
            $sellerLebel = Session::get('seller_label');
        if ($sellerLebel == 0){

        ?>
        
        <li class="active">
            <a href="{{URL::to('/seller-dash')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>






        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Brand </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">



                <li class="">
                    <a href="{{URL::to('/add/brand')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Add Brand </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{URL::to('/view/brand')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> View Brand </span>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Product </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">



                <li class="">
                    <a href="{{URL::to('/add/product')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Add Product </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{URL::to('/view/product')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> View product </span>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="{{URL::to('/purchase')}}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">Add Purchase </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="{{URL::to('/stock/product')}}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Stock Product </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="{{URL::to('/sale/panel')}}" target="_blank">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text" style="color: #ff3333;"> Sale </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Report </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{URL::to('/purchase/report')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Purshase Report
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{URL::to('/sale/report')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sale 
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        
        <li class="">
            <a href="{{URL::to('/bill/pay/seller')}}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Bill Pay </span>
            </a>

            <b class="arrow"></b>
        </li>
        
         <?php
            }else{

            ?>
            <li class="">
                <a href="{{URL::to('/bill/pay/seller')}}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Bill Pay </span>
                </a>

                <b class="arrow"></b>
            </li>
        <?php
            }

            ?>
        


    </ul>


</div>