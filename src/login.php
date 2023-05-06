<?php
session_start();
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
</head>

<body class="bg-blue-200">
    <div class="drop-shadow-lg grid place-items-center h-screen  bg-blue-200">
        <form class="client_login rounded-lg px-4 bg-slate-100 m-5 p-5 w-auto md:w-1/3">
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
                <label for="username">Usuario</label>
                <input
                    class="p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
                <input
                    class=" hidden p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    type="text" id="tyepClase" name="username" value="">
                <label for="pass">Contraseña</label>

                <input
                    class="p-2 mb-3 border border-solid border-gray-300 w-full focus:outline-none text-gray-500 focus:border-blue-600"
                    type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

            </div>
            <div class="text-center  hover:text-blue-700">
                <a href="Registro.php?clase=" class="text-sm">¿No tienes una cuenta?<br />Registrate</a>
            </div>
        </form>
        <div class="wrapper">
            <p>Seguridad Captcha</p>
            <div class="captcha-area">
                <div class="captcha-img">
                    <img src="./images/captcha-bg.png" alt="Captch Background">
                    <span class="captcha"></span>
                </div>

            </div>
            <div class="input-area">
                <input type="text" placeholder="Ingresa el captcha" maxlength="6" spellcheck="false" required>
                <button type="summit" class="check-btn">Ingresar</button>
            </div>



            <div class="status-text"></div>
        </div>


        <div class="text-center  hover:text-blue-700">
            <a href="../index.php" class="text-sm"><br />Regresar al sitio Web</a>
        </div>

    </div>
    <script src="./javascript/codeCaptcha.js" />
    </script>
</body>

</html>
<?php
}
?>