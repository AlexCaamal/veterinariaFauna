<?php
include '../includes/connectdb.php';

$pet_type = $_POST['pet_type'];

$query ="INSERT INTO pet_category (name)  VALUES('$pet_type')";

if(mysqli_query($connectdb, $query)){
    echo "<script> 
    alert('Category successfully added!'); 
    window.location = '../webstaff/pet.php'; 
    </script>";  
    
} else{
    echo "<script>
    alert('Failed to add.');  
    window.location = '../webstaff/pet.php';
    </script>";  
  
}

?>