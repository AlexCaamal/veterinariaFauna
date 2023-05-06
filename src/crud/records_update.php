<?php
include '../includes/connectdb.php';

$recordID = $_POST['recordID'];
$dateRecorded = $_POST['dateRecorded'];
$petID = $_POST['petID'];
$serviceID = $_POST['serviceID'];
$prescription = $_POST['prescription'];
$VetDoc = $_POST['VetDoc'];

$updatequery = " UPDATE records SET 
    dateRecorded = '$dateRecorded',
    petID = '$petID',
    serviceID = '$serviceID',
    prescription = '$prescription',
    VetDoc = '$VetDoc'
    WHERE recordID = $recordID; ";


if(mysqli_query($connectdb, $updatequery)){
    echo "<script> 
    alert('Se actualizo correctamente!'); 
    window.location = '../webstaff/records.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Error al modificar el Registro.');  
    window.location = '../webstaff/records.php';
    </script>";  
  
}

?>
