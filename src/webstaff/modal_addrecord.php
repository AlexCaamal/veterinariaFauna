<?php
  include '../includes/connectdb.php';
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles.css">
    <meta charset="utf-8">
    <link rel="icon" href="../images/templogo.png">

    <title>Generar Registros</title>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">

    <?php include 'sidebar.html' ?>
    <header>
        <div>
            <div class="grid place-items-center pt-18">
                <h1 class="font-extrabold text-3xl text-center  text-blue-900">GENERAR REGISTRO</h1>
                <p class="text-gray-600">
                    Registrar el Informe del Servicio
                </p>
            </div>
            <form action="modal_addrecord.php?firstName=firstname&lastName=lastname&idUser=idUser&clase=clase"
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
                    <input type="hidden" name="clase" value="<?php echo $_GET['clase'] ;?>"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        placeholder="Digite el Apellido">
                </div>
                <button type="submit" style="margin-left:45%; width: 60px; height: 60px;"
                    class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center"
                    type="button">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
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
                        <label for="">Mascota</label>
                        <select name="petID"
                            class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                            <!--Fetch Category from database and Put to Dropdown-->
                            <?php
                    $sql = "SELECT pet_recordID, petName FROM pet WHERE petUserID = '$IDdueño'";
                    $result = $connectdb->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo"<option value=$row[pet_recordID]>$row[petName]</option>";
                    }
                ?>
                        </select>
                        <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
                            <button
                                class=" block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center "
                                type="button" data-modal-toggle="new-category">
                                Añadir una Nueva Mascota
                            </button>
                        </div>
                        <?php include 'modal_addpet.php'?>

                        <label for="">Peso (Kg): </label>
                        <input type="text" name="peso"
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                            placeholder="Digite el peso en KG">

                    </div>
                    <div>
                        <label for="">Servicio</label>
                        <select name="servicio"
                            class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="" select>--Seleccione Servicio--</option>
                            <!--Fetch Category from database and Put to Dropdown-->
                            <?php
                    $sql = "SELECT servicesID, serviceName FROM services";
                    $result = $connectdb->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo"<option value=$row[servicesID]>$row[serviceName]</option>";
                    }
                ?>
                        </select>
                    </div>
                    <div>
                        <label for="">PreInscripción</label>
                        <textarea name="preinscripcion" style="height:120px"
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"></textarea>
                    </div>
                    <div>
                        <label for="">Veterinario</label>
                        <select name="veterinario"
                            class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="" select>--Selecciona--</option> -->
                            <?php
                    $sql = "SELECT userID, user_firstname, user_lastname FROM users  where user_level ='1'";
                    $result = $connectdb->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo"<option value=$row[userID]>Dr. $row[user_firstname] $row[user_lastname]<option>";
                    }
                ?>
                        </select>
                    </div>
                    <a href="records.php" name="button"
                        class="mt-5 border-red-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Cancelar Registro</a>
                    <button type="submit" name="button"
                        formaction="../crud/record_add.php?iduser=<?php echo $IDdueño;?>"
                        class="mt-5 border-green-900 bg-blue-300 font-bold border-2 p-2 rounded-md">Registrar</button>

                </div>
            </form>
        </div>
    </header>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>