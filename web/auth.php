<?php
session_start();

require 'https.php';

if (!isSecure()){
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit();
}

if (!isset($_SESSION['islogged']) || $_SESSION['islogged'] !== true)
	header("Location: https://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF'])
                                    . 'login.php?autherr=1');
	exit();
?>
