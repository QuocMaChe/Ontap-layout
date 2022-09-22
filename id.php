<?php
include 'admin/connect.php';
$id=$_GET['id'];
$sql="select * from products where id=$id";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
mysqli_close($connect);
?>
<div id="mid" align="center">
	<h1>
	<?php echo $each['name']; ?>
	</h1>
	<img src="admin/products/photos/<?php echo $each['image'] ?>" height='150'>
	<p>
		<?php echo $each['price']; ?>
	</p>
	<p>
		<?php echo $each['description']; ?>
	</p>
</div>