<html>
<head>

<style>

.bg{background-color:#e1e1e1}
.top-bar {height:60px; background-color:#3399ff}
.tab-button {font-size:2em; padding:5px; margin:5px; border-radius:6px; cursor:pointer; cursor:hand}
.tab-button:hover {background-color:rgba(0,0,0,0.3)}
.left {float:left}
.right {float:right}

.section-title {margin-top:16px}

</style>

</head>
<body class="bg">
<div class="top-bar">

<span class="tab-button left">Account</span>
<span class="tab-button left">System</span>
<span class="tab-button right">Logout</span>

</div>

<div class="settings">
<table>

<tr><td><h3 class="section-title">Account</h3></td></tr>
<tr><td>New password</td><td><input type="text"/></td></tr>
<tr><td>Repeat password</td><td><input type="text"/></td></tr>

<tr><td><h3 class="section-title">Email</h3></td></tr>
<tr><td>template_email@somewhere.at</td><td><input type="button" value="Change"/></td><tr>
<tr><td/><td/><input class="right" type="button" value="Apply"/>
<td></td><tr>
</table>
</div>

<div>
	
</div>
</body>
</html>
