<?php
include '../includes/connectdb.php';

if(isset($_GET["inquiryID"]) && !empty($_GET["inquiryID"])){
    $inquiryID = $_GET['inquiryID'];
    #idk but trigger modal to

    $deletequery = " DELETE FROM inquiries WHERE inquiryID ='$inquiryID';";


    if(mysqli_query($connectdb, $deletequery)){
        echo "<script>
        alert('Servicio Eliminado!');
        window.location = '../webstaff/inquiries.php';
        </script>";

    } else{
        echo "<script>
        alert('Error al eliminar.');
        window.location = '../webstaff/inquiries.php';
        </script>";
    }

}

?>