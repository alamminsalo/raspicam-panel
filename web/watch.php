<?php
session_start();

//$name = $_SESSION['name'];
//
//$_SESSION['name'] = time() . '.jpg';
//$execstr = './stream.sh ' . $_SESSION['name'] . ' ' . $name;
//exec($execstr);	

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="http://jwpsrv.com/library/uxAfKtdpEeS5ABJtO5t17w.js"></script>
</head>
<body class="bg">
<div class="center center-horizontal">
<div id="jwplayer">Loading the player...</div>
<script type="text/javascript">
    jwplayer("jwplayer").setup({
        file: "rtmp://192.168.0.102/stream/",
        image: "http://example.com/uploads/myPoster.jpg",
        width: 640,
        height: 360
    });
</script>
<!--<video autoplay><source src="temp/buf.webm" type="video/webm"></video>-->
<!--<img src="tmp/<?php echo $name;?>">-->
</div>
<?php echo $execstr;?>
</body>
</html>
