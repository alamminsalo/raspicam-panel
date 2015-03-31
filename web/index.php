<?php
	require 'auth.php';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body class="bg">

<?php require 'bar.php';?>

<div class="content fg">
<table class='center'>
<tr><td><h3 class="section-title">Info</h3></td></tr>
<tr><td><p>Location</p></td><td><p>%value</p></td></tr>
<tr><td><p>Time running</p></td><td><p>%value</p></td></tr>
<tr><td><p>Alerts sent</p></td><td><p>%value</p></td></tr>
<tr><td><p>Last alert on</p></td><td><p>%value</p></td></tr>

<tr><td><h3 class="section-title">System</h3></td></tr>
<tr><td><p>CPU usage %</p></td><td><p>%value</p></td></tr>
<tr><td><p>Memory usage %</p></td><td><p>%value</p></td></tr>
<tr><td><p>Storage usage %</p></td><td><p>%value</p></td></tr>

<tr><td><h3 class="section-title">Live feed</h3></td><td><a href='watch.php'>Watch</a></td></tr>

</table>
</div>

<div>
	
</div>
</body>
</html>
