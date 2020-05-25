<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
include 'inc/checklogin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>WebMag | Login</title>

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Animate.css -->
  <link href="assets/css/animate.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>
  <!-- for CDN jquery -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
</head>

<body class="login login-bg">
  <div>
    <a class="hiddenanchor" id="signup">Signup</a>
    <a class="hiddenanchor" id="signin">Signin</a>

    <div class="login_wrapper">
      <div class="animate form login_form main-login">
        <section class="login_content">
          <?php flashMessage(); ?>
          <img src="./assets/images/logo.png" alt="logo">
          <form action="process/login" method="post">
            <h1><strong>Login</strong></h1>
            <div>
              <input type="text" class="form-control" placeholder="Email" required="" name="email" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div class="form-check ">
              <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme">
              <label class="form-check-label white" for="rememberme">
                Remember Me
              </label>
            </div>
            <div>
              <button class="btn btn-success submit" type="submit">Log in</button>
              <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link white">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <p class="white">&copy; <?php echo Date("Y"); ?> All Rights Reserved. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>&copy; <?php echo Date("Y"); ?> All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
    </div>
  </div>
</body>

</html>