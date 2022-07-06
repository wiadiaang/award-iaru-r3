<!DOCTYPE HTML>
<html>

	<head>

		<meta charset="UTF-8"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="mobile-web-app-capable" content="yes"/>
		<meta name="theme-color" content="#1a1a1a"/>
		<meta http-equiv="X-AU-Compatible" content="IE=edge, chrome=1"/>
		<meta name="title" content="IARU - 50th Anniversary"/>
		<meta name="description" content="IARU - 50th Anniversary"/>
		<meta name="author" content="Orari"/>
		<meta name="robots" content="index, follow"/>
		<meta name="googlebot" content="index, follow"/>
		<meta name="google" content="notranslate"/>
		<meta name="viewport" content="width=device-width, initial-scale=1,
									   maximum-scale=1, user-scalable=no"/>

		<title>Login - IARU - 50th Anniversary</title>

		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/icon.png"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normal.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css"/>

		<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/index.js"></script>

	</head>

	<body>

		<section>

			<div id="box">

				<img src="<?php echo base_url();?>assets/img/logo-login.png"/>

				<span class="title">Login Member</span>

				<form action="<?php echo site_url('user/login'); ?>" method="POST" name="users">

					<label>Username</label>
					<img src="<?php echo base_url();?>assets/img/user.png"/>
					<input type="text" name="user_name" autocomplete="off" spellcheck="false"
					placeholder="your username" value="<?php echo $this->input->post('user_name'); ?>" required/>

					<label>Password</label>
					<img src="<?php echo base_url();?>assets/img/password.png"/>
					<input type="password" name="user_password" placeholder="your password" required/>
 					<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />

 					<button type="submit">Login</button>

				</form>

			</div>

		</section>

	</body>

</html>