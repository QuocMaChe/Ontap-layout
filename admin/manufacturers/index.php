<?php 
	require '../check_login_super_admin.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		td{
			text-align: center;
		}
	</style>
</head>
<body>
<h1 align="center">Đây là khu vực quản lý nhà sản xuất</h1>
<br>
<a href="form_insert.php">
	Thêm
</a>
<?php 
	include '../menu.php';
?>
<?php
	include '../connect.php';
	$sql="select * from manufacturers";
	$result=mysqli_query($connect,$sql);
 ?>
 <table border="1" width="100%">
 	<th>
 		Mã
 	</th>
 	<th>
 		Tên
 	</th>
 	<th>
 		Địa chỉ
 	</th>
 	<th>
 		Điện thoại
 	</th>
 	<th>
 		Hình ảnh
 	</th>
 	<th>
 		Sửa
 	</th>
 	<th>
 		Xóa
 	</th>
 	<?php foreach ($result as $each) { ?>
 		<tr>
 			<td>
 				<?php echo $each['id']; ?>
 			</td>
 			<td>
 				<?php echo $each['name']; ?>
 			</td>
 			<td>
 				<?php echo $each['address']; ?>
 			</td>
 			<td>
 				<?php echo $each['phone']; ?>
 			</td>
 			<td>
 				<img src="<?php echo $each['image']; ?>" height="100">
 			</td>
 			<td>
 				<a href="form_update.php?id=<?php echo $each['id']; ?>">Sửa</a>
 			</td>
 			<td>
 				<a href="process_delete.php?id=<?php echo $each['id']; ?>">Xóa</a>
 			</td>
 		</tr>
 	<?php } ?>
 </table>
</body>
</html>