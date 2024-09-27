<div class="header-bottom">
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo">
                <h1><a class="navbar-brand" href="{{url('/')}}"><span>H</span>ealth <i class="fa fa-plus" aria-hidden="true"></i> <p>Medi Care 4U</p></a></h1>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
            <nav class="menu menu--sebastian">
                <ul id="m_nav_list" class="m_nav menu__list">
                    <li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="{{url('/')}}" class="menu__link"> Home </a></li>


                    <!--                    <li class="m_nav_item menu__item" id="moble_nav_item_3"> 
                                            <a href="#" class="menu__link" data-toggle="modal" data-target="#loginModal">Login</a>
                                            <div class="modal fade" id="loginModal" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content" style="width: 400px;">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="text-center text-success">Login Panel</h3>
                                                        </div>
                    
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <table>
                                                                    <tr>
                                                                        <td>Email/Username:</td>
                                                                        <td><input type="text" class="col-sm-3 form-control modal_login_input" placeholder="Enter your valid email......" /></td>
                    
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Password:</td>
                                                                        <td><input type="password" class="col-sm-3 form-control modal_login_input" placeholder="Enter your valid password......" /></td>
                    
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td align="center"><button type="submit" class="btn btn-lg btn-success">Login</button></td>
                    
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </div>
                    
                                                    </div>
                                                </div>
                                            </div>
                                        </li>-->

                    <li class="m_nav_item menu__item" id="moble_nav_item_7"> <a href="{{url('/product')}}" class="menu__link">Product</a> </li>

                    <li class="m_nav_item menu__item" id="moble_nav_item_6"> <a href="{{url('/becomeSeller')}}" class="menu__link">Become A Seller</a></li>
                </ul>
            </nav>

        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div class="sbar">
        <div class="col-lg-10 form_master_row floating_text">
            <form action="{{route('search')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="search">
                        <div class="col-md-3 form_row" style="position: relative;">
                            <select name="district_id" class="col-md-4 form-control form_input" id="form-field-select-3" style="padding-left: 25px!important;">
                                <option value="">--Select Your City--</option>
                                @foreach($all_district as $districts)
                                <option value="{{$districts->district_id}}">{{$districts->district_name}}</option>
                                @endforeach
                                <!--                                            <option value="AZ">Tangail</option>
                                                                            <option value="AR">Khulna</option>-->


                            </select>
                        </div>
                        <div class="col-md-3 form_row">
                            <select name="pstation_id" class="col-md-4 form-control form_input" id="form-field-select-3" style="padding-left: 25px!important;">
                                <option value="">--Select Your P.S--</option>



                            </select>
                        </div>
                        <div class="col-md-5 form_row">
                            <input name="product_name" type="text" class="col-md-4 form-control form_input" placeholder="Search your Medicine Name...."/>
                        </div>
                        <div class="col-md-1 form_row">
                            <button type="submit" class="btn submit_btn">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">

    $("select[name='district_id']").change(function () {

        var district_id = $(this).val();

        var token = $("input[name='_token']").val();

        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {district_id: district_id, _token: token},
            success: function (data) {

                $("select[name='pstation_id'").html('');

                $("select[name='pstation_id'").html(data.options);

            }

        });

    });

</script>