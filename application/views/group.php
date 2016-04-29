

<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title><?= $data[0]['name']?></title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .event {
        background-color: #A3C5BD;
        height: 50px;
        border-radius: 10px;
        margin: 20px 0;
      }
      .event:hover {
        -webkit-box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
        -moz-box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
        box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
      }
      .e-name {
        padding-top: 5px;
      }
      .e-time {
        padding-left: 70px;
        padding-top: 7px;
      }
      textarea {
        resize: none;
      }
      .form-input {
        width: 400px;
      }
      .group-members, .group-leaderboard {
        margin-bottom: 50px;
        border: 1px solid gray;
      }
      .g-m-content, .g-i-content {
        margin: 10px;
      }
      .g-m-i img{
        height: 50px;
        border-radius: 50%;
        margin: 5px;
      }
      .leaderboard-list li {
        list-style: none;
        border-top: 1px solid gray;
        width: 85%;
        padding: 10px 0;
      }
      .leaderboard-list li:hover {
        background-color: silver;
      }
      .leaderboard-list a {
        text-decoration: none;
        color: inherit;
      }
      #comment_area{
        height: 140px;
        width:  100%;
        border: 1px solid gray;
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
      <h1><?= $data[0]['name']?></h1>
      <?php // var_dump($data); var_dump($leaders);?>
      <div class='col-md-6'>
        <div class='active-events'>
          <h2>Active Events</h2>

          <?php
            foreach($data[2] as $event) {
              if($event['active'] != 1){
              $time = $event['event_time'];
              $time = date('F d: ha', strtotime($time));
              ?>
              <a href='/event/<?= $event['id']?>'><div class='event'>
                <div class='e-name col-md-8'>
                  <h4><?=$event['event_name']?></h4>
                </div>
                <div class='e-time col-md-4'>
                  <h5><?=$time?></h5>
                </div>
              </div></a>
              <form action='/dashboard/add_score' method='post'>
              <input type='hidden' name='event_id' value='<?= $event['id'] ?>'>
              <input type='submit' value='End Event'>
            </form>
              <?php
             } }
          ?>

          <!-- <a href=''>Show More Events</a> -->

          <?php if($this->session->userdata['id'] == 1 || $this->session->userdata['id'] == $data[0]['admin_user_id']) {?>
            <!-- <a class='pull-right' href=''>Add Event</a> -->
            <form action='/dashboard/add_event' method='post'>
              <input type='hidden' name='circle_id' value='<?= $data[0]['id'] ?>'>
              <input type='text' name='event_name' placeholder='Event Name'>
              <input type='date' name='event_date'>
              <input type='time' name='event_time'>
              <input type='submit' value='Add Event'>
            </form>
          <?php }?>
        </div>
        <div class='chat'>
          <h2>Smack Talk</h2>
          
          <div id="comment_area" overflow="scroll">
            <?php foreach($comments as $comment){
              // echo "<small>".$comment['created_at']."</small> ";
              echo $comment['username']. ': ' .$comment['content'];
              echo "<br>";
            } ?>
          </div>
          <form action='/dashboard/add_comment' method='post'>
            <input class='form-input' type='text' name='message' placeholder='Tell them how you feel.'>
            <input type='hidden' name='circle_id' value='<?= $data[0]['id']; ?>'>
            <input type='submit'  value='Post'>
          </form>
        </div>
      </div>
      <div class='col-md-4 col-md-offset-2'>
        <div class='group-members'>
          <div class='g-m-content'>
            <h3 class='text-center'>Members</h3>

            <?php $user = false;
              foreach($data[1] as $person) {
                if($person['id'] == $this->session->userdata['id']) {
                  $user = true;
                }
              }
              if($this->session->userdata['id'] == 1 || $user == true) {?>
              <a href='/group/add/<?= $data[0]['id']; ?>'>Add Member</a>
            <?php  } else { ?>
              <a href=''><button>Join Group</button></a>
            <?php } ?>

            <div class='g-m-i'>
              <?php //foreach(member) {}?>
              <a href=''><img src='/assets/sloth.jpg'></a>
              <a href=''><img src='/assets/wolf.png'></a>
              <a href=''><img src='/assets/headphone.jpg'></a>
              <a href=''><img src='/assets/illum.jpg'></a>
              <a href=''><img src='/assets/nbc.jpg'></a>
              <a href=''><img src='/assets/headphone.jpg'></a>
              <a href=''><img src='/assets/nbc.jpg'></a>
              <a href=''><img src='/assets/illum.jpg'></a>
              <a href=''><img src='/assets/wolf.png'></a>
              <a href=''><img src='/assets/sloth.jpg'></a>
            </div>
            <!-- <a href=''>Show All Members</a> -->
          </div>
        </div>
        <div class='group-leaderboard'>
          <div class='g-l-content'>
            <h3 class='text-center'>Group Leaderboard</h3>
            <ul class='leaderboard-list'>
             <?php $rank_count=0; ?>
             <?php if($rank_count<3){ ?>
             <?php foreach ($leaders as $leader) { ?>
             <?php $rank_count++; ?>
               <a href=''><li><?= $rank_count; ?> <?= $leader['username']; ?>: <?= $leader['score']; ?></li></a>
             <?php }} ?>
              <!-- <a href=''><li>1: Bertha</li></a>
              <a href=''><li>2: Gretel</li></a>
              <a href=''><li>3: Elmer</li></a> -->
            </ul>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
