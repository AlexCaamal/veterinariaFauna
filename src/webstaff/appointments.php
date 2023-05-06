<?php
include '../includes/connectdb.php';
$status = $_GET['status'];

	if($_SESSION['staff_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
    <meta charset="utf-8">
    <link rel="icon" href="../images/templogo.png">
    <title>CITAS</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">CITAS</h1>
    </div>

    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
        <a href="requestapp.php?clase=CitaMascota&contact=&date="
            class=" block text-black hover:text-white bg-white hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-base p-2 text-center "
            type="button">
            Generar nueva Cita
        </a>
    </div>

    <?php
		  if ($status == 'Pendiente') {

		?>
    <div style="display: row; text-align:center;">
        <div style="margin:0px auto; ">
            <form action="appointments.php">
                <select class="bg-white" style="width:20%; text-align:center; font-weight: bold;" name="status"
                    onchange="this.form.submit()">
                    <option value=""><?php  echo  $status;?></option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Rechazado">Rechazado</option>
                </select>

            </form>


        </div>
    </div>
    <?php
		  } else if ($status == 'Finalizado'){
		?>
    <div style="display: row; text-align:center;">
        <div style="margin:0px auto;">
            <form action="appointments.php">
                <select class="bg-white" style="width:20%; text-align:center; font-weight: bold;" name="status"
                    onchange="this.form.submit()">
                    <option value=""><?php  echo  $status;?></option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Rechazado">Rechazado</option>
                </select>

            </form>


        </div>
    </div>
    <?php
			
		  }else if ($status == 'Rechazado'){
			?>
    <div style="display: row; text-align:center;">
        <div style="margin:0px auto;">
            <form action="appointments.php">
                <select class="bg-white" style="width:20%; text-align:center; font-weight: bold;" name="status"
                    onchange="this.form.submit()">
                    <option value=""><?php  echo  $status;?></option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Pendiente">Pendiente</option>
                </select>

            </form>


        </div>
    </div>
    <?php

		  }
		  
		  
		?>


    <table class="m-auto md:mt-5 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <?php
            date_default_timezone_set("America/Monterrey");
			$date = date("Y-m-d");
			$dateQuery = mysqli_query($connectdb,"SELECT a.appointmentID,a.date, h.Hora, 
									p.petName, s.serviceName, a.status FROM appointments AS a LEFT JOIN pet AS p ON a.petID=p.pet_recordID
									LEFT JOIN services AS s ON a.servicesID=s.servicesID left join horacitas as h on a.time  = h.idHora WHERE date >='$date' AND status='$status' ORDER BY date, time;");
			?>
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="p-2">No. de Cita</th>
                <th class="p-2"> Fecha de citada </th>
                <th class="p-2">Hora</th>
                <th class="p-2">Nombre de Servicio</th>
                <th class="p-2">Nombre de Mascotas</th>
                <th class="p-2">Estado</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
				while($row = $dateQuery->fetch_assoc()) {
					echo'<tr>';
						echo'<td class="bg-white top-0 p-1">'.$row["appointmentID"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["date"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["Hora"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["serviceName"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';

						if($row["status"]=="Pendiente"){
							$val = $row["status"];
					echo '<td class="bg-white">';
					echo '<form method="POST" id="here" action="changestat.php">';
					echo '<select class="bg-white" name="stats" onchange="this.form.submit()">';
					echo '<option value='.$row["status"].'>'.$row["status"].'</option>';
					echo '<option value="Finalizado">Finalizado</option>';
					echo '<option value="Rechazado">Rechazado</option>';
					echo '</select>';
					echo '<input name="ID" class="hidden" value="'.$row["appointmentID"].'">';
						echo '</form>';
					echo '</td>';
				}else if($row["status"]=="Finalizado"){
			$val = $row["status"];
	echo '<td class="bg-white">';
	echo '<form method="POST" id="here" action="changestat.php">';
	echo '<select class="bg-white" name="stats" onchange="this.form.submit()">';
	echo '<option value='.$row["status"].'>'.$row["status"].'</option>';
	echo '<option value="Rechazado">Rechazado</option>';
	echo '</select>';
	echo '<input name="ID" class="hidden" value="'.$row["appointmentID"].'">';
		echo '</form>';
	echo '</td>';
}else if($row["status"]=="Rechazado"){
	$val = $row["status"];
echo '<td class="bg-white">';
echo '<form method="POST" id="here" action="changestat.php">';
echo '<select class="bg-white" name="stats" onchange="this.form.submit()">';
echo '<option value='.$row["status"].'>'.$row["status"].'</option>';
echo '<option value="Pendiente">Pendiente</option>';
echo '</select>';
echo '<input name="ID" class="hidden" value="'.$row["appointmentID"].'">';
echo '</form>';
echo '</td>';
}


				}
					echo '</tr>';
				 ?>
        </tbody>
    </table>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

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
<?php

  if(isset($_POST["stats"]) && !empty($_POST["stats"])){
      $ID = $_POST['stats'];
      #idk but trigger modal to

      $query = "INSERT INTO appointments(status)
  VALUES ('$ID')";

      if(mysqli_query($connectdb, $query)){
          echo "<script>
          alert('Status successfully changed!');
          window.location = '../webstaff/appointments.php';
          </script>";

      } else{
          echo "<script>
          alert('Failed to commit changes');
          window.location = '../webstaff/appointments.php';
          </script>";
      }

  }


 ?>