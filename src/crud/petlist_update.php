<?php
include '../includes/connectdb.php';

$petID = $_POST['pet_recordID'];
$name = $_POST['petName'];
$age = $_POST['petAge'];
$category = $_POST['petCategoryID'];
$sexo = $_POST['sexo'];
$peso = $_POST['peso'];
$raza = $_POST['raza'];

$updatequery = " UPDATE pet SET 
    petName='$name',
    petAge='$age',
    petCategoryID='$category',
    sexo='$sexo',
    peso='$peso',
    raza='$raza'
    WHERE pet_recordID =$petID; ";


if(mysqli_query($connectdb, $updatequery)){
    echo "<script> 
    alert('Se realizó correctamente'); 
    window.location = '../webstaff/petLists.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Ocurrio una falla. Intente de Nuevo.');  
    window.location = '../webstaff/petLists.php';
    </script>";  
  
}

?>
