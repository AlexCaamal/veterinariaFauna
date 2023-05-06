<?php
include '../includes/connectdb.php';

if($_SESSION['staff_sid']==session_id())
{
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles.css">
    <meta charset="utf-8">
    <link rel="icon" href="../images/templogo.png">
    <title>Modificar Servicio</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php
      $servicesID = $_GET['servicesID'];
      #$quey = 'SELECT * FROM services WHERE serviceID ='.$_GET['servicesID']';'

      $servicequery = mysqli_query($connectdb, "SELECT * FROM services WHERE servicesID ='$servicesID';");
      while($row = mysqli_fetch_array($servicequery)){
          $serviceName = $row['serviceName'];
          $serviceDesc = $row['serviceDesc'];
          $servicePrice = $row['servicePrice'];
         
        }
 
    ?>

    <form method="post" class="px-4 rounded mx-auto max-w-3xl w-full my-32 inputs space-y-6">
        <!-- HEADER -->
        <div>
            <h1 class="text-4xl font-bold">Actualización de Servicio</h1>
            <p class="text-gray-600">
                Actualización de la descripción del Servicio
            </p>
            <input type="hidden" name="servicesID" value="<?php echo $servicesID; ?>">
        </div>
        <div>
            <div>
                <label for="firstname">Servicio</label>
                <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="serviceName" value="<?php echo $serviceName; ?>" />
            </div>
        </div>
        <div>
            <label for="address">Descripción</label>
            <input class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                name="serviceDesc" value="<?php echo $serviceDesc; ?>" />
            <p class="text-sm text-gray-600">
                Breve descripción del servicio
            </p>
        </div>
        <div>
            <label for="budget">Precio</label>
            <div class="flex w-1/4">
                <div class="rounded-l flex text-white items-center px-4 bg-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-current" viewBox="0 0 288 512">
                        <path
                            d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                    </svg>
                </div>
                <input min="0" step="0.01" placeholder="0.00"
                    class="border border-gray-400 px-4 py-2 rounded-r w-full focus:outline-none focus:border-teal-400"
                    name="servicePrice" value="<?php echo $servicePrice; ?>" />
            </div>
        </div>
        <a href="service.php" name="button"
            class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar</a>
        <button type="submit" formaction="../crud/service_update.php" name="button"
            class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Actualizar Información</button>

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