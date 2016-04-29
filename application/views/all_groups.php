<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>Explore Groups</title>
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
      .g-m-i {
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
      .input-350 {
        width: 350px;
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
    <div class='container'>
      <h1>Groups</h1>
      <div class='col-md-6'>
        <div class='active-events'>
          <?php foreach($groups as $group){ ?>
          <a href='/group/<?= $group[1]['id'] ?>'><div class='event'>
            <div class='e-name col-md-8'>
              <h4><?= $group[1]['name'] ?></h4>
            </div>
            <div class='e-time col-md-4'>
              <h5><?= $group[0] ?> Members</h5>
            </div>
          </div></a>
            <?php } ?>
        </div>

      </div>
      <div class='col-md-4 col-md-offset-2'>

        <div class='group-leaderboard'>
          <div class='g-l-content'>
            <h3 class='text-center'>Global Leaderboard</h3>
            <ul class='leaderboard-list'>
            <?php $rank_count=0; ?>
            <?php if($rank_count<3){ ?>
            <?php foreach ($leaders as $leader) { ?>
            <?php $rank_count++; ?>
              <a href=''><li><?= $rank_count; ?> <?= $leader['username']; ?>: <?= $leader['score']; ?></li></a>
            <?php }} ?>
            </ul>
          </div>
        </div>
        <div class='create-group'>
          <h4>Create New Group</h4>
          <form action='/dashboard/create_circle' method='post'>
            <p><input class='input-350' type='text' name='name' placeholder='Group Name'></p>
            <p><input type="radio" name="publicity" value="1"> Public</p>
            <p><input type="radio" name="publicity" value="0"> Private</p>
            <input type="submit" value="Create">
          </form>
          <a href=''>Hide Group Creation</a>
        </div>
      </div>
    </div>



  </body>
</html>
