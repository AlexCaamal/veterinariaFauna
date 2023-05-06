<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="public/styles.css">
    <link rel="icon" href="src/images/templogo.png">
    <title>Servicios</title>
  </head>

  <body class="text-green-900">
    <div class="">
      <div>
        <!--HEADER-->
        <?php include 'src/includes/header.php';?>
      </div>

      <div class="w-full h-96 relative border-2 group">
        <img src="src/images/service.jpg" class="h-full w-full object-cover absolute mix-blend-overlay group-hover:blur">
        <div class="p-5">
            <h1 class="text-white flex items-center justify-center h-96 text-2xl sm:text-6xl font-body  w-full ">Servicios</h1>
        </div>
      </div>

      <div class="container mx-auto flex flex-wrap my-8 justify-center">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2" >
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Exámenes y diagnóstico</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
              Nuestra clínica ofrece exámenes físicos y diagnósticos para sus mascotas para garantizar que su salud esté en buena forma, o identificar condiciones subyacentes que enferman a sus mascotas.
            </p>
            </div>
          </div>
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2">
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Endoscopia</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
             Nuestros veterinarios pueden realizar una endoscopia que involucra un endoscopio de fibra óptica que puede ayudar a identificar objetos extraños que están presentes 
             dentro del cuerpo de la mascota y da información sobre si los órganos de la mascota están en estado normal
              </p>
            </div>
          </div>
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2">
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Laboratorio</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
              Nuestra clínica está equipada con los equipos necesarios para el diagnóstico que necesita pruebas de laboratorio tales como: 
              pruebas de parásitos y análisis de orina. 
              También hacemos análisis de sangre como sangre completa cuenta que analiza el número de células sanguíneas, Química sanguínea que analiza el sustancias químicas presentes en la sangre de la mascota.
              </p>
            </div>
          </div>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2" >
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Farmacia</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
             Nuestra clínica puede proporcionar medicamentos a sus mascotas, usted puede traernos receta y nosotros nos encargaremos del resto. Nuestra clínica puede acomodar la mayoría de los medicamentos 
             necesarios para enfermedades típicas en mascotas, como antibióticos, antiparasitarios, antifúngicos y analgésicos.
            </p>
            </div>
          </div>
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2">
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Certificados de Salud</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
               Nuestra farmacia también es capaz de dar certificados de salud para sus mascotas para diversos usos.
            </p>
            </div>
          </div>
          <div class="max-w-sm overflow-hidden shadow-xl cursor-pointer rounded border-2">
            <div class="px-6 py-4">
              <i class="fa fa-cog"></i>
              <h1 class="font-bold mb-2">Aseo y Alojamiento</h1>
              <hr>
              <p class="text-black mt-4 pb-4 text-center">
             Nuestra clínica ofrece paquetes integrales de aseo, así como paquetes de alojamiento a corto 
             y largo plazo para propietarios que necesitan dejar a sus mascotas a nuestro cuidado temporalmente.
              </p>
            </div>
          </div>
        </div>

    </div>

  <!--FOOTER-->
  <?php include 'src/includes/footer.php';?>
  
   <script src="src/javascript/script.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
  </body>
</html>
