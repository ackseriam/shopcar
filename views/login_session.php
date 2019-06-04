<?php



session_start();

if($_POST['UserName']==$user &&  $_POST['password']==$pass )
{
$_SESSION['login']="Admin";
header('Location: index.php');
}else{
	echo "Incorrect username and password ";
}

 ?>