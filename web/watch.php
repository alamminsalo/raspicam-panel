<?php 
require 'auth.php';

//Salt here is literally 'salt'
//Here we create token, which is passed to a script that launches ffmpeg stream
//and to the player that plays the stream, 
//so none can (hopefully) use external tools to watch the stream unauthorized.

$token = hash("sha256", "salt" . time());

//Kill earlier processes, if there are any
system('./killstream');

//Launch the raspivid + ffmpeg streaming
exec('./launchstream ' . $token);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="https://jwpsrv.com/library/uxAfKtdpEeS5ABJtO5t17w.js"></script>
</head>
<body class="bg centerb">
<?php require 'bar.php'?>
<div class="content fg">
<div class="center">
<div id="jwplayer">Loading the player...</div>
<script type="text/javascript">
	var ip = location.host;
	//var filepath = "rtmp://<?php echo $_SERVER['HTTP_HOST'];?>:1935/live/<?php echo $token;?>.flv";
    jwplayer("jwplayer").setup({
	file: "rtmp://<?php echo $_SERVER['HTTP_HOST'];?>:1935/live/<?php echo $token;?>.flv",
	autostart: true,
        width: 640,
        height: 360,
	primary: 'flash'
    });
</script>
</div>
</div>
</body>
</html>
