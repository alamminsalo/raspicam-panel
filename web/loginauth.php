<?php
session_start();

$login = '';
$password = '';

$config = fopen("../config.txt", "r") or die("Unable to open config file!");
while (!feof($config)){
	$params = explode("=",fgets($config));
	if ($params[0] === "login"){
		$login = trim($params[1]); 	
	}
	if ($params[0] === "password"){
		$password = trim($params[1]);
	}
}
fclose($config);

function redirectToIndex(){
	header("Location: https://" . $_SERVER['HTTP_HOST']
			    . dirname($_SERVER['PHP_SELF'])
			    . 'index.php');
	exit();
}


$errmsg = '';
if (isset($_GET['autherr']) && $_GET['autherr'] == '1'){
        $errmsg = '<span style="background: yellow;">You must login to do that</span>';
}

if (isset($_GET['signout']) && $_GET['signout'] == 'true'){
	if (isset($_SESSION['islogged'])) {
		unset($_SESSION['islogged']);
	}
}

if (isset($_SESSION['islogged']) && $_SESSION['islogged'] == true){
	redirectToIndex();
}

if (isset($_POST['login']) AND isset($_POST['password'])) {
    if ($_POST['login'] === $login AND hash("sha256", $_POST['password']) === $password) {
        $_SESSION['islogged'] = true;
	redirectToIndex();
    } else {
		if (isset($_SESSION['islogged'])) {
			unset($_SESSION['islogged']);
		}
        $errmsg = '<span style="background: yellow;">Authentication error. Check your priviledges';
    }
}

?>
