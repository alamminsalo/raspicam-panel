<?php
function curPageName() {
	 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
function getClassName($page){
	return (curPageName() == $page ? 'tab-button-selected' : 'tab-button');
}
?>

<div class="top-bar">
<a href="index.php"><span class="<?php echo getClassName('index.php');?> left">Summary</span></a>
<a href="account.php"><span class="<?php echo getClassName('account.php');?> left">Account</span></a>
<a href="settings.php"><span class="<?php echo getClassName('settings.php');?> left">Settings</span></a>
<a href="login.php?signout=true"><span class="tab-button right">Logout</span></a>
</div>

