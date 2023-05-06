<?php
   include '../includes/connectdb.php';

  $idAppoiment = $_GET['idAppoiment'];
  $idUser = $_GET['idUser'];


   $sql = "UPDATE appointments SET status = 'Rechazado' WHERE appointmentID='$idAppoiment' and userID='$idUser'";

  if(mysqli_query($connectdb, $sql)){
    echo "<script> 
    alert('Se Cancelo Correctamente!'); 
    window.location = '../webclient/clientpanel.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Ocurrio una Falla. Verifique de Nuevo.');  
    window.location = '../webclient/clientpanel.php';
    </script>";  
  
}
  
?>