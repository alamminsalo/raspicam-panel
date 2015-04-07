<?

function getRandomString(){
	$str;
	$chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXZ';
	for ($i = 0; $i < 16; $i++){
		$str += substr($chars, rand(0,strlen($chars)), 1);
	}	
	return $str;
}

if (isset($_POST['resetpass']) && $_POST['resetpass'] == 'true'){
	require 'config.php';
	$newpass = getRandomString();

	readConfig();
	$GLOBALS['password'] = $newpass;
	writeConfig();

	shell_exec('resetpass ' . $GLOBALS['_email'] . ' ' . $newpass ' > /dev/null 2>&1 &');		
}
