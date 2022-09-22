<?php 

$email=$_POST['email'];
$password=$_POST['password'];

require 'connect.php';
$sql="select * from admin where email='$email' and password='$password'";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)==1){
	$each=mysqli_fetch_array($result);
	session_start();
	$_SESSION['id']=$each['id'];
	$_SESSION['name']=$each['name'];
	$_SESSION['level']=$each['level'];
	header('location:root/index.php?success=Đăng nhập thành công');
	exit();
}
else{
	header('location:index.php?error=Tên đăng nhập hoặc mật khẩu sai!');
	exit();
}
