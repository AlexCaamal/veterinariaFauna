 <?php  
 include '../includes/connectdb.php';
 $user = $_SESSION['user_id'];
  $sql = "SELECT p.pet_recordID, r.petID, p.petName, r.serviceID, s.servicesID, s.serviceName, r.dateRecorded, r.prescription, r.VetDoc
            FROM records AS r
            LEFT JOIN services AS s ON r.serviceID=s.servicesID
            LEFT JOIN pet AS p ON p.pet_recordID=r.petID
            WHERE petUserID='$user'
            ORDER BY dateRecorded DESC";
    $result = $connectdb->query($sql);
            if ($result->num_rows > 0) {
    ?>
 <?php
  
     while($row = $result->fetch_assoc()) {
     echo'<tr>';
         echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
         echo'<td class="bg-white top-0 p-1">'.$row["serviceName"].'</td>';
         echo'<td class="bg-white top-0 p-1">'.$row["prescription"].'</td>';
         echo'<td class="bg-white top-0 p-1">'.$row["VetDoc"].'</td>';
         echo'<td class="bg-white top-0 p-1">'.$row["dateRecorded"].'</td>';
         }
         echo '</tr>';?>

 <?php
}else{?>
 <br>
 <div style="font-size:25px;">
     No se ha generado alguna Preinscripción.
 </div>
 <?php
    }
 ?>