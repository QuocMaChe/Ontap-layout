<div id="top">
	<ol>
		<li>
			<a href="index.php">
				Trang chủ
			</a>
		</li>
		<?php if(!isset($_SESSION['id'])){?>
		<li>
			<a href="signin.php">
				Đăng Nhập
			</a>
		</li>
		<li>
			<a href="signup.php">
				Đăng Ký
			</a>
		</li>
		<?php } else{ ?>
			Chào
			<?php echo $_SESSION['name']; ?>,
			<a href="signout.php">
				Đăng xuất
			</a>
			<a href="view_cart.php" id="cart">
				Giỏ hàng
			</a>
		<?php } ?>	
	</ol>
</div>