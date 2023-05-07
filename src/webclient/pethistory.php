<?php
include '../includes/connectdb.php';
	if($_SESSION['client_sid']==session_id())
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

    <title>Historial Clinico</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'clientsidebar.php' ?>

    <div class="grid place-items-center pt-5">
        <h1 class="font-extrabold text-3xl text-center text-blue-900">Historial Clínico</h1>
    </div>

    <table class="m-auto md:mt-10 md:ml-56 md:mr-4 w-9/12 text-left border-collapse lg:ml-60 shadow-lg">
        <thead class=" bg-gray-100 border-b-2 border-gray-200 text-center p-2">
            <tr class="">
                <th class="p-2">Mascota</th>
                <th class="p-2">Servicio</th>
                <th class="p-2">Prescripción</th>
                <th class="p-2">Veterinario</th>
                <th class="p-2">Fecha</th>
            </tr>
        </thead>
        <tbody id="tableRecords" class="text-center">
        </tbody>
    </table>

    <script type="text/javascript" src="../javascript/jquery.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        refreshTableOrder();
    });

    function refreshTableOrder() {
        $("#tableRecords").load("listarRecords.php");
    }

    //refresh order current list every 3 secs
    setInterval(function() {
        refreshTableOrder();
    }, 1500);
    </script>

</body>

</html>
<?php
    }else{
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