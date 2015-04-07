<?php

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
		.'password=' . hash("sha256",$GLOBALS["_password"])
		."\n"
		.'#Sleep timer, seconds'
		."\n"
		.'timer=' . $GLOBALS["_timer"]
		."\n"
		.'#Path to live stream launch script'
		."\n"
		.'streamscript=' . $GLOBALS["_script"];

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
		else if ($params[0] === "timer"){
			$GLOBALS['_timer'] = trim($params[1]);
		}
		else if ($params[0] === "streamscript"){
			$GLOBALS['_script'] = trim($params[1]);
		}
	}
	fclose($config);
}


?>
