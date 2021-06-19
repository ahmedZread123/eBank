<html>
	<head>
	<title>E-banking</title>
	<style>
    .container{
	width: 360px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: center;
	position:relative;
	top:50px;
	vertical-align: middle;
}

p{
	font-family: sans-serif;
	font-weight: bold;
	font-size:  20px;
}

button{
	width :150px;
	margin :5px;
	padding:2px;
	font-weight: bold;
	background-color: #428BCA;
	text-align: center;
	color: white;
	font-family: verdana;
	text-decoration: none;
}
button:hover {
  background: #CF4647;
}

body{
	background-color: PaleTurquoise;
}
    </style>
	</head>
	<body>

	<div class="container">
		<?php
			Print "<p><MARQUEE BEHAVIOR=ALTERNATE ><B> WELCOME TO E-BANKING</B> </marquee></p>";
		?>
		<button type="button" onclick="location.href='login.php'">LOGIN</button><br/>
		
		<button type="button" onclick="location.href='register.php'">REGISTER</button>
			<html>
	</div>
	</body>

</html>
