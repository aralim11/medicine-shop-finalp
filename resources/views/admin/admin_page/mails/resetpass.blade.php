<p>Welcome To Medicare</p>

<?php  $data = Session::get('data'); ?>
<p>Your Email:</p><?php echo $data['admin_email']; ?>
<p>Your Password:</p><?php echo $pass = Session::get('pass'); ?>

