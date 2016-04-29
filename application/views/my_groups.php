<?php
 ?>

<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>My Groups</title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .group {
        margin: 25px 40px;
      }
      .g-head {
        font-size: 10px;
      }
      .g-h-when {
        display: inline-block;
        text-align: left;
      }
      .g-h-event {
        display: inline-block;
        float: right;
        text-align: right;
      }
      .g-body {
        height: 90px;
        background-color: silver;
        border-radius: 10px;
      }
      .g-b-name {
        padding: 0 0 0 20px;
      }
      .g-b-event {

      }
      .g-b-p {
        padding-top: 5px;
      }
      .g-b-i {
        border-radius: 50%;
        height: 30px;
        margin: 2px;
      }
      .g-b-i-d {
        padding-top: 3px;
      }
      a {
        text-decoration: none;
        color: inherit;
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
            <li><a href="loginnreg/logoff">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class='container row col-md-6 col-md-offset-3'>
      <h1 class='text-center'>My Groups</h1>


      <?php foreach($circles as $circle) { ?>
        <a href='group/<?=$circle['circle_id']?>'><div class='group'>
          <div class='g-header'>
            <div class='g-h-when'>
              April 29: 6PM
            </div>
            <div class='g-h-event'>
              Bachelor Winner
            </div>
          </div>
          <div class='g-body'>
            <div class='row'>
              <h3 class='col-md-6 g-b-name'><?=$circle['name'] ?></h3>
              <div class='g-b-i-d col-md-3 col-md-offset-3'>
                <img class='g-b-i' src='headphone.jpg'>
                <img class='g-b-i' src='nbc.jpg'>
                <img class='g-b-i' src='illum.jpg'>
                <img class='g-b-i' src='sloth.jpg'>
              </div>
            </div>
          </div>
        </div></a>
      <?php } ?>

    </div>
  </body>
</html>
