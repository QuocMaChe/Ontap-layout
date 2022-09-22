<?php 
	include '../check_login_admin.php';

	include '../check_login_super_admin.php';
	$id=$_GET['id'];
	include '../connect.php';
	$sql="delete from products where id='$id'";
	$result=mysqli_query($connect,$sql);
	
	mysqli_close($connect);
	header('location:index.php?success=Xóa thành công');