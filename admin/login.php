<?php
	include "database.php";
	$db = new database('localhost','root','','dbkhursus_ilmunesia');
	$db->connectMySQL();
?>
<html>
<head>
<title>LOGIN</title>
<style type="text/css">
/*form styling*/
#login-form{
	dispaly: block;
	background-color: limegreen;
	width: 300px;
	height: auto;
	border: 2px solid grey;
	padding: 20px;
	font: 11pt 'trebuchet ms';
	margin: 100px auto;
}
#login-form label{
	dispaly: block;
	margin-bottom: 10px;	
}
#login-form h2{
	dispaly: block;
	text-align: center;
	margin: 0 auto;	
}
#login-form input:not(.btn){
	padding: 5px;
	margin-bottom: 10px;
	width: 100%;
}
/*untuk mengatur class btn/ bottun*/
#login-form input.btn{
	padding: 10px 20px;
}
/*end form styling*/
</style>
</head>
<body>
	<form id="login-form" action="cek_login.php" method="post">
		<h2>Silahkan Login User</h2>
		<hr>
		<label for="username">username</label>
		<input type="text" name="username" id="username" placeholder="username">
		<label for="pasword">Password</label>
		<input type="text" name="password" id="password" placeholder="entry password">
		<label for="penerbit">penerbit</label>
		<hr>
		<center>
			<input type="submit" name="submit" id="submit" class="btn" value="login">
		</center>
		<hr>
		<a href="reset_password.php">lupa password</a> | <a href="signup.php">daftarkan user</a>
	</form>
</body>
</html>