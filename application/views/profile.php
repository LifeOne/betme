<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title><?php echo $user_data['username']; ?></title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .profile-head {
        padding-top: 10px;
        height: 300px;
        /*background-color: silver;*/
        border: 1px solid gray;
      }
      .profile-body {
        /*height: 1000px;*/
      }
      .footer {
​
      }
      .avatar {
        border: 1px solid gray;
        height: 150px;
        width: 150px;
      }
      .rank {
        height: 150px;
        padding: 4.5em 1.5em;
        text-align: right;
      }
      .rank-img {
        padding: 0;
        margin: 0;
      }
      span {
        margin: 0 25px;
      }
      .push-right-50 {
        margin-left: 50px;
      }
      .friends-col {
        /*background-color: pink;*/
      }
      .groups-col {
        /*background-color: lightgreen;*/
        border-right: 1px solid gray;
      }
      .center {
        text-align: center;
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
        background-color: #3B8F90;
        border-radius: 10px;
      }
      .g-b-name {
        padding: 0 0 0 20px;
      }
      .g-b-event {
​
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
      .friends-content {
        padding: 5px;
      }
      .f-c-i {
        border-radius: 50%;
        height: 50px;
      }
      .f-c-n {
        display: inline-block;
      }
      .friends-content ul li {
        margin: 5px 0;
        list-style: none;
      }
      .f-c-a {
        padding-left: 100px;
      }
      .group a{
        color: inherit;
      }

    </style>
  </head>
  <body>
  <?php 
  // var_dump($user_data);
        // var_dump($circle_data);
        // var_dump($friend_data);
         ?>
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
    <div class='container profile-head'>
      <div class='row'>
        <div class='col-md-1 rank'>
          <span class='rank-img'>Rank</span>
        </div>
        <div class='col-md-3 profile-img'>
          <img class='avatar' src='assets/elephant.jpg'>
        </div>
        <div class='col-md-8'>
          <h1><?php echo $user_data['username']; ?></h1>
          <p><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></p>
          <p class='push-right-50'><?php if($user_data['prof_description']){
                                            echo $user_data['prof_description']; } ?></p>
                                  <?php  if($user_data['prof_description'] == null){ ?>
          <form action='dashboard/update_prof_description' method='post'>
            <p><input class='add-description' type='text' name='description' placeholder='Add description'></p>
            <p><input type='submit' value='Add Description'></p>
          </form>
                                 <?php } ?>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-3 col-md-offset-1'>
          <p>Current Global Score: <?php echo $score['score']; ?></p>
         <!--  <p>Highest Standing: 3</p> -->
        </div>
        <div class='col-md-2 col-md-offset-10'>
          <p><a href=''>View Achievements</a></p>
          <p><a href=''>View Leaderboard</a></p>
        </div>
      </div>
    </div>
    <div class='container'>
      <div class='row'>
        <div class='col-md-10 col-md-offset-1 profile-body'>
          <div class='row'>
            <div class='groups-col col-md-8'>
              <h1 class='center'>My Groups</h1>
              <?php $group_counter=0; ?>
              <?php foreach($circle_data as $circles){ ?>
              <?php if($group_counter<4){ ?>
              <?php $group_counter++; ?>
              <div class='group'>
                <div class='g-header'>
                 <div class='g-h-when'>
                    April 29: 6PM
                  </div>
                  <div class='g-h-event'>
                    Bachelor Winner
                  </div>
                </div>
                <a href="group/<?php echo $circles['circle_id']; ?>"><div class='g-body'>
                  <div class='row'>
                    <h3 class='col-md-6 g-b-name'><?php echo $circles['name']; ?></h3>
                    <div class='g-b-i-d col-md-3 col-md-offset-3'>
                      <img class='g-b-i' src='assets/headphone.jpg'>
                      <img class='g-b-i' src='assets/nbc.jpg'>
                      <img class='g-b-i' src='assets/illum.jpg'>
                      <img class='g-b-i' src='assets/sloth.jpg'>
                    </div>
                  </div>
                </div></a>
              </div> 
              <?php } } ?>
              <a class='f-c-a' href='/my_groups'>View All My Groups</a>
            </div>
            <div class='friends-col col-md-4'>
              <h1 class='center'>Friends</h1>
              <div class='friends-content'>
                <ul>
                <?php $friend_counter=0; ?>
                <?php foreach($friend_data as $friends){ ?>
                  <?php if($friend_counter<4){ ?>
                      <?php $friend_counter++; ?>
                      <li><img class='f-c-i' src='assets/nbc.jpg'><h4 class='f-c-n'><?php echo $friends['username']; ?> </h4></li>
                  <?php }} ?>
               </ul>
               <a class='f-c-a' href='/friends'>View All Friends</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class='footer'>

   </div>
 </body>
</html>