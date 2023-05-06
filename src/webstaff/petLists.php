<?php
include '../includes/connectdb.php';
if($_SESSION['staff_sid']==session_id())
{
    $user = $_SESSION['user_id'];
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Lista de Mascotas</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">

  <?php include 'sidebar.html' ?>

    <div class="grid place-items-center pt-5">
       <h1 class="font-extrabold text-3xl text-center text-blue-900">Mascotas</h1>
    </div>

    <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
      <button class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center " type="button" data-modal-toggle="new-category">
              Añadir una Nueva Mascota
      </button>
    </div>
<?php include 'modal_addpetP2.php' ?>
        <!--Search Bar-->
    <div class="grid place-content-end my-2 mx-16 md:my-0 md:mr-28">
        <form class="flex items-center" action="" method="GET">
          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="bg-gray-50 text-gray-900 border-2 border-white text-sm block w-52 p-1" placeholder="Buscar Mascota, Nombre o Dueño">
          <button type="submit" class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10 text-center" type="button">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
    </div>

      <table class="m-auto md:mt-2 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
          <tr class="">
            <th class="p-2">ID</th>
            <th class="p-2">Nombre de Mascota</th>
            <th class="p-2">Edad</th>
            <th class="p-2">Categoria de Mascotas</th>
            <th class="p-2">Dueño</th>
            <th class="p-2">Operaciones</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php  
          $sql = "SELECT p.pet_recordID, p.petName, p.petAge, p.petCategoryID, c.petCategoryID, c.name, p.petUserID, u.userID, user_firstname, user_lastname
          FROM pet AS p LEFT JOIN users AS u ON p.petUserID=u.userID LEFT JOIN pet_category AS c ON p.petCategoryID=c.petCategoryID";
          
          //checks if the search bar is null
          if(isset($_GET['search'])){ 
            $filtervalues = $_GET['search'];
            $sql = "SELECT p.pet_recordID, p.petName, p.petAge, p.petCategoryID, c.petCategoryID, c.name, p.petUserID, u.userID, user_firstname, user_lastname
            FROM pet AS p LEFT JOIN users AS u ON p.petUserID=u.userID LEFT JOIN pet_category AS c ON p.petCategoryID=c.petCategoryID WHERE p.petName LIKE '%$filtervalues%'  
            OR CONCAT(user_firstname, user_lastname) LIKE '%$filtervalues%'";
          }
          $result = $connectdb->query($sql);

            if ($result->num_rows > 0) {
  
              while($row = $result->fetch_assoc()) {
                echo'<tr>';
                  echo'<td class="bg-white top-0 p-1">'.$row["pet_recordID"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["petName"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["petAge"].'</td>';
                  echo'<td class="bg-white top-0 p-1">'.$row["name"].'</td>'; 
                  echo'<td class="bg-white top-0 p-1">'.$row["user_firstname"].' '.$row["user_lastname"].'</td>'; 
                  echo   '<td class="bg-white top-0 p-2">';
                  echo '<a href="petlist_editpage.php?pet_recordID='.$row["pet_recordID"].'&firstname='.$row["user_firstname"].'&lastname='.$row["user_lastname"].'">
                    <ion-icon name="create-outline"></ion-icon> </a>';
                  echo '<a href="../crud/petlist_delete.php?pet_recordID='.$row['pet_recordID'].'">
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
