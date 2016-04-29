<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>Events</title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .col-md-6 a {
        text-decoration: none;
        color: inherit;
      }
      .topic:hover {
        -webkit-box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
        -moz-box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
        box-shadow: 0px 0px 43px -3px rgba(22,113,224,1);
      }
      .footer {
        width: 100%;
        height: 50px;
      }
      .wide {
        width: 100%;
        /*height: 100%;*/
        /*height: calc(100% - 1px);*/
        height: 500px;
        background-image: url('/assets/hero.jpg');
        background-size: cover;
      }
      .wide img {
        width: 100%;
      }
      .topic {
        background-color: #6FB5AE;
        height: 100px;
        /*border-radius: 10px;*/
        margin: 20px 0;
      }
      .points {
        color: green;
        font-size: 20px;
        font-weight: bold;
        padding: 5px 0 0 20px;
      }
      .t-img {
        height: 100px;
        /*border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;*/
      }
      .t-img-container {

        padding: 0;
        margin: 0;
      }
      .t-header {
        height: 100px;
      }
      .t-h-text {
        font-size: 20px;
      }
      .arrow {
        font-size: 40px;
        padding-left: 20px;
      }
      .new-topic-question {
        width: 100%;
        margin-top: 10px;
      }
      .new-topic-score {
        width: 25%;
        text-align: center;
      }
      form {
        border: 1px solid gray;
      }
      .error{
        color: red;
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

    <div class="wide" >
    </div>

    <div class="container">
      <div class="text-center">
        <h1>Topics</h1>
        <p><a href='/group/<?= $circle_data['circle_id']; ?>'><button>Back to Group</button></a></p>
        <?php if($this->session->userdata['id'] == $circle_data['admin_id']) { ?>
          <div class='row'>
            <form class='col-md-4 col-md-offset-4' action='/dashboard/add_topic' method='post'>
              <a href=''>Add New Topic</a>
              <p><input class='new-topic-question' type='text' name='topic-question' placeholder='Topic question'></p>
              <p><input class='new-topic-score' type='number' name='topic-score' placeholder='25'></p>
              <input type='hidden' name='event_id' value='<?php echo $id; ?>'>
              <p><input type='submit' value='Add Topic'></p>
              <a class='pull-right' href=''>Hide Form</a>
            </form>
          </div>
        <?php } ?>
      </div>
      <div class='row'>
        <div class='col-md-6'>
        <?php $counter_variable=1;  ?>

        <?php foreach($info as $topic){

          if($counter_variable % 2==1){ ?>

          <a href=''><div class='topic'>
            <div class='col-md-3 t-img-container'>
              <img class='t-img' src='/assets/wtf.jpg'>
            </div>
            <div class='t-header col-md-7'>
              <h4 class='t-h-text'><?php echo $topic['title']; ?></h4>
            </div>
            <div class='col-md-2'>
              <p class='points'>+<?php echo $topic['score']; ?></p>
              <p><i class="fa fa-arrow-circle-o-right arrow" aria-hidden="true"></i></p>
            </div>
          </div></a>
          <form action='/dashboard/add_topic_answer' method='post' style="margin-bottom: 50px;">
            <?php if($this->session->userdata['id'] == $circle_data['admin_id']) { ?>
              <p><input class='new-topic-answer' type='text' name='topic-answer' placeholder='Topic answer'></p>
            <?php } ?>            <p><input class='new-topic-response' type='text' name='topic-response' placeholder='Topic response'></p>
            <input type='hidden' name='topic_id' value="<?php echo $topic['id']; ?>">
            <input type='hidden' name='event_id' value="<?php echo $id; ?>">
            <p><input type='submit' value='Add Topic Answer'></p>
            <a class='pull-right' href=''>Hide Form</a>
          </form>
          <?php if($this->session->flashdata('topic_id')== $topic['id']){
            echo "<div class='error'>" .$this->session->flashdata('response_error'). "</div>";
          } ?>
      <?php } ?>
      <?php $counter_variable++; ?>
      <?php } ?>


        </div>
        <div class='col-md-6'>

        <?php $counter_variable=2; ?>

        <?php foreach($info as $topic){

          if($counter_variable % 2==1){ ?>

          <a href=''><div class='topic'>
            <div class='col-md-3 t-img-container'>
              <img class='t-img' src='/assets/wtf.jpg'>
            </div>
            <div class='t-header col-md-7'>
              <h4 class='t-h-text'><?php echo $topic['title']; ?></h4>
            </div>
            <div class='col-md-2'>
              <p class='points'>+<?php echo $topic['score']; ?></p>
              <p><i class="fa fa-arrow-circle-o-right arrow" aria-hidden="true"></i></p>
            </div>
          </div></a>
          <form action='/dashboard/add_topic_answer' method='post' style="margin-bottom: 50px;">
            <?php if($this->session->userdata['id'] == $circle_data['admin_id']) { ?>
              <p><input class='new-topic-answer' type='text' name='topic-answer' placeholder='Topic answer'></p>
            <?php } ?>
            <p><input class='new-topic-response' type='text' name='topic-response' placeholder='Topic response'></p>
            <input type='hidden' name='topic_id' value="<?php echo $topic['id']; ?>">
            <input type='hidden' name='event_id' value="<?php echo $id; ?>">
            <p><input type='submit' value='Add Topic Answer'></p>
            <a class='pull-right' href=''>Hide Form</a>
          </form>

          <?php if($this->session->flashdata('topic_id')== $topic['id']){
            echo $this->session->flashdata('response_error');
          } ?>
          <?php } ?>
          <?php $counter_variable++; ?>
          <?php } ?>

        </div>
      </div>
    </div><!-- /.container -->

  </body>
</html>
