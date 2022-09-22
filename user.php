<?php 
session_start();
if(empty($_SESSION['id'])){
	header('location:sigin.php');
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
	<h1>
		Đây là trang người dùng. Xin chào
	</h1>
	<span style="color: blue;"><?php 
		echo $_SESSION['name']?></span>
	 <br>
	 <a href="signout.php">Đăng xuất</a>;
	 <?php 
	 	header('location:index.php');
	  ?>
</body>
</html>