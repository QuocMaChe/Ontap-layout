<?php 
session_start();
if (isset($_COOKIE['remember'])) {
	$token=$_COOKIE['remember'];
	include 'admin/connect.php';
	$sql="select * from users where token='$token' limit 1";
	$result=mysqli_query($connect,$sql);
	$number_rows=mysqli_num_rows($result);
	if($number_rows==1){
		$each=mysqli_fetch_array($result);
		$_SESSION['id']=$each['id'];
		$_SESSION['name']=$each['name'];
	}
}
if(isset($_SESSION['id'])){
	header('location:user.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		if(isset($_GET['error'])){
			echo $_GET['error'];
		}
	 ?>
	<form method="post" action="process_signin.php">
		<h1>
			Form đăng nhập
		</h1>
		Email
		<input type="text" name="email">
		<br>
		Mật khẩu
		<input type="password" name="password">
		<br>
		Ghi nhớ đăng nhập
		<input type="checkbox" name="remember">
		<a href="forgot_password.php">Quên mật khẩu</a>
		<br>
		<button>Đăng Nhập</button>
	</form>
</body>
</html>