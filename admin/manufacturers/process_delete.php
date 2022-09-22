<?php 
	require '../check_login_super_admin.php';

	if (empty($_GET['id'])){
		header('location:index.php?error=Phải truyền mã');
	}
	$id=$_GET['id'];
	include '../connect.php';
	$sql="delete from manufacturers where id=$id";
	$result=mysqli_query($connect,$sql);
	header("location:index.php?success=Xóa thành công");
	mysqli_close($connect);

