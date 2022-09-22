<?php 
	include '../check_login_admin.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		td{
			text-align: center;
		}
	</style>
</head>
<body>
	<h1 align="center">
	 	Quản lý sản phẩm
	 </h1>
	<?php if(isset($_GET['success'])){ ?>
		<script type="text/javascript">
			alert('Thêm thành công');
		</script>
	<?php }elseif (isset($_GET['error'])) {?>
		<script type="text/javascript">
			alert('Thêm thất bại');
		</script>
	<?php } ?>
	<?php 
		include '../connect.php';
		include '../menu.php';
		$sql="select products.*, manufacturers.name as manufacturer_name from products join manufacturers on products.manufacturer_id=manufacturers.id ";
		$result=mysqli_query($connect,$sql);
		mysqli_close($connect);
		$i=1;
	 ?>
	 <a href="form_insert.php">Thêm</a>
	 <table border="1" width="100%">
	 	<tr>
	 	<th>
	 		STT
	 	</th>
	 	<th>
	 		Tên
	 	</th>
	 	<th>
	 		Ảnh
	 	</th>
	 	<th>
	 		Giá
	 	</th>
	 	<th>
	 		Nhà sản xuất
	 	</th>
	 	<th>
	 		Sửa
	 	</th>
	 	<th>
	 		Xóa
	 	</th>
	 	</tr>
	 	<?php foreach ($result as $each) {?>
	 	<tr>
	 		<td>
	 			<?php echo $i++; ?>
	 		</td>
	 		<td>
	 			<?php echo $each['name']; ?>
	 		</td>
	 		<td>
	 			<img style="text-align: center;" height="100" src="photos/<?php echo $each['image']; ?>">
	 		</td>
	 		<td>
	 			<?php echo $each['price']; ?>
	 		</td>
	 		<td>
	 			<?php echo $each['manufacturer_name']; ?>
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