<?php

$_email = '';
$_login = '';
$_password = '';
$_cameramode = '';
$_videolength = '';

function writeConfig(){
	$configstr = ''
		.'#Camera mode'
		."\n"
		.'cameramode=' . $GLOBALS["_cameramode"]
		."\n"
		.'#Video capture lenght, milliseconds'
		."\n"
		.'videolength=' . $GLOBALS["_videolength"]
		."\n"
		.'#Email to send messages to'
		."\n"
		.'email=' . $GLOBALS["_email"]
		."\n"
		.'#Panel login name'
		."\n"
		.'login=' . $GLOBALS["_login"]
		."\n"
		.'#Panel login passwd'
		."\n"
		.'password=' . $GLOBALS["_password"];


	$config = fopen("../config.txt", "w") or die("Couldn't open config file!");
	fwrite($config, $configstr);
	fclose($config);
}

function readConfig(){
	$config = fopen("../config.txt", "r") or die("Unable to open config file!");
	while (!feof($config)){
		$params = explode("=",fgets($config));

		if (sizeof($params) == 0) continue;

		if ($params[0] === "email"){
			$GLOBALS['_email'] = trim($params[1]);
		}
		else if ($params[0] === "login"){
			$GLOBALS['_login'] = trim($params[1]);
		}
		else if ($params[0] === "password"){
			$GLOBALS['_password'] = trim($params[1]);
		}
		else if ($params[0] === "cameramode"){
			$GLOBALS['_cameramode'] = trim($params[1]);
		}
		else if ($params[0] === "videolength"){
			$GLOBALS['_videolength'] = trim($params[1]);
		}
	}
	fclose($config);
}


?>
