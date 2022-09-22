<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		#all{
			background: white;
		}
		#top{
			background: yellow;
			width: 100%;
			height: 100px;
		}
		#mid{
			background: red;
			width: 100%;
			height: 1200px;
		}
		#bot{
			background: yellow;
			width: 100%;
			height: 100px;
		}
		#cart{
			float: right;
		}
	</style>
</head>
<body>
	<div id="all">
		<?php if(isset($_GET['success'])){?>
			<script type="text/javascript">
				alert ("Thêm thành công");
			</script>
		<?php }?>
		<?php
			include 'menu.php';
			include 'products.php';
			include 'footer.php';
		 ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn-add-to-cart').click(function(event) {
				let id=$(this).data('id');
				$.ajax({
					url: 'add_to_cart.php',
					type: 'GET',
					//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: {id},
				})
				.done(function(response) {
					if(response==0){
						alert('Thành công');
					}
					else{
						alert(response);
					}
				})
				.fail(function() {
					alert('Thất bại');
				})
			});
		});
	</script>
</body>
</html>