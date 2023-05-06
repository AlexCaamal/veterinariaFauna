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
    <title>Modificar Información Mascota</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">
    
    <?php
      $pet_recordID = $_GET['pet_recordID'];
      $nombre = $_GET['firstname'];
      $apellido = $_GET['lastname'];
      #$quey = 'SELECT * FROM services WHERE serviceID ='.$_GET['servicesID']';'

      $petquery = mysqli_query($connectdb, "SELECT * FROM pet WHERE pet_recordID ='$pet_recordID';");
      while($row = mysqli_fetch_array($petquery)){
          $petName = $row['petName'];
          $petAge = $row['petAge'];
          $petCategoryID = $row['petCategoryID'];
          $petUserID = $row['petUserID'];
          $peso = $row['peso'];
          $raza =$row['raza'];
          $sexo = $row['sexo'];
         
        }
 
    ?>
     
    <form action="petlist_editpage.php?pet_recordID=pet_recordID&firstname=firstname&lastname=lastname" class="px-6  mx-auto max-w-3xl w-full  inputs space-y-0">
              <div>
                <h1 class="text-4xl font-bold">Actualizar Información de Mascota</h1>
        <p class="text-gray-600">
          Realizar la actualización de información de las Mascotas de los clientes 
        </p>
        <br>
          <label for="DateRecorded">Nombre del Dueño</label>
          <input readonly="readonly" type="text" name="firstname" value="<?php echo $nombre; ?>" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" placeholder="Digite el Nombre">
        </div>
        
        <div>
          <label for="">Apellido del Dueño</label>
           <input readonly="readonly" type="text" name="lastname" value="<?php echo $apellido; ?>" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" placeholder="Digite el Apellido">
        
          </div>
           <input  type="hidden" name="pet_recordID" value="<?php echo $pet_recordID; ?>">
          <!--<button type="submit" style="margin-left:45%; width: 60px; height: 60px;"class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center" type="button">
            <ion-icon name="search-outline"></ion-icon>
          </button>-->
           
            </form>

    <form method="post" class="px-6  mx-auto max-w-3xl w-full  inputs space-y-0">
      <!-- HEADER -->
      <div>
        <div>
          <label for="petName">Nombre de Mascota</label>
          <input
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            name="petName"
            value="<?php echo $petName; ?>" 
          />
           <label for="">Sexo</label>
       <select name="sexo" id="" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                   <option value="" > -- Selecione uno --</option>
                   <option value="Macho" >Macho</option>
                    <option value="Hembra" >Hembra</option>
       </select>
        <label for="">Peso (Kg): </label>
        <input type="text" name="peso" value = "<?php echo $peso; ?>"
         class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" placeholder="Digite el peso en KG">
       
        <label for="">Raza</label>
        <input type="text" name="raza" value = "<?php echo $raza; ?>"
         class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" 
         placeholder="Digite la raza">
        
        </div>
      </div>
      <div>
        <label for="petAge">Edad</label>
                <input
          class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
          name="petAge"
          value="<?php echo $petAge; ?>"
        />

      </div>
      <div>
         <input type="hidden" name="pet_recordID" value="<?php echo $pet_recordID; ?>">
         <br>
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
      </div>
      <div>
      </div>
      <a href="petLists.php" name="button" class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar</a>
      <button type="submit" formaction="../crud/petlist_update.php" name="button" class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Actualizar Información</button>
      
    </form>
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