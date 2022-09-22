<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		#error{
			color: red;
		}
	</style>
</head>
<body>
	<?php if(isset($_GET['error'])){ ?>
		<span id="error">
			<?php echo $_GET['error']; ?>
		</span>
	<?php } ?>
	<h1>Đăng nhập</h1>
	<form method="post" action="process_signin.php">
		Email
		<input type="text" name="email">
		<br>
		Mật khẩu
		<input type="password" name="password">
		<br>
		<button>Đăng nhập</button>
	</form>
</body>
</html>