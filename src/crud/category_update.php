<?php
include '../includes/connectdb.php';

$petID = $_POST['petcategoryID'];
$name = $_POST['name'];

$updatequery = " UPDATE pet_category SET 
    name='$name'
    WHERE petcategoryID=$petID";


if(mysqli_query($connectdb, $updatequery)){
    echo "<script> 
    alert('Se actualizo correctamente!!!'); 
    window.location = '../webstaff/pet.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Ocurrio una falla. Verifique de nuevo');  
    window.location = '../webstaff/pet.php';
    </script>";  
  
}

?>
