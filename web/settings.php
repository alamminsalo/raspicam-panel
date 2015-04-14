<?php require 'auth.php';?>
<?php

require 'config.php';
readConfig();

$errmsg = '';
$error = false;

if (isset($_POST['action'])){
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
						$GLOBALS['_password'] = hash("sha256",$pass);
					}
					else {
						$errmsg = '<div class="error">Passwords need to match.</div>';
						$error = true;
					}
				}
				else{
					$errmsg = '<div class="error">You need to submit password on both fields.</div>';
					$error = true;
				}
			}
		}
	}

	if ($error == false AND isset($_POST['email'])){
		if (strlen($_POST['email']) > 0){
			$GLOBALS['_email'] = $_POST['email'];
		}
		else {
			$errmsg = '<div class="error">Email cannot be empty.</div>';
			$error = true;
		}
	}

	if ($error == false AND isset($_POST['mode'])){
		$GLOBALS['_cameramode'] = ($_POST['mode'] === 'video') ? 'video' : 'image';
	}

	if ($error == false AND isset($_POST['videolen'])){
		$GLOBALS['_videolength'] = $_POST['videolen'];
	}

	if ($error == false AND isset($_POST['sleeptimer'])){
		$GLOBALS['_timer'] = $_POST['sleeptimer'];
	}

	if ($error == false){
		writeConfig();
		$errmsg = '<div class="success">Account settings updated.</div>';
		shell_exec("service raspicam restart");
	}
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body class="bg centerb">

<?php require 'bar.php'?>

<div class="content fg">


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table class="center">
<tr><td><h3 class="section-title">Password</h3></td></tr>
<tr><td>New password</td><td><input type="password" name="pass"/></td></tr>
<tr><td>Repeat password</td><td><input type="password" name="passrepeat"/></td></tr>

<tr><td><h3 class="section-title">Email</h3></td></tr>
<tr><td><input class="inputfield" type="text" value="<?php echo $GLOBALS['_email'];?>" name="email"/></td><tr>

<tr><td><h3 class="section-title">System</h3></td></tr>
<tr><td>Camera mode</td><td><input type="radio" value="image" name="mode" <?php if ($GLOBALS['_cameramode'] !== 'video') echo 'checked';?>/>Still-image</td></tr>
<tr><td></td><td><input type="radio" value="video" name="mode" <?php if ($GLOBALS['_cameramode'] === 'video') echo 'checked';?>/>Video</td></tr>
<tr><td>Video length (ms)</td><td><input type="text" value="<?php echo $GLOBALS['_videolength'];?>" name="videolen"/></td></tr>
<tr><td>Sleep timer length (s)</td><td><input type="text" value="<?php echo $GLOBALS['_timer'];?>" name="sleeptimer"/></td></tr>

<tr><td/><td/><input class="right submit-button" type="submit" name="action" value="Apply"/><td></td><tr>
</table>
</form>

</div>

<?php echo $errmsg;?>
<div>
	
</div>
</body>
</html>
