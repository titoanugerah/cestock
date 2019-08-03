<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V5</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url('./assets/template/login/'); ?>images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/login/'); ?>css/main.css">
  <!--===============================================================================================-->
</head>
<body>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url('./assets/template/login/'); ?>images/bg-01.jpg');">
      <div class="wrap-login100 p-l-30 p-r-30 p-t-32 p-b-3">
        <form class="login100-form validate-form flex-sb flex-w">
          <span class="login100-form-title p-b-2">
            Silahkan Login
          </span>

          <div class="p-t-31 p-b-2">
            <span class="txt1">
              Username
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Username is required">
            <input class="input100" type="text" name="username"  placeholder="Masukan username anda">
            <span class="focus-input100"></span>
          </div>

          <div class="p-t-13 p-b-9">
            <span class="txt1">
              Password
            </span>

            <a href="<?php echo base_url('forgotPassword'); ?>" class="txt2 bo1 m-l-5">
              Lupa Password?
            </a>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Masukan password anda">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn" name="login" value="login">Masuk</button>
          </div>


          <div class="w-full text-center p-t-3">

            <a href="<?php echo base_url('createUser'); ?>#" class="txt2 bo1">
              Daftar Sekarang
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/login/'); ?>js/main.js"></script>

</body>
</html>
