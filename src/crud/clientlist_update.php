<?php
include '../includes/connectdb.php';

$userID = $_POST['userID'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$contact_num = $_POST['contact_num'];
$email = $_POST['email'];
$address = $_POST['address'];
$clase = $_GET['clase'];
$password = "";
$user = "";


if(isset($_POST['user'])){
    $user = $_POST['user'];
    $password = $_POST['user_password'];
}else{
    $password = "";
    $user = "";
}

$updatequery = " UPDATE users SET 
    user_firstname = '$user_firstname',
    user_lastname = '$user_lastname',
    username = '$user',
    password = '$password',
    contact_num = '$contact_num',
    email = '$email',
    address='$address'
    WHERE userID =$userID; ";



if ($clase == 'cliente') {
        if(mysqli_query($connectdb, $updatequery)){
            echo "<script> 
            alert('Se Modifico con exito al Cliente!'); 
            window.location = '../webclient/client_ownerinfo.php'; 
            </script>";  
            
        } else{
            echo "<script>
            alert('Error en hacer la acción.');  
            window.location = '../webclient/client_ownerinfo.php'; 
            </script>";  
        
        }
}else if ($clase == 'admin'){
       if(mysqli_query($connectdb, $updatequery)){
            echo "<script> 
            alert('Se Modifico con exito!'); 
            window.location = '../webstaff/admin_ownerinfo.php'; 
            </script>";  
            
        } else{
            echo "<script>
            alert('Error en hacer la acción.');  
            window.location = '../webstaff/admin_ownerinfo.php'; 
            </script>";  
        }
}else{
    if(mysqli_query($connectdb, $updatequery)){
            echo "<script> 
            alert('Se Modifico con exito al Cliente!'); 
            window.location = '../webstaff/client_records.php'; 
            </script>";  
            
        } else{
            echo "<script>
            alert('Error en hacer la acción.');  
            window.location = '../webstaff/client_records.php';
            </script>";  
        
        }
}
?>