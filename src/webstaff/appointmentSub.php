<?php
include '../includes/connectdb.php';

$date = $_POST['date'];
$time = $_POST['HoraCita'];
$contact = $_POST['contact'];
$pet = $_POST['pet'];
$service = $_POST['service'];

$user = $_SESSION['user_id'];
$status = "Pendiente";
$success = "";


$time2 = "";
  

  
  $sqlHora = "SELECT idHora FROM horacitas WHERE Hora = '$time'";
  $result = $connectdb->query($sqlHora);
    while($row = mysqli_fetch_array($result)) {
    $time2 = $row['idHora'];
    }

  

  $sql = "INSERT INTO `appointments`( `contact`, `date`, `status`, `time`, `petID`, `servicesID`, `userID`)
  VALUES ('$contact','$date','$status','$time2','$pet','$service','$user');";

    if($results = $connectdb->query($sql)){
      
          echo "<script>
      alert('Se Agrego correctamente');
      window.location = '../webstaff/appointments.php?status=Pendiente';
      </script>";
      
    }else{
      echo "<script>
      alert('$mysqli->error');
      window.location = '../webstaff/rappointments.php?status=Pendiente';
      </script>";
    }






 ?>