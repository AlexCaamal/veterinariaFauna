<?php
include '../includes/connectdb.php';
	if($_SESSION['client_sid']==session_id())
	{
    $user = $_SESSION['user_id'];
    $sql = "SELECT p.pet_recordID, p.petName, p.petAge,p.peso, p.sexo, p.raza, p.petCategoryID, c.petCategoryID, c.name 
            FROM pet AS p LEFT JOIN pet_category AS c ON p.petCategoryID=c.petCategoryID 
            WHERE petUserID='$user'";
    $result = $connectdb->query($sql);
    
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Información de Mascotas</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'clientsidebar.php' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">MIS MASCOTAS</h1>
    </div>
    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
        <a href="modal_addPets.php?firstname=&lastname=&clase=cliente"
            class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center "
            type="button" data-modal-toggle="new-category">
            Añadir una Nueva Mascota
        </a>
    </div>

    <table class="m-auto md:mt-10 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="w-1/5 p-2">Nombre de Mascota</th>
                <th class="w-1/5 p-2">Edad</th>
                <th class="w-1/5 p-2">Peso (KG)</th>
                <th class="w-1/5 p-2">Sexo</th>
                <th class="w-1/5 p-2">Raza</th>
                <th class="w-1/5 p-2">Categoria</th>
                <th class="w-1/5 p-2">Operaciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php  
            if ($result->num_rows > 0) {
  
              while($row = $result->fetch_assoc()) {
                echo'<tr>';
                  echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["petAge"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["peso"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["sexo"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["raza"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["name"].'</td>'; 
                  echo'<td class="bg-white top-0 p-1">
                  <a href="pet_editpage.php?pet_recordID='.$row["pet_recordID"].'"><ion-icon name="create-outline"></ion-icon></a>
                  <a href="../crud/pet_DeleteCliente.php?id='.$row["pet_recordID"].'&iduser='.$user.'&namePet='.$row["petName"].'"><ion-icon name="trash-outline"></ion-icon></a>
                    </td>';
                                //put relation to display category instead than category id
              }           
                echo '</tr>';      
            ?>
        </tbody>
    </table>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php
} else {
  echo "<center>No hay datos que mostrar.</center>";
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