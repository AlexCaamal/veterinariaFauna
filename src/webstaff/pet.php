<?php
include '../includes/connectdb.php';
	if($_SESSION['staff_sid']==session_id())
	{
    $sql = "SELECT petcategoryID, name, date_created FROM pet_category";
    $result = $connectdb->query($sql);

    if ($result->num_rows > 0) {
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Categoria de Mascotas</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center  text-blue-900">Categoria de Mascotas</h1>
    </div>

    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
        <button
            class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 text-center "
            type="button" data-modal-toggle="new-category">
            Añadir nueva categoria
        </button>
    </div>

    <?php include 'modal_addcategory.php' ?>

    <table class=" m-auto md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="w-1/5 p-2">Id</th>
                <th class="w-1/5 p-2">Tipo de Mascota</th>
                <th class="w-1/5 p-2">Fecha de Creación</th>
                <th class="w-1/5 p-2">Opciones</th>
            </tr>
        </thead>

        <tbody class="text-center">
            <?php   
            while($row = $result->fetch_assoc()) {
              echo'<tr>';
                echo'<td class=" bg-white top-0 p-1">'.$row["petcategoryID"].'</td>';
                echo'<td class="bg-white top-0 p-1">'.$row["name"].'</td>';
                echo'<td class="bg-white top-0 p-1">'.$row["date_created"].'</td>';
                echo   '<td class="bg-white top-0 p-2">';
                echo '<a href="category_editpage.php?petcategoryID='.$row["petcategoryID"].'">
                  <ion-icon name="create-outline"></ion-icon> </a>';
                echo '<a href="../crud/category_delete.php?petcategoryID='.$row['petcategoryID'].'">
                  <ion-icon name="trash-outline"></ion-icon></a>';
                echo '</td>';
  }           echo '</tr>';      
					?>

        </tbody>
    </table>

    <script src="src/javascript/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>

</html>
<?php
} else {
  echo "No records found.";
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