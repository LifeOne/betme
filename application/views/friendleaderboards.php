<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>Leaderboard</title>
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
        width: 20%;
      }
      .th-2 {
        width: 55%;
      }
      .th-3 {
        width: 25%
      }
      .g-f-toggle {
        padding: 0 10px;
        text-align: right;
      }
      .g-f-toggle2 {
        padding: 0 10px;
        text-align: left;
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
            <li><a href="/profile_view">Dashboard</a></li>
            <li><a href="/groups">Groups</a></li>
            <li><a href="/leaderboard">Leaderboard</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/loginnreg/logoff">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class='container'>
      <div class='text-center'>
        <h1>Leaderboard</h1>
        <div class='row'>
          <div class='g-f-toggle col-md-1 col-md-offset-5'>
            <a href='/leaderboard'>Global</a>
          </div>
          <div class='g-f-toggle2 col-md-1'>
            <a href='/friendleaderboard'>Friends</a>
          </div>
        </div>
      </div>


      <div class='table-container row'>
        <div class='col-md-6'>
          <h3 class='text-center'>All Time</h3>
          <table class='table table-striped'>
            <thead>
              <th class='th-1'>Standing</th>
              <th class='th-2'>Username</th>
              <th class='th-3'>Score</th>
            </thead>
            <tbody>
              <?php $count = 1; foreach($friends as $person) { ?>
                <tr><td><?=$count?></td><td><?= $person['username'] ?></td><td><?= $person['score'] ?></td></tr>
              <?php $count++; } ?>
            </tbody>
          </table>
        </div>

        <div class='col-md-6'>
          <h3 class='text-center'>Monthly</h3>
          <table class='table table-striped'>
            <thead>
              <th class='th-1'>Standing</th>
              <th class='th-2'>Username</th>
              <th class='th-3'>Score</th>
            </thead>
            <tbody>
              <?php $count = 1; foreach($friends as $person) { ?>
                <tr><td><?=$count?></td><td><?= $person['username'] ?></td><td><?= $person['score'] ?></td></tr>
              <?php $count++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>








  </body>
</html>
