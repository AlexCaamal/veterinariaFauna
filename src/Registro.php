<?php
  $clase = $_GET['clase'];
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="images/templogo.png">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Font Awesome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>

<body class="bg-blue-200">
    <div class="drop-shadow-lg grid place-items-center h-screen  bg-blue-200">
        <form class="client_login rounded-lg px-4 bg-slate-100 m-5 p-5 w-auto md:w-1/3 " action="validarRegistro.php"
            method="post">
            <div class="text-left  hover:text-blue-600">
                <?php
                    if($clase == 'QR'){?>
                <a href="loginQR.php"
                    class="border-gray-600 px-6 p-2 rounded bg-blue-600 text-white shadow-md hover:bg-blue-800 hover:shadow-lg">Tengo
                    cuenta</a>

                <?php
                    }else{?>
                <a href="login.php"
                    class="border-gray-600 px-6 p-2 rounded bg-blue-600 text-white shadow-md hover:bg-blue-800 hover:shadow-lg">Tengo
                    cuenta</a>
                <?php
                    }

                    ?>

            </div>
            <div class="grid place-items-center">
                <span class="text-3xl text-gray-700 font-bold">
                    <img class="h-10 inline" src="images/templogo.png">
                    Veterinaria: Fauna
                </span>
            </div>

            <h2 class="mt-5 font-bold text-center text-4xl text-gray-700">
                Registro
            </h2>
            <br>
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="fname" class="font-bold">Nombres:</label>
                    <input type="text" name="fname" placeholder="Escribe tus nombres"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        required><br>
                </div>
                <div class="w-1/2">
                    <label for="lname" class="font-bold">Apellidos:</label>
                    <input type="text" name="lname" placeholder="Escribe tus apellidos"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        required><br><br>
                </div>
            </div>
            <div>
                <div>
                    <label for="user" class="font-bold w-2">Usuario:</label>
                    <input type="text" name="user" placeholder="Crea un Usuario"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        required><br>
                </div>
                <br>
                <div>
                    <label for="pass" class="font-bold">Contraseña:</label>
                    <input type="password" name="pass" placeholder="Crea una contraseña"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        required><br><br>
                    <label for="pass" class="font-bold">Verificar Contraseña:</label>
                    <input type="password" name="Veripass" placeholder="Escribir Contraseña otra vez "
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        required><br><br>
                </div>
            </div>
            <div class="flex space-x-4">

                <div class="w-1/2">
                    <label for="contactNum" class="font-bold">Número de Contacto:</label>
                    <input type="text" name="contactNum" placeholder="98xxxxxxxxx"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="email" class="font-bold">Email:</label>
                    <input type="text" name="email" placeholder="sample@sample.com"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
                </div>
                <div class="w-1/2">
                    <label for="address" class="font-bold">Dirección:</label>
                    <input type="text" name="address" placeholder="______ Colonia"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
                </div>
            </div>

            <div class="my-3 grid place-items-center">
                <!--Div for Buttons-->
                <input type="submit" value="Crear Cuenta" name="login-submit"
                    class="border-gray-600 px-6 p-2 rounded bg-blue-600 text-white shadow-md hover:bg-blue-800 hover:shadow-lg">
            </div>


            <button type="reset" name="button2" class="mt-5 border-gray-700 border-2 p-2 rounded-md">Limpiar
                Campos</button>
        </form>

    </div>

</body>

</html>