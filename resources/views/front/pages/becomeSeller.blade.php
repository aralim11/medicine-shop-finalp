@extends('front.master')
@section('title','Become Seller')
@section('main_content')

<div class="services-breadcrumb">
    <div class="container">
        <ul style="font-family: verdana;">
            <li><a href="{{url('/')}}">Home</a><i>|</i></li>
            <li>Become Seller</li>
        </ul>
    </div>
</div>
<!-- //banner1 -->
<div class="banner-bottom" id="about">
    <div class="container">
        <h4 align="center" style="font-family: verdana;">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message');
                    }
                    ?>
        </h4>
        <h4 align="center" style="font-family: verdana;">
                    <?php
                    $exception = Session::get('exception');
                    if ($exception) {
                        echo $exception;
                        Session::put('exception');
                    }
                    ?>
        </h4>
        <h2 class="w3_heade_tittle_agile" style="font-family: verdana;">Registration Form</h2>
        <p class="sub_t_agileits" style="font-family: verdana;">Get in touch...</p>


        <div class="contact-form-aits">
            <form action="{{route('registration')}}" method="post">
                {{csrf_field()}}
                <input type="text" class="margin-right" name="seller_name" placeholder="Your Name" required="">
                <input type="email" name="seller_email" placeholder=" Your Email" required="">
                <input type="text" class="margin-right" name="seller_phone" placeholder="Phone Number" required="">
                <select name="district" style="width: 49%; height: 50px; text-align: center; color: gray; font-weight: bolder;">
                    <option value="">---Select Your District---</option>
                    @foreach($districts as $district)
                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                    @endforeach
                </select>
                <select name="policestation" style="width: 49%; height: 50px; text-align: center; color: gray; font-weight: bolder; margin-left: 9px;">
                    <option value="">---Select Your Police Station---</option>
                    
                </select>
                <input type="text" name="shop_name" placeholder="Shop name" required="">
                <textarea name="message" placeholder="Message" required=""></textarea>
                <div class="send-button agileits w3layouts">
                    <button class="btn btn-primary">SEND MESSAGE</button>
                </div>
            </form>
            <ul class="agileits_social_list two">
                <li class="fallow" style="font-family: verdana;"> Follow Us :</li>
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
            </ul>

        </div>
    </div>
</div>

<div class="map_agile">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703983763!2d90.2792381153168!3d23.780573256416275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1511340056839" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


</div>
 <script type="text/javascript">

  $("select[name='district']").change(function(){

      var district_id = $(this).val();

      var token = $("input[name='_token']").val();

      $.ajax({

          url: "<?php echo route('select-registration') ?>",

          method: 'POST',

          data: {district_id:district_id, _token:token},

          success: function(data) {

            $("select[name='policestation'").html('');

            $("select[name='policestation'").html(data.options);

          }

      });

  });
</script>

@endsection
