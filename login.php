<html>
	<head>
	<title>E-Banking</title>
<style>
.container{
	width: 450px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: center;
	position:relative;
	top:50px;
	vertical-align: middle;
}

form{
	align-content: center;
	padding:10px;
	margin-top: 15px;
}
input
{
	margin :5px;
}

a{
	color:#f00f53;
	text-decoration: none;
	align-content: right;
}

.button{
	width :150px;
	margin :10px;
	padding:5px;
	font-weight: bold;
	background-color: #04ae3a;
	text-align: center;
	position:relative;
	right:-100px;
	color:white;
}

.button:hover {
  background: #fa6538;
}


body{
	background-color: PaleTurquoise;
}
    body
    {
    background-color : PaleTurquoise     ;
	}
    </style>
	</head>
	<body>

	<div class="container">
		<h2 >The Login Page</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="" method="POST">
			Enter Username : <input type="text" name="username" required="required"/><br/>
			Enter Password : <input type="password" name="password" required="required"/><br/>
			<input name = "login" type="submit" value="Login" class="button"/>
			</form>	
	</div>
	</body>
	
</html>

<?php 

if(isset($_POST['login'])){
	$db_conn = mysqli_connect('localhost' , 'root' , '' , 'atm');

	$username = mysqli_real_escape_string($db_conn,$_POST['username']);
	$password = mysqli_real_escape_string($db_conn,$_POST['password']);
	$password = hash("sha3-512",$password);
    $res =  mysqli_query($db_conn  , "select * from user where username = '$username' and password = '$password' ") ;
    $num_row = mysqli_num_rows($res);

	if($num_row > 0){
		$row = mysqli_fetch_assoc($res);
		session_start();
       $_SESSION['user'] = $row['username'];
		header("location:home.php") ; 

	}else{
		print '<script>alert("invaled username or password") ;   </script>' ; 
		print '<script> window.location.assign("login.php") ;</script>' ; 

	}
}
?>
