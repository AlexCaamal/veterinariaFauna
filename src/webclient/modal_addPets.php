<?php
  include '../includes/connectdb.php';
  $class = $_GET['clase'];
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
    <meta charset="utf-8">
    <link rel="icon" href="../images/templogo.png">

    <title>Añadir a una Mascota</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'clientsidebar.php' ?>
    <header>
        <div>
            <div class="grid place-items-center pt-18">
                <h1 class="font-extrabold text-3xl text-center  text-blue-900">INGRESAR A UNA NUEVA MASCOTA</h1>
                <p class="text-gray-600">
                    Registrar una nueva Mascota
                </p>
            </div>
            <form action="modal_addPets.php?firstName=firstname&lastName=lastname&idUser=idUser&clase=clase"
                class="px-6  mx-auto max-w-3xl w-full  inputs space-y-0">
                <div>
                    <label for="DateRecorded">Nombre del Dueño</label>
                    <input type="text" name="firstname"
                        value="<?php if(isset($_GET['firstname'])){echo $_GET['firstname']; } ?>"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        placeholder="Digite el Nombre">
                </div>

                <div>
                    <label for="">Apellido del Dueño</label>
                    <input type="text" name="lastname"
                        value="<?php if(isset($_GET['lastname'])){echo $_GET['lastname']; } ?>"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        placeholder="Digite el Apellido">
                    <br>
                    <input type="hidden" name="clase" value="<?php echo $class; ?>"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">
                </div>
                <button type="submit" style="margin-left:45%; width: 60px; height: 60px;"
                    class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center"
                    type="button">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <br>
                <?php
              if((isset($_GET['firstname'])) && (isset($_GET['lastname']))){
                $Pnombre = $_GET['firstname'];
                $SDnom = $_GET['lastname'];
                $sqlDueño = "SELECT userID FROM users WHERE user_firstname = '$Pnombre' AND user_lastname = '$SDnom'";
                 $result2 = $connectdb->query($sqlDueño);
                $IDdueño = "";
                while($row = $result2->fetch_assoc()) {
                        $IDdueño = $row ['userID'];
                
                    if ($connectdb->query($sqlDueño)) {
                      ?>
                <div style="display: flex; text-align:center;">
                    <p style="margin:0px auto;">
                        <input type="hidden" name="idUser" value="<?php echo $IDdueño; ?>"
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">

                        <?php
                               echo "Datos Obtenidos Correctamente";
                          ?>
                    </p>
                </div>
                <div style="display: flex; text-align:center;">
                    <button style="display:flex; margin:0px auto;"
                        class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center "
                        type="button" data-modal-toggle="new-category">
                        Añadir una Nueva Mascota
                    </button>
                </div>
                <?php
                    }else if (!$connectdb->query($sqlDueño)){
                      ?>

                <div style="display: flex; text-align:center;">
                    <p style="margin:0px auto;">
                        <?php
                               echo "No hay coincidencias.";
                          ?>
                    </p>

                </div>
                <div style="display: flex; text-align:center;">
                    <button style="display:none; margin:0px auto;"
                        class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center "
                        type="button" data-modal-toggle="new-category">
                        Añadir una Nueva Mascota
                    </button>
                </div>
                <?php
              }
            }
            }else{?>
                <div style="display: flex; text-align:center;">
                    <p style="margin:0px auto;">
                        <?php
                               echo "No hay coincidencias.";
                          ?>
                    </p>

                </div> <?php
                         
              }
              
            ?>
            </form>

            <br>
            <form method="post" action="index.php" class="px-6  mx-auto max-w-3xl w-full  inputs space-y-0">
                <div>
                    <div>
                        <div class="grid md:place-items-start place-items-center md:ml-60 py-3">

                        </div>
                        <?php include 'modal_ValidarUser.php'?>

            </form>
        </div>
    </header>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>