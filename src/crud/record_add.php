<?php
include '../includes/connectdb.php';

$serviceID = $_POST['servicio'];
$prescription = $_POST['preinscripcion'];
$veterinarian = $_POST['veterinario'];
$idPet = $_POST['petID'];
$peso = $_POST['peso'];
$idUser = (int)$_GET['iduser'];
$idAppointment = (int)$_GET['AppointmentID'];
    
    $queryVeterinario ="SELECT user_firstname, user_lastname FROM users WHERE userID = $veterinarian";
     $result = mysqli_query($connectdb, $queryVeterinario);
     while($row = $result->fetch_assoc()) {
       $nombVete = "Dr. ".$row['user_firstname']." ".$row['user_lastname'];
     }



     $queryPets ="UPDATE pet SET peso = '$peso' WHERE pet_recordID = $idPet";
        mysqli_query($connectdb, $queryPets);

        
        $queryRegistros ="INSERT INTO records (petID, serviceID, prescription, VetDoc, idAppointment) 
        VALUES($idPet, $serviceID,'$prescription','$nombVete', '$idAppointment');";
         mysqli_query($connectdb, $queryRegistros);
         
        if($result){
        $queryCita ="UPDATE appointments SET status = 'Finalizado' where appointmentID = '$idAppointment'";
         mysqli_query($connectdb, $queryCita);
        echo "<script> 
        alert('Se registro Correctamente!!!'); 
        window.location = '../webstaff/records.php'; 
        </script>";  
        
    } else{
        echo "<script>
        alert('Falló al registro!! Verifique de Nuevo.');  
        window.location = '../webstaff/records.php';
        </script>";  
    }

     

     mysqli_close($connectdb);

 

?>