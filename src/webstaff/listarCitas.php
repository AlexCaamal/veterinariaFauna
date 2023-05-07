 <?php
 include '../includes/connectdb.php';
date_default_timezone_set("America/Monterrey");
$date = date("Y-m-d");
$dateQuery = mysqli_query($connectdb,"SELECT a.appointmentID,a.date, h.Hora, a.servicesID, a.petID, p.pet_recordID,
	p.petName, s.servicesID, s.serviceName, a.status, a.petID FROM appointments AS a LEFT JOIN pet AS p ON a.petID=p.pet_recordID
	LEFT JOIN services AS s ON a.servicesID=s.servicesID left join horacitas as h on a.time  = h.idHora  WHERE date ='$date' AND status = 'Pendiente';");

	while($row = $dateQuery->fetch_assoc()) {
			echo'<tr class="text-center">';
			echo'<td class="bg-white top-0 p-1">'.$row["appointmentID"].'</td>';
			echo'<td class="bg-white top-0 p-1">'.$row["date"].'</td>';
		    echo'<td class="bg-white top-0 p-1">'.$row["Hora"].'</td>';
			echo'<td class="bg-white top-0 p-1">'.$row["serviceName"].'</td>';
			echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
	}
echo '</tr>';		
 ?>