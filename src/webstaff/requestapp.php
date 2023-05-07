<?php
include '../includes/connectdb.php';


date_default_timezone_set('America/Costa_Rica');
$horaActual = date("h:i:s");
$fechaHoy =   date("Y-m-d");
$hora = getdate();
$hora['hours'];

	if($_SESSION['staff_sid']==session_id())
	{
    $user = $_SESSION['user_id'];
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
    <link rel="icon" href="../images/templogo.png">
    <title>Solicitar Cita</title>
    <style>
    .alerta {
        border: 1px solid green;
        border-radius: 4px;
        color: red;
        padding: 15px;
        background-color: orange;
        margin: 0px auto;
        text-align: center;
        width: 60%;
        font-weight: 900;
    }

    .alertaFecha {
        border: 1px solid red;
        border-radius: 4px;
        color: black;
        font-size: 15px;
        padding: 15px;
        background-color: none;
        margin: 0px auto;
        text-align: center;
        width: 60%;
        font-weight: 900;
    }
    </style>

</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300">
    <?php include 'sidebar.html' ?>

    <form class="px-6  mx-auto max-w-3xl w-full  inputs space-y-0"
        action="requestapp.php?firstName=firstname&lastName=lastname&idUser=idUser&clase=clase&contact=5&date=5">
        <div>
            <h1 class="text-4xl font-bold">Solicitar Cita</h1>
        </div>
        <div>
            <label for="DateRecorded">Nombre del Dueño</label>
            <input type="text" name="firstname"
                value="<?php if(isset($_GET['firstname'])){echo $_GET['firstname']; } ?>"
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                placeholder="Digite el Nombre">
        </div>

        <div>
            <label for="">Apellido del Dueño</label>
            <input type="text" name="lastname" value="<?php if(isset($_GET['lastname'])){echo $_GET['lastname']; }?>"
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                placeholder="Digite el Apellido">
            <input type="hidden" name="clase" value="<?php echo $_GET['clase'];?>"
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">

        </div>
        <br>
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
                }
                    if ($IDdueño!="") {
                      ?>
        <div style="display: flex; text-align:center;">
            <input type="hidden" name="idUser" value="<?php echo $IDdueño; ?>"
                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">
            <p
                style="margin:0px auto; background-color: green; width: 50%; border-radius: 15%; font-size: 17px; padding:10px;">

                <?php
                               echo "Datos Obtenidos Correctamente";
                          ?>
            </p>

        </div>
        <br>
        <div>
            <form class=" px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6" method="post"
                action="requestapp.php?firstname=&lastname=&clase=CitaMascota&pet=pet&contact=contact&date=date">

                <div class="flex space-x-4">
                    <div class="w-1/2" style="margin:0px auto;">
                        <label for="pet" class="font-bold w-1/12">Nombre de Mascota</label>
                        <select
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                            name="pet">

                            <?php
                      $sql = "SELECT pet_recordID, petName FROM pet WHERE petUserID=$IDdueño";
                      $result = $connectdb->query($sql);
                      while($row = $result->fetch_assoc()) {
                        echo"<option value=$row[pet_recordID]>$row[petName]</option>";
                      }
                  ?>
                        </select>

                    </div>

                </div>
                <div class="grid md:place-items-start place-items-center md:ml-60 py-3">
                    <button
                        class="block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base p-2 px-5 text-center"
                        type="button" data-modal-toggle="new-category">
                        Añadir una Nueva Mascota
                    </button>

                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2 " style="margin:0px auto;">
                        <label for="contact" class="font-bold">Número de Contacto</label>
                        <input type="text" name="contact" placeholder="Número de Contacto" maxlength="10" required
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                            value="<?php if(isset($_GET['contact'])){echo $_GET['contact']; } ?>">
                    </div>
                    <br>
                    <div class="w-1/2" style="margin:0px, 10px auto;">
                        <label for="date" class="font-bold w-2">Fecha</label>
                        <input id="infechaini" type="date" name="date" onChange="sinDomingos()"
                            onblur="obtenerfechafinf1()" name="date" placeholder="Fecha a programar" min="<?php date_default_timezone_set("America/Costa_Rica"); 
                            $fechaHoy =  date("Y-m-d"); echo $fechaHoy ; ?>" required
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                            value="<?php if(isset($_GET['date'])){echo $_GET['date']; } ?>">
                    </div>
                </div>
                <br>
                <div style="display: flex; margin:0px auto;">
                    <p class="alertaFecha">Verifique el Horario cada vez que seleccione
                        Fecha</p>
                </div>
                <br>
                <button type="submit" style="margin-left:45%; width: 60px; height: 60px;"
                    class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center"
                    type="button">
                    <ion-icon name="search-outline"></ion-icon>
                </button>

            </form>
            <?php include 'modal_addpet.php'?>
        </div>
        <?php
          if(isset($_GET['date'])){
            $fechacita = $_GET['date'];
            ?>

        <div class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
            <form class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6" action="appointmentSub.php"
                method="post">
                <?php if (!(isset($_GET['pet'])) || ( $hora['hours'] >= "18" && $fechacita==$fechaHoy)) {
        ?>
                <?php if (($hora['hours'] >= "18" && $fechacita==$fechaHoy )) {
        ?>
                <div style="display: flex; margin:0px auto;">
                    <p class="alerta">Servicios No Disponibles para hoy. <br> Verifique en la mañana o Seleccione otro
                        dia
                    </p>
                </div>
                <?php 
        }else{
        ?>
                <br>
                <div style="display: none; margin:0px auto;">
                    <p class="alerta">Servicios No Disponibles para hoy. <br> Verifique en la mañana o Seleccione otro
                        dia
                    </p>
                </div>
                <?php 
        }
        ?>
                <div class="hidden">
                    <div class="flex space-x-4">
                        <div class="w-1/2" style="margin:0px auto;"><label for=" time"
                                class="font-bold">Hora</label><select name="HoraCita" id="HoraCita"
                                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                                required>
                                <option value="">Seleccione la hora</option>
                                <?php $sql="SELECT  Hora, idHora FROM  horacitas  
ORDER BY idHora ASC " ;
$result=$connectdb->query($sql);
        $i=0;

        while($row=$result->fetch_assoc()) {
            $array [$i]=$row['Hora'];
            $arrayHora [$i]=$row['idHora'];
            $i++;
        }

        $sql2="SELECT distinct  time FROM  appointments  
WHERE status='Pendiente'and date='$fechacita'ORDER BY time asc " ;
$result2=$connectdb->query($sql2);

        $j=0;

        while($row2=$result2->fetch_assoc()) {
            $arrayTime [$j]=$row2['time'];
            $j++;
        }

        $count=count($arrayHora);
        $k=0;

        $l=0;

        for ($i=0; $i < $count; $i++) {

            //$arrayTime[$l] == $arrayHora[$i]
            while ($arrayTime[$l]==$arrayHora[$i]) {
                if($arrayTime[$k]==$arrayHora[$i]) {
                    $arrayAux [$k]=$i;
                    $k++;
                    $l++;
                }

                else {}
            }
        }

        if ($arrayAux[0]=="") {
            $a=0;

            for ($i=0; $i <count($arrayHora); $i++) {
                if($array[$i]==null) {}

                else {
                    $nuevoArray [$a]=$array[$i];
                    $a++;
                }
            }
        }

        else {
            for ($i=0; $i < count($arrayAux); $i++) {
                unset($array[$arrayAux[$i]]);
            }

            $a=0;

            for ($i=0; $i <count($arrayHora); $i++) {
                if($array[$i]==null) {}

                else {
                    $nuevoArray [$a]=$array[$i];
                    $a++;
                }
            }

        }

        $count2=count($nuevoArray);

        for ($i=0; $i < $count2; $i++) {
            echo"<option >$nuevoArray[$i]</option>";
        }
        ?>
                            </select></div>
                    </div>
                    <div>
                        <div style=" text-align:center;"><label for="service"
                                class="font-bold w-1/12">Servicio</label><select
                                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                                name="service">
                                <option value="">--Selecciona Servicio--</option><?php $sql="SELECT servicesID, serviceName FROM services";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[servicesID]>$row[serviceName]</option>";
        }

        ?>
                            </select></div>
                    </div><button type="reset" name="button2"
                        class="mt-5 border-gray-700 border-2 p-2 rounded-md">Limpiar
                        campos</button><button type="submit" name="button1"
                        class="mt-5 border-green-700 border-2 p-2 rounded-md">Confirmar Cita</button>
                </div><?php
    } else {
        ?><div>
                    <div class="flex space-x-4">
                        <div class="w-1/2"><label for=" time" class="font-bold">Hora</label><select name="HoraCita"
                                id="HoraCita"
                                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                                required>
                                <option value="">Seleccione la hora</option>
                                <?php $sql="SELECT  Hora, idHora FROM  horacitas  
                        ORDER BY idHora ASC " ;
                        $result=$connectdb->query($sql);
                                $i=0;

        while($row=$result->fetch_assoc()) {
            $array [$i]=$row['Hora'];
            $arrayHora [$i]=$row['idHora'];
            $i++;
        }

        $sql2="SELECT distinct  time FROM  appointments  
WHERE status='Pendiente'and date='$fechacita'ORDER BY time asc " ;
$result2=$connectdb->query($sql2);

        $j=0;

        while($row2=$result2->fetch_assoc()) {
            $arrayTime [$j]=$row2['time'];
            $j++;
        }

        $count=count($arrayHora);
        $k=0;

        $l=0;

        for ($i=0; $i < $count; $i++) {

            //$arrayTime[$l] == $arrayHora[$i]
            while ($arrayTime[$l]==$arrayHora[$i]) {
                if($arrayTime[$k]==$arrayHora[$i]) {
                    $arrayAux [$k]=$i;
                    $k++;
                    $l++;
                }

                else {}
            }
        }

        if ($arrayAux[0]=="") {
            $a=0;

            for ($i=0; $i <count($arrayHora); $i++) {
                if($array[$i]==null) {}

                else {
                    $nuevoArray [$a]=$array[$i];
                    $a++;
                }
            }
        }
        else {
            for ($i=0; $i < count($arrayAux); $i++) {
                unset($array[$arrayAux[$i]]);
            }

            $a=0;

            for ($i=0; $i <count($arrayHora); $i++) {
                if($array[$i]==null) {}

                else {
                    $nuevoArray [$a]=$array[$i];
                    $a++;
                }
            }

        }
        $count2=count($nuevoArray);

        for ($i=0; $i < $count2; $i++) {
            echo"<option >$nuevoArray[$i]</option>";
        }

        ?>
                            </select></div>
                        <div class="w-1/2"><label for="service" class="font-bold w-1/12">Servicio</label><select
                                class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                                name="service" required>
                                <option value="">--Selecciona Servicio--</option><?php $sql="SELECT servicesID, serviceName FROM services";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[servicesID]>$row[serviceName]</option>";
        }

        ?>
                            </select></div>
                    </div>
                    <a href="appointments.php?status=Pendiente" type="reset" name="button2"
                        class="mt-5 border-gray-700 border-2 p-2 rounded-md">Cancelar</a>
                    <button type="submit" name="button1" class="mt-5 border-green-700 border-2 p-2 rounded-md">Confirmar
                        Cita</button>
                </div>
                <?php
    }
    ?>
                <input type="hidden" name=" date"
                    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    value="<?php echo $_GET['date']; ?>">
                <input type="hidden" name="contact"
                    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    value="<?php echo $_GET['contact']; ?>">
                <input type="hidden" name="pet"
                    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    value="<?php echo $_GET['pet']; ?>">
            </form>
        </div>
        <?php }else{          ///////// oculta, hace la otra parte de la condicion?>
        <div class="hidden">
            <form action="">

                <div class="flex space-x-4" style="text-align:center;">
                    <div class="w-1/2" style="margin:0px auto;">
                        <label for="time" class="font-bold">Hora</label>
                        <input type="text" name="time" placeholder="Hora de Cita"
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">

                    </div>
                </div>


                <div>
                    <div style="text-align:center;">
                        <label for="service" class="font-bold w-1/12">Servicio</label>
                        <select
                            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                            name="service">
                            <option value="">--Selecciona Servicio--</option>
                            <?php
                        $sql = "SELECT servicesID, serviceName FROM services";
                        $result = $connectdb->query($sql);
                        while($row = $result->fetch_assoc()) {
                          echo"<option value=$row[servicesID]>$row[serviceName]</option>";
                        }
                    ?>
                        </select>
                    </div>
                </div>

                <button type="reset" name="button2" class="mt-5 border-gray-700 border-2 p-2 rounded-md">Limpiar
                    campos</button>
                <button formaction="appointmentSub.php" class="mt-5 border-green-700 border-2 p-2 rounded-md">Confirmar
                    Cita</button>
            </form>
        </div>

        <?php
        }
        }else if ($IDdueño == ""){
                      ?>
        <br>
        <div class="alerta" style="display: flex; text-align:center;">
            <p style="margin:0px auto;">
                <?php
                               echo "No hay coincidencias. <br> Verique los datos del Dueño";
                          ?>
            </p>

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

        </div> <?php
                         
              }
              
            ?>
    </form>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="..\javascript\Calendar.js"></script>
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