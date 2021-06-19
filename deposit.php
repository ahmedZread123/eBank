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

form{
	
	align-content: right;
}
input{
	align-content: right;
	margin:5px;
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

.button{
	margin :10px;
	padding:5px;
	font-weight: bold;
	background-color: #008cff;
	text-align: center;
	color:white;
}



.button:hover {
  background: #6600f5;;
}

body{
	background-color: PaleTurquoise;
}
    body
    {
    background-color : PaleTurquoise ;}
    </style>
	</head>
	<?php 
		session_start();
	  if( $_SESSION['user'] ){
        $user = $_SESSION['user'] ;
		$_SESSION['token'] =bin2hex(openssl_random_pseudo_bytes(32));
		$token = $_SESSION['token'] ;

	  }else{
		  header("location:index.php");
	  }
	?>
	<body>


	<div class="container">
		<h2 >The Deposit Page</h2>
		<h3> Welcome to E-Banking <?php Print "$user" ?></h3>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<form action="deposit.php" method="GET">
			How much would you like to deposit: <input type="number" name="amount" required="required"/><br/>
		    
			<input name="deposit" type="submit" class="button" value="DepositMoney"/>
			<input name="token" type="hidden"  value= <?php echo $_SESSION['token']  ;?> />


		</form>
	</div>
	</body>
</html>

<?php
if(isset($_GET['deposit'])){
if(!empty($_GET['token'])){
	if($_SESSION['token'] == $_SESSION['token'] ){

	$db_conn = mysqli_connect('localhost' , 'root' , '' , 'atm');

	$amount = mysqli_real_escape_string($db_conn,$_GET['amount']);
	$user = $_SESSION['user'] ;
    $res =  mysqli_query($db_conn  , "update user set amont = amont + '$amount' where username = '$user'") ;
  
     print '<script>alert("sucsecfull insert money ") ;   </script>' ; 
	
	}else{
	   echo "CSRF ATTACK " ;
    }
	

}else{
	echo "CSRF  " ;
 }
}

?>