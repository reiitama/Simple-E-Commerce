
<form id="login-form" action="register_user.php" method="post">
		<h2>Register User</h2>
		<hr>
		<label for="username">nama lengkap</label>
		<input type="text" name="fullname" id="fullname" placeholder="nama lengkap" required>
		<label for="pasword">email</label>
		<input type="email" name="email" id="email" placeholder="email">
		<label for="pasword">username</label>
		<input type="text" name="username" id="username" placeholder="entry username" required>
		<label for="pasword">password</label>
		<input type="password" name="password" id="password" placeholder="entry password" required>
		<label for="pasword">konfrim password</label>
		<input type="password" name="konfrim_password" id="konfrim_password" placeholder="ketik ulang password" required>
		<hr>
		<center>
			<input type="submit" name="daftar" id="daftar" class="btn" value="daftar">
		</center>
		
	</form>