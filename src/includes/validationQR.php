<?php
include 'connectdb.php';
$success=false;

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];

 date_default_timezone_set("America/Monterrey"); 
$fechaHoy =  date("Y-m-d"); 

$result = mysqli_query($connectdb, "SELECT * FROM users WHERE user_firstname='$firstname' AND user_lastname='$lastname' AND user_level='0';");
while($row = mysqli_fetch_array($result)){
	$success = true;
	$user_id = $row['userID'];
	$user_firstname = $row['user_firstname'];
	$user_level = $row['user_level'];
}

if($success == true){
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_level'] = $user_level;
	$_SESSION['user_firstname'] = $user_firstname;
	header("location: ../webadmin/adminpanel.php");
}else{
	$result = mysqli_query($connectdb, "SELECT * FROM users WHERE user_firstname='$firstname' AND user_lastname='$lastname' AND user_level='1';");
	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['userID'];
	$user_firstname = $row['user_firstname'];
	$user_level= $row['user_level'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['staff_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_level'] = $user_level;
		$_SESSION['user_firstname'] = $user_firstname;
		header("location: ../webstaff/dashboard.php");
	}
	else{
        $result = mysqli_query($connectdb, "SELECT * FROM users WHERE user_firstname='$firstname' AND user_lastname='$lastname' AND user_level='2';");
        while($row = mysqli_fetch_array($result))
        {
        $success = true;
        $user_id = $row['userID'];
        $user_firstname = $row['user_firstname'];
        $user_level= $row['user_level'];
        }
        if($success == true)
        {
            session_start();
            $_SESSION['client_sid']=session_id();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_level'] = $user_level;
            $_SESSION['user_firstname'] = $user_firstname;
			$_SESSION['email'] = $row['email'];	
			header("location: ../webclient/requestapp.php?firstname=&lastname=&pet=&contact=&date=$fechaHoy");
			


}
else
{ echo "<script>
alert('Usuario y/o Contraseña Incorrecta.');
//window.location = '../loginQR.php';
</script>";

}
}
}
?>