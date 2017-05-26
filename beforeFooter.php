<div class="window-popup">
      <div class="wp-content">
        <h1>Game Over!</h1>
        <h2>Your Score Is:</h2>
        <span id="final-score"></span>
        <div class="alert alert-danger" id="noLoginalert"></div>
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
            <div id="spinner">
              <img src="spinner.gif" width="50" height="50" />
            </div>
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">
              <fieldset class="form-group">
                <label for="email">Email <span id="usernameOption">or Username</span></label>
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
            <!--  <div class="checkbox">

                <label>

                  <input type="checkbox" id="stayLoggedIn" name="stayLoggedIn" value="0"> Stay logged in

                </label>

              </div>-->
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