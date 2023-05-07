<?php
include '../includes/connectdb.php';

$tipoClase = 'admin';

if($_SESSION['staff_sid']==session_id())
{
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Modificar Cliente</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php
      $userID = $_GET['userID'];
      #$quey = 'SELECT * FROM services WHERE serviceID ='.$_GET['servicesID']';'

      $userquery = mysqli_query($connectdb, "SELECT * FROM users WHERE userID ='$userID';");
      while($row = mysqli_fetch_array($userquery)){
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user = $row['username'];
          $user_password= $row['password'];
          $contact_num = $row['contact_num'];
          $email = $row['email'];
          $address = $row['address'];
         
        }
 
    ?>

    <form method="post" class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
        <!-- HEADER -->
        <div>
            <h1 class="text-4xl font-bold">Modificar Información del Cliente</h1>
            <p class="text-gray-600">
                Actualizar Información
            </p>
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        </div>
        <div>
            <div>
                <label for="clientName">Nombres</label>
                <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="user_firstname" value="<?php echo $user_firstname; ?>" />
                <label for="clientName">Apellidos</label>
                <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="user_lastname" value="<?php echo $user_lastname; ?>" />
            </div>
        </div>
        <div>
            <div>
                <label for="clientName">Usuario</label>
                <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="user" value="<?php echo $user; ?>" required />
                <label for="clientName">Contraseña</label>
                <input type="password"
                    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="user_password" value="<?php echo $user_password; ?>" required />
            </div>
        </div>
        <div>
            <label for="contactNum">Número de Contacto</label>
            <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                name="contact_num" value="<?php echo $contact_num; ?>" required />

        </div>
        <div>
            <label for="email">Correo Electronico</label>
            <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                name="email" value="<?php echo $email; ?>" />
            <div>
                <label for="address">Dirección</label>
                <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="address" value="<?php echo $address; ?>" />

            </div>

        </div>
        <a href="admin_ownerinfo.php" name="button"
            class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar</a>
        <button type="submit" formaction="../crud/clientlist_update.php?clase=<?php echo $tipoClase;?>" name="button"
            class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Confirmar Actualización</button>

    </form>

</body>

</html>
<?php
}else
	{
		if($_SESSION['admin_sid']==session_id()){
			header("location:404.php");
		}
		else{
			if($_SESSION['client_sid']==session_id()){
				header("location:404.php");
			}else{
				header("location:login.php");
			}
		}
	}
?>