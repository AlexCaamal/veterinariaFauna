<?php
include '../includes/connectdb.php';
	if($_SESSION['client_sid']==session_id())
	{
    $user = $_SESSION['user_id'];
    $sql = "SELECT user_firstname, user_lastname, contact_num, email, address FROM users WHERE userID='$user'";
    $result = $connectdb->query($sql);

		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/style.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Información Personal</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'clientsidebar.php' ?>

    <div class="grid place-items-center md:ml-56 pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">INFORMACIÓN PERSONAL</h1>
    </div>

    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
        <a href="clientlist_editpage.php?userID=<?php echo $user;?>"
            class=" block text-black hover:text-white bg-white hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-base p-2 text-center "
            type="button">
            Actualizar Información
        </a>
    </div>


    <div class="grid place-items-center">
        <table class="m-auto md:mt-10 md:ml-56 md:mr-4 w-9/12 md:w-1/3 text-left border-collapse lg:ml-60 shadow-lg">

            <tbody class="text-left">
                <?php
          if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                echo'<tr>';
                echo '<th class="p-2 bg-white top-0">Nombre</th>';
                echo'<td class="bg-white top-0 p-1">'.$row["user_firstname"].'&nbsp'.$row["user_lastname"].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo '<th class="p-2 bg-white top-0">Dirección Vivienda</th>';
                echo'<td class="bg-white top-0 p-1">'.$row["address"].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo '<th class="p-2 bg-white top-0">Número de Contacto</th>';
                echo'<td class="bg-white top-0 p-1">'.$row["contact_num"].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo '<th class="p-2 bg-white top-0">Correo Electronico</th>';
                echo'<td class="bg-white top-0 p-1">'.$row["email"].'</td>';
              }
                echo '</tr>';
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php
} else {
  echo "<center>No records found.</center>";
}
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