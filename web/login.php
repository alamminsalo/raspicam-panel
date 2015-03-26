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
	header("Location: http://" . $_SERVER['HTTP_HOST']
			    . dirname($_SERVER['PHP_SELF'])
			    . 'index.php');
	exit;
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
    if ($_POST['login'] === $login AND $_POST['password'] === $password) {
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
<html>
<head>
<meta charset="UTF-8">
<title>Panel Login</title>
<link rel="stylesheet" type="text/css" href="theme.css">
<script type="text/javascript" src="jquery.js"></script>
</head>
<body class='bg'>
<div class='fg login-pane center center-horizontal'>
<h3>Please login</h3>
<?php
if ($errmsg != '') echo $errmsg;
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Tunnus:<br><input class='inputfield' type="text" name="login"><br>
Salasana:<br><input class='inputfield' type="password" name="password"><br>
</br>
<input class='right submit-button' type='submit' name='action' value='Kirjaudu'>
</br>
</form>
</div>
</body>
</html>
