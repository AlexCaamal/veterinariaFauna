<?php
        try{
          if (empty($_POST['user'])) {
                //por si esta vacio el campo
            }else{
                include 'includes/connectdb.php';
                $nombre = $_POST['fname'];
                $apellido = $_POST['lname'];
                $user = $_POST['user'];
                $contra1 = $_POST['pass'];
                $contra2 = $_POST['Veripass'];
                $telefono = $_POST['contactNum'];
                $email = $_POST['email'];
                $Direccion = $_POST['address'];
                $level = 2;

                $sql = "SELECT * from users WHERE username = '$user'";
                $resultado = mysqli_query($connectdb, $sql);
                if ($row = mysqli_fetch_array($resultado)) {
                    echo "<script> 
                         alert('Ya se encuentra registrado el Usuario'); 
                          window.location = 'Registro.php'; 
                           </script>";
                }else{
                    if(verificarContraseña($contra1,$contra2) == true){
                        $sqlInsert="INSERT INTO users (user_firstname, user_lastname, username, password, user_level, contact_num, email, address) 
                        VALUES ('$nombre', '$apellido','$user','$contra1','$level','$telefono','$email','$Direccion')";
                        $resultado = mysqli_query($connectdb, $sqlInsert);
                        mysqli_close($connectdb);
                        echo "<script> 
                         alert('Se Creo Correctamente el Usuario'); 
                          window.location = 'login.php'; 
                           </script>"; 
                    }
                }
            }
        }catch(Exception $e){
          echo 'Error en DetectarUser: '.$e->getMessage();
        }
     
     
     function verificarContraseña (string $contra1, string $contra2):bool{
        if($contra1==$contra2){
            return true;
        }else{
            echo "<script> 
                         alert('Las constraseñas no coinciden... Verifique nuevamente'); 
                          window.location = 'Registro.php'; 
                           </script>"; 
            return false;
        }
     }
     
     
  
  
?>