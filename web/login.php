<?php require 'loginauth.php'?>
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
