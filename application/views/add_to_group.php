<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>Friends</title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .text-center a {
        margin-right: 10px;
        margin-left: 10px;
        font-size: 20px;
      }
      table {
        width: 90%;
        border: 3px solid silver;
      }
      .table-container {
        margin-top: 50px;
      }
      th {
        /*border: 1px solid gray;*/
      }
      .th-1 {
        width: 40%;
      }
      .th-2 {
        width: 15%;
      }
      .th-3 {
        width: 20%;
      }
      .th-4 {
        width: 25%;
      }
    </style>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">BetMe</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Groups</a></li>
            <li><a href="">Leaderboard</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class='container'>
      <div class='text-center'>
        <h1>Friends</h1>
      </div>

      <div class='table-container row'>
        <div class='col-md-8 col-md-offset-2'>
          <table class='table table-striped'>
            <thead>
              <th class='th-1'>Username</th>
              <th class='th-2'>Standing</th>
              <th class='th-3'>Score</th>
              <th class='th-4'>Remove</th>
            </thead>
            <tbody>
              <tr><td>TooDope</td><td>2</td><td>2525</td><td><form action='/dashboard/add_user_circle/1/2' method='post'><input type='submit' value='Add To Group'></form></td></tr>
              <tr><td>NatFerd</td><td>4</td><td>2250</td><td><form action='' method='post'><input type='submit' value='Add To Group'></form></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
