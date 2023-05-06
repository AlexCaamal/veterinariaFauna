<?php
include '../includes/connectdb.php';
	if($_SESSION['staff_sid']==session_id())
	{
		$sql = "SELECT inquiryID, inquirerName, inquirerEmail, inquirerNumber, inquirerMessage FROM inquiries";
		$result = $connectdb->query($sql);

		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Mensajes</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">Bandeja de Mensajes</h1>
    </div>
    <table class="m-5 md:mt-10 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="p-4">Id</th>
                <th class="p-4">Nombre</th>
                <th class="p-4">Correo</th>
                <th class="p-4">Número Teléfonico</th>
                <th class="p-4">Mensaje</th>
                <th class="p-4">Operaciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            echo'<tr>';
              echo'<td class="bg-white top-0 p-2">'.$row["inquiryID"].'</td>';
              echo'<td class="bg-white top-0 p-2">'.$row["inquirerName"].'</td>';
              echo'<td class="bg-white top-0 p-2">'.$row["inquirerEmail"].'</td>';
              echo'<td class="bg-white top-0 p-2">'.$row["inquirerNumber"].'</td>';
              echo'<td class="bg-white top-0 p-2">'.$row["inquirerMessage"].'</td>';
							echo   '<td class="bg-white top-0 p-2">';
								 echo '<a href="../crud/service_inqDelete.php?inquiryID='.$row['inquiryID'].'">
								<ion-icon name="trash-outline"></ion-icon></a>';
							echo '</td>';
          }
            echo '</tr>';
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
	echo "<center>Sin Mensajes.</center>";
}
	}else
	{
		if($_SESSION['staff_sid']==session_id()){
			header("location:404.php");
		}
		else{
			if($_SESSION['customer_sid']==session_id()){
				header("location:404.php");
			}else{
				header("location:login.php");
			}
		}
	}
?>