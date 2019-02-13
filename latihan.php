<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#pengurung {
			display: flex;			
		}
		.kotak {
			width: 20px;
			height: 50px;
			background: #da7;
			margin: 0;
			border-left: 10px solid #390
		}
		.miring {
			padding-left: 10px;
			padding-right: 30px;
			height: 50px;
			background: #da7;
			margin-left: 20px;
			transform: skewX(-20deg);
		}
		.miring p {
			transform: skewX(20deg);
		}

	</style>
</head>
<body>
	<div id="pengurung">
		<div class="kotak"></div>
		<div class="miring">
			<p>abid</p>
		</div>
	</div>
</body>
</html>