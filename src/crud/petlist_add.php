<?php
include '../includes/connectdb.php';
$petName = $_POST['pet_name'];
$petAge = $_POST['pet_age'];
$category = $_POST['category'];
$sexo = $_POST['sexo1'];
$peso = $_POST['peso1'];
$raza = $_POST['raza1'];
$nom = $_GET['nombreClase'];
$ape = $_POST['apellido1'];

$nombre2 = $_POST['nombre1'];

  date_default_timezone_set("America/Monterrey"); 
  $fechaHoy =  date("Y-m-d"); 


if(!empty($_POST['category'])){

 $idUser = 0;
  $sqlIdUser = "SELECT userID FROM users WHERE user_firstname = '$nombre2'";
  $result2 = mysqli_query($connectdb, $sqlIdUser);
  while($row = $result2->fetch_assoc()) {
       $idUser = $row['userID'];
     }


     echo $idUser;
      
  $sql = "INSERT INTO pet (petName, petAge, petCategoryID, sexo, peso, raza, petUserID)
  VALUES ('$petName','$petAge','$category','$sexo','$peso','$raza',$idUser);";
  $result = mysqli_query($connectdb, $sql);
  
  mysqli_close($connectdb);
  if($result){
     
    if($nom=="Registro"){
        echo "<script> 
        alert('Se Añadio correctamente!');
        </script>"; 
        header("Location: ../webstaff/modal_addrecord.php?firstname=$nombre2&lastname=$ape&clase=$nom");
    }else if($nom=="Mascotas"){
        echo "<script> 
        alert('Se Añadio correctamente!'); 
      window.location = '../webstaff/petLists.php?firstname='; 
        </script>"; 
    }else if($nom=="cliente"){
        echo "<script> 
        alert('Se Añadio correctamente!'); 
      window.location = '../webclient/petrec.php'; 
        </script>"; 
    }else if($nom=="citaPet"){
        echo "<script> 
        alert('Se Añadio correctamente!'); 
      window.location = '../webclient/requestapp.php?firstname=&lastname=&pet=&contact=&date=$fechaHoy';
</script>";
}else if($nom=="CitaMascota"){
echo $nom;
echo "<script>
alert('Se Añadio correctamente!');
</script>";
header( "Location:../webstaff/requestapp.php?firstname=$nombre2&lastname=$ape&clase=$nom");

}

}else{
if($nom=="Registro"){
echo "<script>
alert('Se Produjo un error!');
window.location = '../webstaff/modal_addrecord.php';
</script>";
}else if($nom=="Mascotas"){
echo "<script>
alert('Se Produjo un error!');
window.location = '../webstaff/petLists.php?firstname=';
</script>";
} else if($nom=="cliente"){
echo "<script>
alert('Se Produjo un error!');
window.location = '../webclient/petrec.php';
</script>";
}else if($nom=="CitaMascota"){
echo "<script>
alert('Se Produjo un error!');
window.location = '../webclient/requestapp.php?firstname=$nombre2&lastname=$ape&clase=$nom; 
</script>";
}
}
} else {
echo "<script>
alert('Verifique que no hayan espacios en blanco.');
window.location = '../webstaff/petLists.php';
</script>";
}

?>