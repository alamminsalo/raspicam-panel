<?php require 'auth.php';?>
<?php

require 'config.php';
readConfig();

$errmsg = '';

if (isset($_POST['pass'])){
	$pass = ($_POST['pass']);

	if (strlen($pass) > 0){
		if (strlen($pass) < 6){
			$errmsg = '<div class="error">Minimum password length is 6 characters.</div>';
		}
		else {
			if (isset($_POST['passrepeat'])) {
				$passrepeat = ($_POST['passrepeat']);
				
				if ($pass === $passrepeat){
					$GLOBALS['_password'] = $pass;
					$errmsg = 'changed';
				}
				else {
					$errmsg = '<div class="error">Passwords need to match.</div>';
				}
			}
			else{
				$errmsg = '<div class="error">You need to submit password on both fields.</div>';
			}
		}
	}
}

if ($errmsg === '' OR $errmsg === 'changed' AND isset($_POST['email'])){
	if (strlen($_POST['email']) > 0){
		$GLOBALS['_email'] = $_POST['email'];
		$errmsg = 'changed';
	}
	else {
		$errmsg = '<div class="error">Email cannot be empty.</div>';
	}
}

if ($errmsg === 'changed'){
	writeConfig();
	$errmsg = '<div class="success">Account settings updated.</div>';
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body class="bg">

<?php require 'bar.php'?>

<div class="content fg">


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table class="center">
<tr><td><h3 class="section-title">Account</h3></td></tr>
<tr><td>New password</td><td><input type="password" name="pass"/></td></tr>
<tr><td>Repeat password</td><td><input type="password" name="passrepeat"/></td></tr>

<tr><td><h3 class="section-title">Email</h3></td></tr>
<tr><td><input class="inputfield" type="text" value="<?php echo $GLOBALS['_email'];?>" name="email"/></td><tr>
<tr><td/><td/><input class="right submit-button" type="submit" name="action" value="Apply"/><td></td><tr>
</table>
</form>

</div>

<?php echo $errmsg;?>
<div>
	
</div>
</body>
</html>
