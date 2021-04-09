<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="images/infantry_logo.svg">
    <link rel="shortcut icon" href="images/infantry_logo.svg">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

</head>
<style type="text/css">
	.login100-form-bgbtn {
	    position: absolute;
	    z-index: -1;
	    width: 300%;
	    height: 100%;
	    background: #a64bf4;
	    background: -webkit-linear-gradient(right, #484c2b;);
	}
	.focus-input100::before {
		background: -webkit-linear-gradient(left, #484c2b;);
	}
	img {
		max-width: 100%;
		max-height: 100%;
	}	
	.focus-input100::after {
  top: -15px;
}
</style>
<body>

  <?php
     if(isset($_POST['login']))
     {
        $url = 'https://api.neptune.bitjiniapps.com/check_admin/';
        $data = array(
                    'username'=>$_POST['username'],
                    'password'=>$_POST['password'],    
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                      'Content-Type:application/json',
                      'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b', 
                    ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr = json_decode($result,true);
         foreach ($arr as $jsonArray) { 
        	if($jsonArray['status']==200){
           	$_SESSION['username']=$_POST['username'];
            echo "<script>location='dashboard.php'</script>";
        	}elseif($arr['status']==400){
          	echo "<script>alert('Invalid Credentials');</script>";
        	}
         }
        }
    ?>
 
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					
					<span class="login100-form-title p-b-48">
						<img src="images/infantry_logo.svg" alt="Logo">
					</span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="float: right;margin-left: -31px;margin-top: 10px;margin-right: 10px;position: relative;z-index: 2;"></span>
						<input class="input100" type="password" name="password" id="pass_log_id">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login" type="submit" style="background-color: #728370;">
								Login
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<!-- <script src="vendor/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="vendor/daterangepicker/daterangepicker.js"></script>
 -->
	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->

	<script src="js/main.js"></script>


<script>
    $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var input = $("#pass_log_id");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>
</body>
</html>