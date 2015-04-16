<?php
	require 'auth.php';
	if (!isset($_SESSION['ip']))
		$_SESSION['ip'] = shell_exec('curl -s http://ipecho.net/plain'); //needs curl installed
	$uptime = shell_exec('getuptime');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body class="bg centerb">

<?php require 'bar.php';?>

<div class="content fg">
<table class='center'>
<tr><td><h3 class="section-title">Device Info</h3></td></tr>
<tr><td><p>IP Address</p></td><td><p><?php echo $_SESSION['ip'];?></p></td></tr>
<tr><td><p>Time running</p></td><td><p><?php echo $uptime;?></p></td></tr>
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
