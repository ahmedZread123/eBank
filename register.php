<html>
	<head>
	<title>Welcome to E-Banking</title>
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
	background-color: #ff474a;
	text-align: center;
	position:relative;
	right:-100px;
	color:white;
}

.button:hover {
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
	<body>

	<div class="container">
		<h2 >The Registraion Page</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="register.php" method="POST">
			Enter Username : <input type="text" name="username" required="required"/><br/>
			Enter Password : <input type="password" name="password" required="required"/><br/>
			<input type="submit" value="Register" class="button" name="register"/>
			</form>	
	</div>
	</body>
	
</html>
<?php
if(isset($_POST['register'])){
	$db_conn = mysqli_connect('localhost' , 'root' , '' , 'atm');

	$username = mysqli_real_escape_string($db_conn,$_POST['username']);
	$password = mysqli_real_escape_string($db_conn,$_POST['password']);
    $password = hash("sha3-512",$password);
	$bool = true ;
    $query =  mysqli_query($db_conn  , "select * from user ") ;
  

	   while($row = mysqli_fetch_assoc($query)){
		   $table = $row['username'];
         if($username == $table){
			 $bool = false ;
			 print '<script>alert("username has already been taken .") ;   </script>' ; 
			 print '<script> window.location.assign("register.php") ;</script>' ; 
		 }
	   }

	if($bool){
		mysqli_query($db_conn  , "insert into user (username , password) values ('$username' , '$password') ") ;
		print '<script>alert("successfully Register ") ;   </script>' ; 
		print '<script> window.location.assign("login.php") ;</script>' ; 

	}
}
?>