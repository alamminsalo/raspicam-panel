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
<form method="post" action="reset.php">
<input type="hidden" name="reset" value="true"> 
Unohditko salasanasi?<input type="submit" value="Reset">

</form>
</div>
</body>
</html>
