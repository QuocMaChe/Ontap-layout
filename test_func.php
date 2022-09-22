<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form>
		<input type="text" name="" value="Nhập tên">
		<br>
		<button onclick="test()">Nhấn vào đây</button>
	</form>
	<script type="text/javascript">
		function test(){
			<?php header('location:index.php') ?>
		}
	</script>
</body>
</html>