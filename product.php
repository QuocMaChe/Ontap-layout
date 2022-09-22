<?php session_start() ?>
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
		<?php 
			include 'menu.php';
			include 'id.php'; 
			include 'footer.php';
		 ?>
		
	</div>
</body>
</html>