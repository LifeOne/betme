<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type="text/css">
		form{
		margin: 3em;
	}
	a{
		margin-left: 3em;
	}
	#first_name{
		border-color: <?php if($this->session->userdata('error_first')){
			?> red; <?php } ?>
	}
	#last_name{
		border-color: <?php if($this->session->userdata('error_last')){
			?> red; <?php } ?>
	}
	#email{
		border-color: <?php if($this->session->userdata('error_email') || $this->session->userdata('error_user')){
			?> red; <?php } ?>
	}
	#password{
		border-color: <?php if($this->session->userdata('error_password') || $this->session->userdata('error_match') || $this->session->userdata('error_length')){
			?> red; <?php } ?>
	}
	#cpassword{
		border-color: <?php if($this->session->userdata('error_cpassword') || $this->session->userdata('error_match')){
			?> red; <?php } ?>
	}
	#error{
		color:red;
	}
	</style>
</head>
<body>

	<div id="container">
		<form action="register" method="post">
			<fieldset class="form-group">
				<small class="text-muted">All fields are required.</small><br>
    			<label for="first_name">First Name</label>
    			<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
  			</fieldset>
  			<?php if($this->session->userdata('error_first')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_first'); ?> </small> <?php 
  			$this->session->unset_userdata('error_first'); } ?>

  			<fieldset class="form-group">
    			<label for="last_name">Last Name</label>
    			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
  			</fieldset>
  			<?php if($this->session->userdata('error_last')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_last'); ?> </small> <?php 
  			$this->session->unset_userdata('error_last'); } ?>

        <fieldset class="form-group">
          <label for="last_name">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </fieldset>
        <?php if($this->session->userdata('error_username')){
        ?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_username'); ?> </small> <?php
        $this->session->unset_userdata('error_username'); } ?>

  			<fieldset class="form-group">
    			<label for="email">Email address</label>
    			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
  			</fieldset>
  			<?php if($this->session->userdata('error_email')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_email'); ?> </small> <?php 
  			$this->session->unset_userdata('error_email'); } ?>
  			<?php if($this->session->userdata('error_user')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_user'); ?> </small> <?php 
  			$this->session->unset_userdata('error_user'); } ?>

  			<fieldset class="form-group">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
    			<small class="text-muted"> Password must be at least 7 characters.</small>
  			</fieldset>
  			<?php if($this->session->userdata('error_password')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_password'); ?> </small> <?php
  			$this->session->unset_userdata('error_password'); } ?>
  			<?php if($this->session->userdata('error_length')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_length'); ?> </small> <?php 
  			$this->session->unset_userdata('error_length'); } ?>

  			<fieldset class="form-group">
    			<label for="cpassword">Confirm Password</label>
    			<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
  				<?php if($this->session->userdata('error_match')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_match'); ?> </small> <?php 
  			$this->session->unset_userdata('error_match'); } ?>
  			</fieldset>
  			<?php if($this->session->userdata('error_cpassword')){
  			?><small class="text-muted" id="error"><?php echo $this->session->userdata('error_cpassword'); ?> </small> <?php 
  			$this->session->unset_userdata('error_cpassword'); } ?>
  			<button type="submit" class="btn btn-primary">Submit</button>
  			<small class="text-muted"><a href="/">Already have an account? Go login.</a></small>
  		</form>
  		



	</div>
</body>
</html>