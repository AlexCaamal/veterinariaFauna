<?php
include '../includes/connectdb.php';
$userq = $_POST['user'];
$passq = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$level = $_POST['level'];
$contactnum = $_POST['contactNum'];
$email = $_POST['email'];
$address = $_POST['address'];

$userquery = "INSERT INTO users (user_firstname,user_lastname,username, password,user_level,contact_num,email,address)
VALUES ('$fname','$lname','$userq', '$passq', $level,'$contactnum','$email','$address');";

if(mysqli_query($connectdb, $userquery)){
  echo "<script> 
  alert('Se ingreso correctamente!'); 
  window.location = '../webadmin/adminpanel.php'; 
  </script>";  
  
} else{
  echo "<script>
  alert('Fallo al ingresar. Verifique');  
  window.location = '../webadmin/adminpanel.php';
  </script>"; 
  
}
 ?>