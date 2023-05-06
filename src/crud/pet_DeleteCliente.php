<?php
  include '../includes/connectdb.php';
  $idPet = $_GET['id'];
  $idUser = $_GET['iduser'];
  $NamePet = $_GET['namePet'];


  $sql = "DELETE FROM pet WHERE petName='$NamePet' AND pet_recordID = '$idPet' AND petUserID = '$idUser'";

  if(mysqli_query($connectdb, $sql)){
    echo "<script> 
    alert('Se Borro Correctamente!'); 
    window.location = '../webclient/petrec.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Ocurrio una Falla. Verifique de Nuevo.');  
    window.location = '../webclient/petrec.php';
    </script>";  
  
}


  
?>