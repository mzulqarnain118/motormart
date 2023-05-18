<?php
    include_once("header.php");
?>
	<!-- Our SigIn -->
	<section class="our-log bgc-f9">
		<div class="container">
			<div class="row">
            <?php
                if(isset($_SESSION['succes_sc'])){
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['succes_sc']; ?>
                    </div>
                    <?php
                    unset($_SESSION['succes_sc']);
                }
            
                if(isset($_SESSION['error_pass'])){
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error_pass']; ?>
                        </div>
                    <?php
                    unset($_SESSION['error_pass']);
                }
            ?>
        <div class="col-md-6 col-lg-6 col-xl-5">
          <div class="login_form mt60-sm">
            <h2 class="title">Sign in</h2>
            <p>New to Cars.com? <a href="signup.php">Sign up.</a> Are you a dealer?</p>
            <form action="action.php" method="post">
            <input type="hidden" name="cmd" value="sign_login" />
              <div class="mb-2 mr-sm-2">
                <label class="form-label">User email address  *</label>
                <input type="text" name="user_email" class="form-control">
              </div>
              <div class="form-group mb5">
                <label class="form-label">Password  *</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="exampleCheck3">
                <label class="custom-control-label" for="exampleCheck3">Remember me</label>
                <a class="btn-fpswd float-end" href="#">Lost your password?</a>
              </div>
              <button type="submit" class="btn btn-log btn-thm mt5">Sign in</button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 offset-xl-1 col-xl-5 offset-xl-2">
          <!--<div class="login_with">
            <h2 class="title">Connect With Social</h2>
            <div class="social_btn">
              <a class="btn btn_fb" href="#"><span class="fab fa-facebook-f"></span>Log In via Facebook</a><br>
              <a class="btn btn_google" href="#"><span class="fab fa-google"></span>Log In via Google+</a>
            </div>
          </div>-->
        </div>
			</div>
		</div>
	</section>
 <?php
    include_once("footer.php");
?>