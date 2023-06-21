<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/bootstrap.css') ?>">
</head>
<body class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<form style="margin-top:150px" method="post" action="<?php echo url("dologin") ?>" class='bg-white p-3 shadow'>
					@csrf
					@method('post')
					<h3 class="text-center p-3">LOGIN ADMIN</h3>
					<div class="mb-3">
						<label class="form-label fw-bold">Username</label>
						<input type="text" placeholder="Input Username" class="form-control" name="username_login">
					</div>
					<div class="mb-3">
						<label class="form-label fw-bold">Password</label>
						<input type="password" placeholder="Input Password" class="form-control" name="password_login">
					</div>
					<div class="mb-3 d-grid grap-2">
						<button class="btn btn-primary">Masuk</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>