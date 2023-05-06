<?php
include '../includes/connectdb.php';
	if($_SESSION['client_sid']==session_id())
	{
    $user = $_SESSION['user_id'];
    $sql = "SELECT p.pet_recordID, r.petID, p.petName, r.serviceID, s.servicesID, s.serviceName, r.dateRecorded, r.prescription, r.VetDoc
            FROM records AS r
            LEFT JOIN services AS s ON r.serviceID=s.servicesID
            LEFT JOIN pet AS p ON p.pet_recordID=r.petID
            WHERE petUserID='$user'
            ORDER BY dateRecorded DESC";
    $result = $connectdb->query($sql);
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Historial Clinico</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'clientsidebar.php' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">Historial Clinico</h1>
    </div>

    <table class="m-auto md:mt-10 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="p-2">Mascota</th>
                <th class="p-2">Servicio</th>
                <th class="p-2">Prescripción</th>
                <th class="p-2">Veterinario</th>
                <th class="p-2">Fecha</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php  
            if ($result->num_rows > 0) {
  
              while($row = $result->fetch_assoc()) {
                echo'<tr>';
                  echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["serviceName"].'</td>'; 
                  echo'<td class="bg-white top-0 p-1">'.$row["prescription"].'</td>'; 
                  echo'<td class="bg-white top-0 p-1">'.$row["VetDoc"].'</td>'; 
                  echo'<td class="bg-white top-0 p-1">'.$row["dateRecorded"].'</td>'; 
              }           
                echo '</tr>';      
            ?>
        </tbody>
    </table>

</body>

</html>
<?php
} else {
  echo "<center>No se ha generado alguna Preinscripción.</center>";
}
    }else
	{
		if($_SESSION['admin_sid']==session_id()){
			header("location:404.php");		
		}
		else{
			if($_SESSION['staff_sid']==session_id()){
				header("location:404.php");		
			}else{
				header("location:login.php");
			}
		}
	}
?>