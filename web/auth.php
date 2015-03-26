<?php
session_start();
if (!isset($_SESSION['islogged']) || $_SESSION['islogged'] !== true)
	header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF'])
                                    . 'login.php?autherr=1');
?>
