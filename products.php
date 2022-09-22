<style type="text/css">
	.tung_san_pham{
		width: 25%;
		height: 300px;
		border: 1px solid black;
		float: left;
	}
</style>

<?php
include 'admin/connect.php';

$sql="select * from products";
$result=mysqli_query($connect,$sql);
mysqli_close($connect);
?>
<div id="mid">
	<?php foreach ($result as $each) { ?>
		<div class="tung_san_pham">
			<h1>
				<?php echo $each['name']; ?>
			</h1>
			<img src="admin/products/photos/<?php echo $each['image'] ?>" height='150'>
			<p>
				<?php echo $each['price']; ?>
			</p>
			<a href="product.php?id=<?php echo $each['id'] ?>">
				Xem chi tiết >>>
			</a>
			<br>
			<?php if(isset($_SESSION['id'])){ ?>
				<button data-id='<?php echo $each['id'] ?>' 
					class='btn-add-to-cart' >
					Thêm vào giỏ hàng
				</button>
			<?php } ?>
		</div>
    <?php } ?>
</div>