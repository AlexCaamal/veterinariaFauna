<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="public/styles.css">
    <link rel="icon" href="src/images/templogo.png">
    <title>VetFauna</title>
  </head>
  <body class="text-green-900">
    <div class="">
      <div>
      <!--HEADER-->
      <?php include 'src/includes/header.php' ?>
      </div>
      
      <div class="mt-8 grid lg:grid-cols-3 gap-3 mb-8">

      <div class="w-full h-96 relative border-2 group">
        <img src="src/images/law.png" class="h-full w-full object-cover absolute mix-blend-overlay bg-blue-400 group-hover:blur">
        <div class="p-5">
            <h1 class="text-gray-200 text-2xl sm:text-6xl font-body">Veterinaria Fauna</h1>
            <h2 class="text-white text-sm sm:text-2xl font-light mt-5">Politicas de Citas</h2>
            <p class="flex  items-baseline text-sm text-gray-300 bg-gray-500 mt-10 md:mt-14 sm:mt-0 md:text-xl justify-end h-full w-full sm:text-gray-200 invisible group-hover:visible">
              Se permitirán citas para el mismo dia en horarios de franjas libres. Los visitantes sin cita también será 
              atendidos, sin embargo, se priorizará a aquellos que programen citas. <br>
            Asimismo, las citas no se cancelarán sin previo aviso para evitar incovenientes.
            </p>
        </div>
      </div>

      <div class="w-full h-96 relative border-2 group">
        <img src="src/images/img4.jpeg" class="w-full h-full object-contain absolute mix-blend-overlay bg-blue-300 group-hover:blur">
        <div class="p-5">
            <h1 class="text-black text-2xl sm:text-6xl font-body">Veterinaria Fauna</h1>
            <h2 class="text-black text-sm sm:text-3xl font-light mt-5"> Cuidar suavemente a tus mascotas</h2>
            <div class="">

            </div>
            <p class="flex items-baseline mt-10 text-sm text-gray-1000 bg-gray-400 md:mt-14 sm:mt-0 md:text-lg justify-end h-full w-full sm:text-black invisible group-hover:visible">
            Nos comprometemos a tratar a sus mascotas con cuidado y garantizar un trato adecuado independientemente
            de la raza o el tipo de animalque tengamos bajo nuestro cuidado. Solo debemos brindarle los mejores servicios.
          </p>
        </div>
      </div>

      <div class="w-full h-96 relative border-2 group">
        <img src="src/images/pay.jpg" class="h-full w-full object-cover absolute mix-blend-overlay bg-blue-400 group-hover:blur">
        <div class="p-5">
            <h1 class="text-black text-2xl sm:text-6xl font-body">Veterinaria Fauna</h1>
            <h2 class="text-white text-sm sm:text-2xl font-light mt-5"> Politica de pago</h2>

            <p class="flex  items-baseline  text-sm text-white bg-gray-500 mt-10 md:mt-14 sm:mt-0 md:text-xl justify-end h-full w-full sm:text-white invisible group-hover:visible">
              El pago se entregará en persona, antes o después de que se hayan realizado los servicios. <br>
              La clínica acepta pagos en efectivo o con tarjeta de crédito para comodidad del cliente.    
          </p>
        </div>
      </div>

      </div>

    <!--FOOTER-->
     <?php include 'src/includes/footer.php';?>
    </div>

    <!--JAVASCRIPT FILES-->
    <script src="src/javascript/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

  </body>
</html>
