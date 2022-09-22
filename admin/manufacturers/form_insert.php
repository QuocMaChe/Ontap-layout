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
<form method="post" action="process_insert.php">
	<?php 
		include '../menu.php';
	?>
	<br>
	Tên
	<input type="text" name="name">
	<br>
	Địa chỉ
	<textarea name="address"></textarea>
	<br>
	Điện thoại
	<input type="text" name="phone">
	<br>
	Ảnh
	<input type="text" name="image">
	<br>
	<button>Thêm</button>
</form>

</body>
</html>
