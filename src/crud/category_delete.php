<?php  
include '../includes/connectdb.php';

if(isset($_GET["petcategoryID"]) && !empty($_GET["petcategoryID"])){
    $categoryID = $_GET['petcategoryID'];
    #idk but trigger modal to 

    $deletequery = " DELETE FROM pet_category WHERE petcategoryID ='$categoryID';";

    
    if(mysqli_query($connectdb, $deletequery)){
        echo "<script> 
        alert('Categoria Eliminada!'); 
        window.location = '../webstaff/pet.php'; 
        </script>";  
    
    } else{
        echo "<script>
        alert('Fallo al Eliminar.');  
        window.location = '../webstaff/pet.php';
        </script>";  
    }

}

?>