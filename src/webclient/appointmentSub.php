<?php
include '../includes/connectdb.php';

$date = $_POST['date'];
$time = (String) $_POST['HoraCita'];
$contact = $_POST['contact'];
$pet = $_POST['pet'];
$service = $_POST['service'];
$email = $_SESSION['email'];
$user = $_SESSION['user_id'];
$status = "Pendiente";
$success = "";

$time2 = "";
$appointmenID = "";

  
  $sqlHora = "SELECT idHora FROM horacitas WHERE Hora = '$time'";
  $result = $connectdb->query($sqlHora);
    while($row = mysqli_fetch_array($result)) {
    $time2 = $row['idHora'];
  }

    $sqlHoraOcuped = "SELECT appointmentID FROM appointments WHERE time = '$time2' and date = '$date' and status ='Pendiente'";
  $resultHora = $connectdb->query($sqlHoraOcuped);
    while($row2 = mysqli_fetch_array($resultHora)) {
    $appointmenID = $row2['appointmentID'];
  }


    if($appointmenID == ""){

      $sql = "INSERT INTO appointments ( contact, email, date, status, time, petID, servicesID, userID)
  VALUES ('$contact','$email','$date','$status','$time2','$pet','$service','$user');";
  $results = $connectdb->query($sql);
      
          echo "<script>
      alert('Se Agrego correctamente');
      window.location = '../webclient/clientpanel.php';
      </script>";
      
    }else if($appointmenID !=""){
      echo "<script>
      alert('Hora de cita ocupada. Verique de Nuevo');
      window.location = '../webclient/clientpanel.php';
      </script>";
    }else{
      echo "<script>
      alert('Hora de cita ocupada. Verique de Nuevo');
     // window.location = '../webclient/clientpanel.php';
      </script>";
    }






 ?>