<?php require 'auth.php';?>
<?php
$email = '';

$config = fopen("../config.txt", "r") or die("Unable to open config file!");
while (!feof($config)){
	$params = explode("=",fgets($config));
	if ($params[0] === "email"){
		$email = trim($params[1]);
		break;
	}
}
fclose($config);

$errmsg = '';

if (isset($_POST['pass'])){
	$pass = ($_POST['pass']);

	if (strlen($pass) < 6){
		$errmsg = '<span class="error">Minimum password length is 6 characters.</span>';
	}
	else {
//		if (isset($_POST['passrepeat'])) {
//			$passrepeat = ($_POST['passrepeat']);
//
//			if ($pass === $passrepeat){
//			}
//			else {
//				$errmsg = '<span class="error">Passwords don't match.</span>';
//			}
//		}
//		else{
//			$errmsg = '<span class="error">You need to submit password on both fields.</span>';
//		}
	}
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body class="bg">

<?php require 'bar.php'?>

<?php echo '</br>';?>
<?php echo $_POST['pass'];?>
<?php echo '</br>';?>
<?php echo $_POST['passrepeat'];?>

<div class="content fg">

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table class="center">
<tr><td><h3 class="section-title">Account</h3></td></tr>
<tr><td>New password</td><td><input type="password" name="pass"/></td></tr>
<tr><td>Repeat password</td><td><input type="password" name="passrepeat"/></td></tr>

<tr><td><h3 class="section-title">Email</h3></td></tr>
<tr><td><input class="inputfield" type="text" value="<?php echo $email;?>"/></td><tr>
<tr><td/><td/><input class="right submit-button" type="submit" name="action" value="Apply"/><td></td><tr>
</table>
</form>

</div>

<div>
	
</div>
</body>
</html>
