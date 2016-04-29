<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	</style>
</head>
<body>


	<div id="container">
		<form action="loggedinuser" method="post">
  			<fieldset class="form-group">
    			<label for="email">Email address</label>
    			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
  			</fieldset>
  			<fieldset class="form-group">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
  			</fieldset>
  			<button type="submit" class="btn btn-primary">Submit</button>
  		<small class="text-muted"><a href="registration">New user? Go register.</a></small>
		</form>

	</div>
</body>
</html>