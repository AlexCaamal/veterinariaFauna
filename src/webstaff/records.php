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
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    
    <title>Registros</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">

  <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center  text-blue-900">REGISTROS</h1>
    </div>
       <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
      <!-- data-modal-toggle="new-category"-->
      <a type="submit" class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 text-center " type="button" href="modal_addrecord.php?firstname=&lastname=&clase=Registro">
              Generar Nuevo Registro
  </a>
    </div>
   

    <?php //include 'modal_addrecord.php' ?>

    <!--Search Bar-->
    

    <div class="grid place-content-end my-2 md:my-0 md:mr-28">
        <form class="flex items-center" action="" method="GET">

          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="bg-gray-50 text-gray-900 border-2 border-white text-sm block w-52 p-1" placeholder="Buscar Registro">
          <button type="submit" class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10 text-center" type="button">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
    </div>

      <table class="m-5 md:mt-2 md:ml-56 md:mr-4 md:w-9/12 text-left border-collapse lg:ml-60 shadow-lg ">
				<?php
        
				 $Query = mysqli_query($connectdb,"SELECT recordID, dateRecorded, a.petName, u.user_firstname, u.user_lastname, s.serviceName, prescription, VetDoc
                                 FROM records AS r LEFT JOIN pet AS a ON r.petID=a.pet_recordID
                                 LEFT JOIN services AS s ON r.serviceID=s.servicesID 
                                 left JOIN users AS u ON u.userID=a.petUserID 
                                 ORDER BY dateRecorded DESC;");

          if(isset($_GET['search'])){
            
            $filtervalues = $_GET['search'];
            if($filtervalues == ""){

              $Query = mysqli_query($connectdb,"SELECT recordID, dateRecorded,  a.petName,  u.user_firstname,u.user_lastname, s.serviceName, prescription, VetDoc
                                 FROM records AS r LEFT JOIN pet AS a ON r.petID=a.pet_recordID
                                 LEFT JOIN services AS s ON r.serviceID=s.servicesID 
                                 inner JOIN users AS u ON u.userID=a.petUserID   ORDER BY dateRecorded DESC;");

            }else{
                $Query = mysqli_query($connectdb,"SELECT recordID, dateRecorded,  a.petName, u.user_firstname, u.user_lastname,  s.serviceName, prescription, VetDoc
                                 FROM records AS r LEFT JOIN pet AS a ON r.petID=a.pet_recordID
                                 LEFT JOIN services AS s ON r.serviceID=s.servicesID 
                                 inner JOIN users AS u ON u.userID=a.petUserID 
                                 WHERE a.petName ='$filtervalues' OR recordID = '$filtervalues' ORDER BY dateRecorded DESC;");
            }
            
          }
				 ?>
         <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
          <tr class="">
            <th class="p-2">No. Registro</th>
            <th class="p-2">Fecha Timbrada</th>
            <th class="p-2">Mascota</th>
            <th class="p-2">Dueño</th>
            <th class="p-2">Servicio</th>
            <th class="p-2">PreInscripciòn</th>
            <th class="p-2">Veterinario</th>
            <th class="p-2">Acción</th>
          </tr>
        </head>
				<?php
        if($Query->num_rows > 0){
				while($row = $Query->fetch_assoc()) {
					echo'<tr>';
						echo'<td class="bg-white top-0 p-1">'.$row["recordID"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["dateRecorded"].'</td>';
            echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
            echo'<td class="bg-white top-0 p-1">'.$row["user_firstname"].' '.$row["user_lastname"].'</td>';
            echo'<td class="bg-white top-0 p-1">'.$row["serviceName"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["prescription"].'</td>';
						echo'<td class="bg-white top-0 p-1">'.$row["VetDoc"].'</td>';
            echo'<td class="bg-white top-0 p-2">';
            echo '<a href="records_editpage.php?recordID='.$row['recordID'].'">
                <ion-icon name="create-outline"></ion-icon></a>';
            echo '<a href="../crud/records_delete.php?recordID='.$row['recordID'].'">
                <ion-icon name="trash-outline"></ion-icon></a>';
            echo '</td>';

				}
					echo '</tr>';
        } else{
          echo'<tr>';
          echo'<td colspan="9" class="bg-white top-0 p-1">Sin Datos que Mostrar.</td>';
          echo'<tr>';
       }
				 ?>
         
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
