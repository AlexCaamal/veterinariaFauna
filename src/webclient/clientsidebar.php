<?php
  date_default_timezone_set("America/Costa_Rica"); 
  $fechaHoy =  date("Y-m-d");
$horaActual = date("h:i:s");
$hora = getdate();
$hora['hours'];

if ($hora['hours'] >="18") {
   
    if(date("w")==6){
         $fechaHoy = date("Y-m-d",strtotime($fechaHoy."+ 2 days")); 
    }else{
        $fechaHoy = date("Y-m-d",strtotime($fechaHoy."+ 1 days"));
    }
} else {
    if(date("w")==6){
         $fechaHoy =  date("Y-m-d");
    }else{
         $fechaHoy = date("Y-m-d",strtotime($fechaHoy."+ 1 days"));

    }
     
}
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title></title>
</head>

<body class="bg-blue-300">
    <span class="absolute text-blue-300 text-4xl top-5 left-4 cursor-pointer" onclick="Unhide()">
        <i class="bi bi-grid-fill cursor-pointer"></i></span>
    <div class="sidebar fixed top-0 bottom-0 left-[-300px] h-full md:left-0 p-2 w-[200px] overflow-y-auto
    text-center bg-blue-500">
        <div class="text-white text-xl">
            <div class=" mt-1 flex items-center justify-center">
                <p class="text-3xl font-body">VetFauna</p>
                <span class="absolute text-blue-300 text-2xl top-3 left-2 md:left-[-300px] cursor-pointer"
                    onclick="hide()">
                    <i class="bi bi-x-lg"></i></span>
            </div>
            <hr class="my-2 text-gray-500">
        </div>
        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="bi bi-bar-chart-line-fill"></i>
            <a href="clientpanel.php" class="pl-7 w-full text-left">Panel Inicial</a>
        </div>

        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="bi bi-calendar-week"></i>
            <a href="requestapp.php?firstname=&lastname=&pet=&contact=&date=<?php 
             echo $fechaHoy; ?>" class="text-sm w-full ">
                Solicitar Citas</a>
            <!-- <a href="#" class="text-sm w-full ">Solicitar Citas</a>-->
        </div>

        <div class="flex items-center mt-5">
            <hr class="border-1 border-white w-full">
            </hr>
        </div>

        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="bi bi-person-circle"></i>
            <a href="client_ownerinfo.php" class="pl-7 w-full text-left">Información Personal</a>
        </div>

        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="fas fa-paw"></i>
            <a href="petrec.php" class="pl-2 w-full">Información de Mascotas</a>
        </div>

        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="fas fa-notes-medical"></i>
            <a href="pethistory.php" class="pl-7 w-full text-left">Historal Medico</a>
            <!--  <a href="#" class="pl-7 w-full text-left">Historal Medico</a>-->
        </div>

        <div class="flex items-center mt-5">
            <hr class="border-1 border-white w-full">
            </hr>
        </div>

        <div class="p-2 mt-5 flex items-center rounded-md px-4 duration-200
        cursor-pointer bg-blue-200 text-black hover:text-white hover:bg-blue-700">
            <i class="bi bi-box-arrow-left"></i>
            <a href="../includes/logout.php" class="pl-7 w-full text-left">Cerrar Sesión</a>
            <!--Log Out to end session-->
        </div>

    </div>
    <script type="text/javascript">
    function Unhide() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        document.querySelector('.sidebar').classList.add('border-r-8');
        document.querySelector('.sidebar').classList.add('fixed');
        document.querySelector('.sidebar').classList.add('z-10');
        document.querySelector('.sidebar').classList.add('border-r-8');
    }

    function hide() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        document.querySelector('.sidebar').classList.remove('mr-96');

    }
    </script>
</body>

</html>