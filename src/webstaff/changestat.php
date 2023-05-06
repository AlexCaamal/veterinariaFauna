<?php
include '../includes/connectdb.php';



  if(isset($_POST["stats"]) && !empty($_POST["stats"]) && isset($_POST["ID"]) && !empty($_POST["ID"])){
      $ID = $_POST["ID"];
        $stats = $_POST["stats"];
      #idk but trigger modal to

      $sql = "UPDATE appointments SET status='$stats' WHERE appointmentID='$ID'";


      if(mysqli_query($connectdb, $sql)){
          echo "<script>
          alert('Se realizo correctamente!');
          window.location = '../webstaff/appointments.php?status=$stats';
          </script>";

      } else{
          echo "<script>
          alert('Fallo al Actualizar Estatus');
          window.location = '../webstaff/appointments.php';
          </script>";
      }

  }else{
    echo "<script>
    alert(".$_POST["ID"].");
    window.location = '../webstaff/appointments.php';
    </script>";
  }

?>
