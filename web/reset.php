<?php

function getRandomString(){
	$str = '';
	$chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXZ';
	for ($i = 0; $i < 16; $i++){
		$str .= substr($chars, rand(0,strlen($chars) -1), 1);
	}	
	return $str;
}

if (isset($_POST['reset']) && $_POST['reset'] == 'true'){
	require 'config.php';
	$newpass = getRandomString();

	readConfig();
	$GLOBALS['_password'] = $newpass;
	writeConfig();

	mail($GLOBALS['_email'], "Your password has been reset", "Your new password is $newpass");
}
?>

<html>
<body class="bg centerb">
<div class="fg content">
<h3>New password has been sent to device owner</h3>
</div>

</body>
</html>
