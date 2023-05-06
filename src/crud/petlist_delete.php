<?php  
include '../includes/connectdb.php';

if(isset($_GET["pet_recordID"]) && !empty($_GET["pet_recordID"])){
    $petID = $_GET['pet_recordID'];
    #idk but trigger modal to 

    $deletequery = "DELETE FROM pet WHERE pet_recordID ='$petID';";

    
    if(mysqli_query($connectdb, $deletequery)){
        echo "<script> 
        alert('Se elimino correctamente la Macosta!'); 
        window.location = '../webstaff/petLists.php'; 
        </script>";  
    
    } else{
        echo "<script>
        alert('Error en eliminarlo. Verifique de Nuevo');  
        window.location = '../webstaff/petLists.php';
        </script>";  
    }

}

?>