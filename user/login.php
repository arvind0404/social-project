<?php
ob_start();
session_start();
session_regenerate_id( true );
if(isset($_SESSION['user_login']['id'])){
	header("Location:../home");
}
function __autoload($class){
	require_once "../classes/$class.php";
}
require_once 'ip.php';
$activity=new text_activity();
$blogs=new blogs($activity);
if(isset($_COOKIE['count'])){
	$value=$_COOKIE['count']+1;
	setcookie("count",$value,time()+86400*1000,"/");
}
else{
	setcookie("count",1,time()+86400*1000,"/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ViVinam: Login</title>
	<meta charset="utf-8" />
	<meta name="description" content="Vivinam" />
	<meta name="keywords" content="Social Site, Vivinam, Vichar, Vicharam" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../public/css/style.css" />
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<style type="text/css">
		html,body{margin: 0;padding: 0;font-family: Relaway,Helvetica,Arial; background-color: #ffffff;}
	</style>
</head>
<body>
<div class="register-container">
	<div class="regis-row">
		<div class="regis-column regis-left">
			<div class="r-cont">
				<a href="#" class="fb btn">
					<i class="fab fa-facebook fa-fw"></i> Login with Facebook
				</a>
				<a href="#" class="twitter btn">
					<i class="fab fa-twitter fa-fw"></i> Login with Twitter
				</a>
				<a href="#" class="google btn">
					<i class="fab fa-google fa-fw"></i> Login with Google
				</a>
					<p class="top-s"> 
					<span class="bg-line">OR</span>
				</p>
			</div>
			<div id="message">
				<?php if(isset($_GET['mess'])):?>
				<?php echo $_GET['mess']; ?>
				<?php elseif(isset($_SESSION['message'])): ?>
				<?php echo $_SESSION['message']; ?>
				<?php elseif(isset($_COOKIE['m'])): ?>
				<?php echo $_COOKIE['m']; ?>
				<?php endif; ?>
			</div>
			<div class="r-cont">
				<form action="auth.php" class="action-form" id="login-form" method="post"  autocomplete="on">
					<!-- <label for="email">Email id</label> --><span class="Err" id="emailErr">  </span>
					<div class="input-container">
					<i class="fas fa-user f-icon"></i>	<input class="input-field" type="text" name="email" value="<?php if(isset($_COOKIE['a'])){ echo convert_uudecode($_COOKIE['a']); } ?>" id="email" placeholder="Email / Username /Mobile"  autocomplete="on" />
					</div>
					<input type="hidden" name="csrf" value="<?=$blogs->csrf_token(); ?>">
					<!-- <label for="password">Password</label> --><span class="Err" id="passwordErr">  </span>
					<div class="input-container">
					<i class="fas fa-lock f-icon"></i><input  class="input-field" type="password" name="password"  id="password" placeholder="Password.."  autocomplete="on" />
					</div>
					<div class="remember-me ">
					<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE['a'])){ echo "checked"; } ?> class="remember">
					<label for="remember">Remember Me</label>
					</div>
					<div class="input-submit">
					<input type="submit" name="login" class="reg-submit" id="reg-submit" value="Login"  autocomplete="on" />
					</div>
				</form>
					<div class="input-submit input-login">
					<a class=" reg-submit" href="fpassword">Forgot Password</a>
					</div>
				<div class="center">
					<p>Join Us Today:</p>
					<div class="input-submit">
					<a href="register" class="reg-submit r-u-login" id="r-u-login">Join</a>
					 </div><br /><br />
				</div>
			</div>
		</div>
		<div class="regis-column regis-right">
  <?php require_once '../r-left.php'; ?>
		</div>
		
	</div>
<footer>
    <div class="footer-top">
        <a href="#" title="follow on facebook"><i class='fab fa-facebook'></i></a>
        <a href="#" title="follow on instagram"><i class='fab fa-instagram'></i></a>
        <a href="#" title="follow on twitter"><i class='fab fa-twitter'></i></a>
        <a href="#" title="follow on youtube"><i class='fab fa-youtube'></i></a>
        <a href="#" title="follow on Google+"><i class='fab fa-google-plus'></i></a>
        <a href="#" title="follow on LinkedIn"><i class='fab fa-linkedin'></i></a>
        <a href="#" title="follow on blogger"><i class='fab fa-blogger'></i></a>
    </div>
    <div class="footer-middle">
        <a href="../about" title="About Us">About Us</a>
        <a href="../contact" title="Contact Us">Contact Us</a>
        <a href="../cookie" title="Cookie">Cookie</a>
        <a href="../term" title="Term and Policies">Term and Policies</a>
    </div>
    <div class="footer-middle suggestion">
        <a href="../suggestion" title="Suggestion">Suggestion</a>
        <a href="../report" title=" Report Problem Here">Report Problem here</a>
    </div>
    <div class="footer-bottom">
        <p>&copy;Copyright 2020-2021 Ek Nazriya Digital Media PVT. LTD.<br />
        &reg; Ek Nazriya</p>
    </div>
</footer>
</div>
<script type="text/javascript" src="../public/js/compress.js"></script>
<script type="text/javascript" src="../public/js/script.js"></script>
<!--script end-->
</body>
</html>
