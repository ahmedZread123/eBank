<html>
	<head>
	<title>Money in the Bank</title>
	<style>
	 .container{
	width: 620px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: center;
	position:relative;
	top:50px;
	vertical-align: middle;
}


h3{
	color:#1f00a8;
	font-family: helvetica;
}

a{
	color:#f00f53;
	text-decoration: none;
	align-content: right;
}

button{
	width:380px;
	margin :10px;
	padding:5px;
	font-weight: bold;
	background-color: #ff474a;
	text-align: center;
	color:white;
}


button:hover {
  background: #a30003;
}

body{
	background-color: PaleTurquoise;
}
    body
    {
    background-color : PaleTurquoise ;
	}
    </style>
	</head>
	<?php 
		session_start();
	  if( $_SESSION['user'] ){
        $user = $_SESSION['user'] ;
	  }else{
		  header("location:index.php");
	  }
	?>
	<body>

	<div class="container">
		<h2 >The Balance Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<?php

	$db_conn = mysqli_connect('localhost' , 'root' , '' , 'atm');
	$user = $_SESSION['user'] ;
    $res =  mysqli_query($db_conn  , "select * from user where username = '$user'") ;
     $row= mysqli_fetch_assoc($res);
     $balance = $row['amont'];
		print "Your balance is :  " . $balance ; 




?>
	</div>
	</body>
	
</html>
