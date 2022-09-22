<?php 
	require '../check_login_super_admin.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="process_update.php">
	<?php 
		if(empty($_GET['id'])){
			header('location:index.php?error=Không sửa được!');
		}
		include '../menu.php';
		include '../connect.php';
		$id=$_GET['id'];
		$sql="select * from manufacturers where id='$id'";
		$result=mysqli_query($connect,$sql);
		$this_infor=mysqli_fetch_array($result);
		mysqli_close($connect);
	?>
	<input type="hidden" name="id" value="<?php echo $this_infor['id'] ?>">
	<br>
	Tên
	<input type="text" name="name" value="<?php echo $this_infor['name'] ?>">
	<br>
	Địa chỉ
	<textarea name="address"><?php echo $this_infor['address'] ?></textarea>
	<br>
	Điện thoại
	<input type="text" name="phone" value="<?php echo $this_infor['phone'] ?>">
	<br>
	Ảnh
	<input type="text" name="image" value="<?php echo $this_infor['image'] ?>">
	<br>
	<button>Sửa</button>
</form>

</body>
</html>