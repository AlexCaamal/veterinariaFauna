<?php
include 'includes/connectdb.php';

if(isset($_SESSION['admin_sid']) || isset($_SESSION['staff_sid']) || isset($_SESSION['client_sid']))
{
    #if the session is stablished
    #any attemp of going here will be redirected in index.php
	#header("location:../index.php");
    if(isset($_SESSION['admin_sid'])){
        header("location:webadmin/adminpanel.php");
    }elseif(isset($_SESSION['staff_sid'])){
        header("location:webstaff/dashboard.php");
    }elseif(isset($_SESSION['client_sid'])){
        header("location:webclient/clientpanel.php");
    }else{
        header("location:../index.php");
    }
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="images/templogo.png">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../public/styleCaptcha.css">
    <!-- Font Awesome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

    <style>
    .alerta {
        border: 1px solid green;
        border-radius: 4px;
        color: white;
        padding: 15px;
        background-color: orange;
        margin: 0px auto;
        text-align: center;
        width: 60%;
    }

    .notificacion {
        border: 1px solid green;
        border-radius: 4px;
        color: white;
        padding: 15px;
        background-color: green;
        margin: 0px auto;
        text-align: center;
        width: 60%;
    }
    </style>
</head>

<body class="bg-blue-200">
    <div class="drop-shadow-lg grid place-items-center h-screen  bg-blue-200">
        <form action="loginQR.php?firstName=firstname&lastName=lastname&idUser=idUser&clase=clase"
            class="client_login rounded-lg px-4 bg-slate-100 m-5 p-5 w-auto md:w-1/3">
            <div class="grid place-items-center">
                <span class="text-3xl text-gray-700 font-bold">
                    <img class="h-10 inline" src="images/templogo.png">
                    Veterinaria: Fauna
                </span>
            </div>

            <h2 class="mt-5 font-bold text-center text-4xl text-gray-700">
                Iniciar Sesión
            </h2>


            <div class="px-8">
                <label for="username">Nombre Completo </label>
                <input
                    class="p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    type="text" id="firstname" value="<?php if(isset($_GET['firstname'])){echo $_GET['firstname']; } ?>"
                    name="firstname" placeholder="Ingrese el nombre completo del dueño" required>
                <input
                    class="hidden p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    type="text" id="typeClase" name="typeClase" value="QR">
                <label for="pass">Apellidos</label>
                <input
                    class="p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    value="<?php if(isset($_GET['lastname'])){echo $_GET['lastname']; } ?>" type="text" id="lastname"
                    name="lastname" placeholder="Ingresa tus apellidos" required>

            </div>
            <button type="submit" style="margin-left:45%; width: 60px; height: 60px;"
                class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center"
                type="button">
                <ion-icon name="search-outline"></ion-icon>
            </button>


            <?php
              if((isset($_GET['firstname'])) || (isset($_GET['lastname']))){
                $Pnombre = $_GET['firstname'];
                $SDnom = $_GET['lastname'];
                $sqlDueño = "SELECT userID FROM users WHERE user_firstname = '$Pnombre' AND user_lastname = '$SDnom'";
                 $result2 = $connectdb->query($sqlDueño);
                $IDdueño = "";
                while($row = $result2->fetch_assoc()) {
                        $IDdueño = $row ['userID'];
                }
                    if ($IDdueño != "") {
                      ?>
            <br>
            <div style="display: flex; text-align:center;">
                <a style="display:flex; margin:0px auto;"
                    href="includes/validationQR.php?firstname=<?php echo ($_GET['firstname']) ;?>&lastname=<?php echo ($_GET['lastname']) ;?>"
                    class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg
                    text-base p-2 px-5 text-center " type=" button">
                    Ingresar
                </a>
            </div>
            <br>
            <div style="display: flex; text-align:center;">
                <p class="notificacion" style="margin:0px auto;">
                    <input type="hidden" name="idUser" value="<?php echo $IDdueño; ?>"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">

                    <?php
                               echo "Datos Obtenidos Correctamente";
                          ?>
                </p>
            </div>
            <?php
                    }else {
                      ?>
            <br>
            <div style="display: flex; text-align:center;">
                <p class="alerta" style="margin:0px auto;">
                    <?php
                               echo "No hay coincidencias.";
                          ?>
                </p>
            </div>
            <br> <br>
            <div class="text-center  hover:text-blue-700">
                <a href="Registro.php?clase=QR" class="text-sm">¿No tienes una cuenta?<br />Registrate</a>
            </div>
            <?php
              }
            
            }else{?>
            <div style="display: none; text-align:center;">
                <p style="margin:0px auto;">
                    <?php
                               echo "No hay coincidencias.";
                          ?>
                </p>

            </div>
            <?php
       
              }
              
            ?>

        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>

</html>
<?php
}
?>