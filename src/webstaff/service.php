<?php
include '../includes/connectdb.php';

	if($_SESSION['staff_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/style.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Lista de Servicios</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">SERVICIOS</h1>
    </div>


    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
        <button
            class=" block text-black hover:text-white bg-white hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-base p-2 text-center "
            type="button" data-modal-toggle="new-category">
            Añadir nuevo servicio
        </button>
    </div>
    <?php include 'modal_addservice.php' ?>

    <table class="m-5 md:mt-0 md:ml-56 md:w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="p-4">Servicio</th>
                <th class="p-4">Descripción</th>
                <th class="p-4">Precio</th>
                <th class="p-4">Opciones</th>

            </tr>
            <thead>
                <!---
        <tr>
          <td class="border-2 border-blue-800 top-0">Examinations and Diagnosis</td>
          <td class="border-2 border-blue-800">Our clinic offers physical examinations and diagnosis for your pets to ensure that their health are in good shape, or identify underlying conditions making your pets sick</td>
        </tr>
        --->
            <tbody class="text-center">
                <?php
          $servicequery = mysqli_query($connectdb, "SELECT * FROM services");
          if ($servicequery->num_rows > 0) {
            // output data of each row
          while($row = mysqli_fetch_array($servicequery)){
            
            echo '<tr>';

              echo   '<td class="bg-white top-0 p-2 text-bold">'.$row["serviceName"].'</td>';
              echo   '<td class="bg-white top-0 p-2">'.$row["serviceDesc"].'</td>';
              echo   '<td class="bg-white top-0 p-2">'.$row["servicePrice"].'</td>';
              echo   '<td class="bg-white top-0 p-2">';
                echo '<a href="service_editpage.php?servicesID='.$row["servicesID"].'">
                <ion-icon name="create-outline"></ion-icon> </a>';
                 echo '<a href="../crud/service_delete.php?servicesID='.$row['servicesID'].'">
                <ion-icon name="trash-outline"></ion-icon></a>';
              echo '</td>';
            echo '</tr>';

          }
          ?>
            </tbody>

    </table>

    <!--JAVASCRIPT FILES-->
    <script src="src/javascript/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>

</html>
<?php
} else {
	echo "<center>No se encontro información.</center>";
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