

        <p id = "levelSubtitle">Click on the boxes and circles as quicly as you can!</p>
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
      <div class="col-2" id="section-one-a">
        <div class="dropdown">
          <button class="btn btn-secondary button-style_dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Difficulty
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="bronze_option" href="http://www.reflekses.com/">Normal</a>
            <a class="dropdown-item" id="bronze_option" href="?page=bronze">Bronze</a>
            <a class="dropdown-item" id="silver_option" href="?page=silver">Silver</a>
            <a class="dropdown-item" id="gold_option" href="?page=gold">Gold</a>
          </div>
        </div>

      </div>
      <div class="col-4" id="section-two">
        <button class="button-style" id="beginButton">CLICK AND BEGIN !</button>
      </div>
      <div class="col-2" id="section-two-b">
        <p id="score-text">Counter:<span id="counter" class="time-score"></span></p>
        <button class="button-style" id="resetButton">Reset</button>
      </div>
      <div class="col-2" id="section-three">
        <p id="score-text">Your score:<span id="score" class="time-score"></span></p>
      </div>

    </div>