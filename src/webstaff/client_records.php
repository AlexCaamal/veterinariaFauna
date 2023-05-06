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
    <title>Clientes</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">

  <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">CLIENTES</h1>
    </div>

    <!--Search Bar-->
    <div class="grid place-content-end md:mr-28 mt-5 md:mt-0">
        <form class="flex items-center" action="" method="GET">
          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="bg-gray-50 text-gray-900 border-2 border-white text-sm block w-52 p-1" placeholder="Buscar Cliente, Nombre o ID">
          <button type="submit" class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10 text-center" type="button">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
    </div>

      <table class="m-auto mt-5 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
          <tr class="">
            <th class="p-2">ID</th>
            <th class="p-2">Nombre</th>
            <th class="p-2">Número de Telefono</th>
            <th class="p-2">Correo</th>
            <th class="p-2">Dirección</th>
            <th class="p-2">Fecha de Inicio</th>
            <th class="p-2">Acción</th>
          </tr>
        </thead>

        <tbody class="text-center">
          <?php   

          $sql = "SELECT userID, user_firstname, user_lastname, contact_num, email, address, date_added FROM users WHERE user_level='2'";
          
          if(isset($_GET['search'])){ //checks if the input text is not null
            $filtervalues = $_GET['search'];
            $sql = "SELECT userID, user_firstname, user_lastname, contact_num, email, address, date_added FROM users 
                    WHERE user_level='2' AND CONCAT(user_firstname, user_lastname) LIKE '%$filtervalues%' OR userID = '$filtervalues' AND user_level='2'";
          }
          $result = $connectdb->query($sql);
      
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo'<tr>';
                echo'<td class=bg-white top-0 p-1">'.$row["userID"].'</td>';
                echo'<td class=bg-white top-0 p-1">'.$row["user_firstname"].'&nbsp;'.$row["user_lastname"].'</td>';
                echo'<td class=bg-white top-0 p-1">'.$row["contact_num"].'</td>';
                echo'<td class=bg-white top-0 p-1">'.$row["email"].'</td>';
                echo'<td class=bg-white top-0 p-1">'.$row["address"].'</td>';
                echo'<td class=bg-white top-0 p-1">'.$row["date_added"].'</td>';
                echo   '<td class="bg-white top-0 p-2">';
                echo '<a href="clientlist_editpage.php?userID='.$row["userID"].'">
                      <ion-icon name="create-outline"></ion-icon> </a>';
                echo '<a href="../crud/clientlist_delete.php?userID='.$row['userID'].'">
                      <ion-icon name="trash-outline"></ion-icon></a>';
                echo'</td>';
              }           
              echo '</tr>';   
            } else{
              echo'<tr>';
              echo'<td colspan="9" class="bg-white top-0 p-1">Sin coincidencias.</td>';
              echo'<tr>';
           }   
					?>
        </tbody>
      </table>

      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
