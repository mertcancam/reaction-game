<!DOCTYPE html>
<html lang="en">

<head>
  <title>Reaction Game</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css"> </head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2" id="logo"> 
        <?php if ($_SESSION['id']) {
            $query = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
            
            echo "<div class='welcome-title'><p> Welcome <br>".$row['username']."</p></div>"; 
            
            }
          ?>
      </div>
      <div class="col-8" id="top">
        <h1>Welcome To The Reaction Game!</h1>
        <p id="explanation">Click on the boxes and circles as quicly as you can!</p>
      </div>
      <div class="col-2" id="login-signup">
        <?php if ($_SESSION['id']) {  ?>

          <a href="?function=logout">
            <button class="button-style">Logout</button>
          </a>

          <?php } else { ?>

            <div>

              <button class="button-style" id="login-signup-button" data-toggle="modal" data-target="#myModal">Login/Signup</button>
            </div>

            <?php } ?>


      </div>
    </div>
    <div class="row" id="second-bar">
      <div class="col-2" id="section-one">
        <p>Your time:<span id="time" class="time-score"></span></p>
      </div>
      <div class="col-2">
      
      </div>
      <div class="col-4" id="section-two">
        <button class="button-style" id="beginButton">CLICK AND BEGIN !</button>
      </div>
      <div class="col-2">
        <p id="score-text">Counter:<span id="counter" class="time-score"></span></p>
      </div>
      <div class="col-2" id="section-three">
        <p id="score-text">Your score:<span id="score" class="time-score"></span></p>
      </div>
      
    </div>
    <div class="row" id="third-bar">
      <div class="col-10" id="game-area">
        <div id="shapes"></div>
      </div>
      <div class="col-2" id="score-area">
        <div class="score-container">
          <div class="row">
            <div class="col-md-12">
              <div class="leaderboard-title">Leaderboard</div>
              <?php displayScores(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="window-popup">
      <div class="wp-content">
        <h1>Game Over!</h1>
        <h2>Your Score Is:</h2>
        <span id="final-score"></span>
        <a href="#" class="btn btn-info" role="button" id="button-popup-close">Close</a>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="loginModalTitle">Login</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">
              <fieldset class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email address">
              </fieldset>
              <fieldset class="form-group" id="username-field">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username">
              </fieldset>
              <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#" id="toggleLogin">Sign up</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>