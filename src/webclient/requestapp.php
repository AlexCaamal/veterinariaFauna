<?php
include '../includes/connectdb.php';

$fechacita = $_GET['date'];
$mascota = $_GET['pet'];
$contact = $_GET['contact'];
date_default_timezone_set('America/Costa_Rica');
$hora = getdate();
$hora['hours'];

	if($_SESSION['client_sid']==session_id())
	{
    $user = $_SESSION['user_id'];
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    </style>
</head>

<body class="w-full h-full bg-blue-200 md:bg-blue-300"><?php include 'clientsidebar.php'?><div>
        <form id="elForm" action="requestapp.php?firstname=&lastname=&pet=pet&contact=contact&date=date" method="get"
            class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
            <div>
                <h1 class="text-4xl font-bold">Solicitar Cita</h1>
            </div>
            <div class="flex space-x-4">
                <div class="w-1/2" style="margin:0px auto;">
                    <div><label for="pet" class="font-bold w-1/12">Nombre de Mascota</label><a
                            href="modal_addPets.php?firstname=&lastname=&clase=citaPet"
                            class="block text-black hover:text-white bg-white hover:bg-gray-700 font-medium rounded-lg text-base py-2 px-0 text-center"
                            type="button">Añadir una Nueva Mascota </a><br></div><?php if ($mascota=="") {

        ?><select class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        name="pet" required>
                        <option value="">--Seleciona Mascota--</option><?php $sql="SELECT pet_recordID, petName FROM pet WHERE petUserID=$user";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[pet_recordID]>$row[petName]</option>";
        }
        ?>
                    </select><?php
    }

    else {
        ?><select class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        name="pet">
                        <option value="<?php echo $mascota; ?>"><?php $sql="SELECT pet_recordID, petName FROM pet WHERE pet_recordID=$mascota";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo "$row[petName]";
        }

        ?></option><?php $sql="SELECT pet_recordID, petName FROM pet WHERE petUserID=$user";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[pet_recordID]>$row[petName]</option>";
        }

        ?>
                    </select><?php
    }

    ?>
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="w-1/2 " style="margin:0px auto;"><label for="contact" class="font-bold">Número de
                        Contacto</label><input type="text" required name="contact" placeholder="Número de Contacto"
                        maxlength="10"
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        value="<?php  echo $contact;?>"></div>
            </div>
            <div class="w-1/2" style="margin:0px auto;"><label for="date" class="font-bold w-2">Fecha</label><input
                    id="infechaini" type="date" name="date" onChange="sinDomingos()" onblur="obtenerfechafinf1()"
                    required="required" placeholder=" Fecha a programar" min="<?php date_default_timezone_set("America/Costa_Rica"); 
$fechaHoy=date("Y-m-d");
    echo $fechaHoy;
    ?>" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:order-teal-400" value="<?php echo $fechacita;
    ?>">
                <input id="elSubmit" type="submit" style="display:none;" />
            </div><span style="margin:0px auto; margin-left:26%;">Verifique el Horario cada vez que seleccione Fecha
            </span>
            <button type="submit" style="margin-left:45%; width: 60px; height: 60px;"
                class="block text-black hover:text-white bg-slate-400 hover:bg-gray-700 font-medium text-base p-1 w-10  text-center"
                type="button">
                <ion-icon name="search-outline"></ion-icon>
            </button>
    </div>
    </form>
    <form class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6" action="appointmentSub.php" method="post">

        <?php 
        date_default_timezone_set("America/Costa_Rica");
        $fechaHoy =   date("Y-m-d");
        if ($mascota == "" || ( $hora['hours'] >= "18"  && $fechacita==$fechaHoy)) {
        ?>
        <?php if (( $hora['hours']  >= "18" && $fechacita==$fechaHoy)) {
        ?>
        <br>
        <div style="display: flex; margin:0px auto;">
            <p class="alerta">Servicios No Disponibles para hoy.<br> Verifique en la mañana o Seleccione otro dia</p>
        </div>
        <?php 
        }else{
        ?>
        <br>
        <div style="display: none; margin:0px auto;">
            <p class="alerta">Servicios No Disponibles para hoy. <br> Verifique en la mañana o Seleccione otro dia</p>
        </div>
        <?php 
        }
        ?>
        <div class="hidden">
            <div class="flex space-x-4">
                <div class="w-1/2" style="margin:0px auto;"><label for=" time" class="font-bold">Hora</label><select
                        name="HoraCita" id="HoraCita"
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
                <div style=" text-align:center;"><label for="service" class="font-bold w-1/12">Servicio</label><select
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        name="service">
                        <option value="">--Selecciona Servicio--</option><?php $sql="SELECT servicesID, serviceName FROM services";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[servicesID]>$row[serviceName]</option>";
        }

        ?>
                    </select></div>
            </div><button type="reset" name="button2" class="mt-5 border-gray-700 border-2 p-2 rounded-md">Limpiar
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
                <div class=" w-1/2"><label for="service" class="font-bold w-1/12">Servicio</label><select
                        class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                        name="service" required>
                        <option value="">--Selecciona Servicio--</option><?php $sql="SELECT servicesID, serviceName FROM services";
        $result=$connectdb->query($sql);

        while($row=$result->fetch_assoc()) {
            echo"<option value=$row[servicesID]>$row[serviceName]</option>";
        }

        ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="button1" class="mt-5 border-green-700 border-2 p-2 rounded-md">Confirmar
                Cita</button>
        </div>
        <?php
    }
    ?>
        <input type="hidden" name="date"
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            value="<?php echo $fechacita; ?>"><input type="hidden" name="contact"
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            value="<?php echo $contact; ?>"><input type="hidden" name="pet"
            class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
            value="<?php echo $mascota; ?>"></div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="..\javascript\Calendar.js"></script>
</body>

</html><?php
    }

    else {
        if($_SESSION['admin_sid']==session_id()) {
            header("location:404.php");
        }

        else {
            if($_SESSION['staff_sid']==session_id()) {
                header("location:404.php");
            }

            else {
                header("location:login.php");
            }
        }
    }

    ?>