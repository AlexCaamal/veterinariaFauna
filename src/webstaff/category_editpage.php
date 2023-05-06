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
    <title>Editar Categoria</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">
    
    <?php
      $petcategoryID = $_GET['petcategoryID'];
      #$quey = 'SELECT * FROM services WHERE serviceID ='.$_GET['servicesID']';'

      $petquery = mysqli_query($connectdb, "SELECT * FROM pet_category WHERE petcategoryID ='$petcategoryID';");
      while($row = mysqli_fetch_array($petquery)){
          $name = $row['name'];
        }
 
    ?>

    <form method="post" class="px-4 rounded mx-auto max-w-3xl w-full my-32 inputs space-y-6">
      <!-- HEADER -->
      <div>
        <h1 class="text-4xl font-bold">Actualizar Categoria</h1>
        <p class="text-gray-600">
          Se puede Actualizar que Categoria de Animal se atiende.
        </p>
        <input type="hidden" name="petcategoryID" value="<?php echo $petcategoryID; ?>">
      </div>
      <div>
        <div>
          <label for="petName">Tipo de Mascota</label>
          <input
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            name="name"
            value="<?php echo $name; ?>"
          />
        </div>
      
      </div>
       <a href="pet.php" name="button" class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar</a>
      <button type="submit" formaction="../crud/category_update.php" name="button" class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Actualizar Categoria</button>
     
    </form>

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