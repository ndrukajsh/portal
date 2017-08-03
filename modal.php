<style type="text/css">
	#login-form{
		margin: auto; 
		box-shadow: 0px 0px 0px;
	}

#user-form{
	padding-top: 10px;
	border-top: 0px;
	border-bottom: 1px solid #990099;
	border-left: 0px;
	border-right: 0px;
	width: 96%; 
	margin: auto; 
	padding-bottom: 2%; 
	margin-bottom: 2%;
}

#user-form:focus{
	border: none;
	border-bottom: 1px solid #990099;
	outline: none;
	box-shadow: 1px 2px 3px #888888;
}


.m{
	float: right;
	padding: 2%;
	color: #fff;
}

#login-btn{
	float: right;
	margin-right: 2%;
	padding: 2%;
	border-radius: none;
	color: #fff;
	background-color: #248f24;
	border: 2px solid #248f24;
	cursor: pointer;
}

</style>

<div class="modal" id="login">
	<div class="modal-container">
		<div id="login-form">
			<input type="text" name="username" placeholder="Username" id="user-form" class="username"><br>
			<input type="password" name="password" placeholder="Password" id="user-form" style="width: 100%;" class="password">
			<p id="log_mesazh"></p>
			<hr>
			<a href="#" class="m success">Mbyll</a>
			<button type="submit" name="login" id="login-btn">Kycuni</button>
		</div>
	</div>
</div>
<div class="modal" id="register">
	<div class="modal-container">
		<div id="login-form">
			<input type="text" name="username" placeholder="Usename" id="user-form" class="r_username"><br>
			<input type="text" name="email" placeholder="Email" id="user-form" class="r_email"><br>
			<input type="password" name="password" placeholder="Password" id="user-form" style="width: 100%;" class="r_password"><br>
			<input type="password" name="password2" placeholder="Perserit passwordin" id="user-form" style="width: 100%;" class="r_conf_pass">
			<p id="reg_mesazh"></p>
			<hr>
			<a href="#" class="m success">Mbyll</a>
			<button type="submit" name="register" id="login-btn" class="register_btn">Regjistrohu</button>
		</div>
	</div>
</div>