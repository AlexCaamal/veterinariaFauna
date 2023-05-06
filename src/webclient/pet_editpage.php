<?php
include '../includes/connectdb.php';

if($_SESSION['client_sid']==session_id())
{
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/styles.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Editar Información</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">
    
    <?php
      $pet_recordID = $_GET['pet_recordID'];
  
      $petquery = mysqli_query($connectdb, "SELECT * FROM pet WHERE pet_recordID ='$pet_recordID'");
      while($row = mysqli_fetch_array($petquery)){
          $petName = $row['petName'];
          $petAge = $row['petAge'];
          $petCategoryID = $row['petCategoryID'];
          $peso = $row['peso'];
          $raza = $row['raza'];
         
        }
 
    ?>

    <form method="post" class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
      <!-- HEADER -->
      <div>
        <h1 class="text-4xl font-bold">Actualización Información de Mascotas</h1>
        <p class="text-gray-600">
          Actualizar la Información ya almacenada.
        </p>
        <input type="hidden" name="pet_recordID" value="<?php echo $pet_recordID; ?>">
      </div>
        <div>
          <label for="petName">Nombre de Mascota</label>
          <input
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            name="petName"
            value="<?php echo $petName; ?>" 
          />
          <br><br>
           <label for="">Sexo</label>
       <select name="sexo" id="" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                   <option value="" > -- Selecione uno --</option>
                   <option value="Macho" >Macho</option>
                    <option value="Hembra" >Hembra</option>
       </select>
        <label for="">Peso (Kg): </label>
        <input type="text" name="peso" value = "<?php echo $peso; ?>"
         class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" placeholder="Digite el peso en KG">
       <br><br>
        <label for="">Raza</label>
        <input type="text" name="raza" value = "<?php echo $raza; ?>"
         class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" 
         placeholder="Digite la raza">
        <br><br>
        <label for="petAge">Edad</label>
                <input
          class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
          name="petAge"
          value="<?php echo $petAge; ?>"
        />

         <input type="hidden" name="pet_recordID" value="<?php echo $pet_recordID; ?>">
         <br><br>
         <label for="petAge">Categoria de Mascotas</label>
      <select name="petCategoryID" id="category" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                          <option value="">Selecciona una Categoria</option>

                          <!--Fetch Category from database and Put to Dropdown-->
                          <?php
                            $sql = "SELECT petcategoryID, name FROM pet_category";
                            $result = $connectdb->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo"<option value=$row[petcategoryID]>$row[name]</option>";
                            }
                          ?>
                          </select>
      
       <a href="petrec.php" name="button" class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar</a>
      <button type="submit" formaction="../crud/pet_update.php" name="button" class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Confirmar Actualizacines</button>
     
    </div>
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
			if($_SESSION['staff_sid']==session_id()){
				header("location:404.php");
			}else{
				header("location:login.php");
			}
		}
	}
?>