<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="public/styles.css">
    <link rel="icon" href="src/images/templogo.png">
    <title>Sobre Nosotros</title>
</head>

<body>

    <div>
        <!--HEADER-->
        <?php include 'src/includes/header.php';?>
    </div>

    <div class="w-full h-96 relative border-2 group">
        <img src="src/images/about.jpg"
            class="h-full w-full object-cover absolute mix-blend-overlay bg-blue-400 group-hover:blur">
        <div class="p-5">
            <h1 class="text-white flex items-center justify-center h-96 text-2xl sm:text-6xl font-body  w-full ">Sobre
                Nosotros</h1>
        </div>
    </div>
    <div class="w-full h-full">
        <h1 class="font-body pt-5 text-4xl flex items-center justify-center text-gray-800">VetFauna</h1>
        <div class="w-full h-full flex items-center justify-center leading-10 text-justify">
            <p class="p-5 w-[1000px] text-center">
                VetFauna es una clínica veterinaria que tiene como objetivo dar Los mejores servicios para mascotas en
                todas partes con nuestro amplio Gama de servicios que incluyen aseo y evaluación de la salud de su
                mascota a través de
                <strong>Exámenes y Diagnóstico, Endoscopia, Laboratorio,
                </strong> y <strong>Servicios de farmacia</strong>.
                Además, nuestra clínica es atendida por
                Veterinarios profesionales con gran experiencia para dar solo el mejor trato a tus mascotas. Con los
                protocolos de pandemia vigentes, los horarios de nuestra clínica
                citas en consecuencia. También observamos los procedimientos adecuados.
                al manejar las transacciones de manera cara a cara. Esperamos eso
                cumplirá con estos procedimientos al reclamar nuestros servicios.
                ¡Nos encanta y estamos deseando trabajar contigo!. <br /> Para más consultas
                puede com unicarse con nosotros con los siguientes datos de contacto: <br /> Movil: <strong>+52 981 169
                    6268 </strong>|
                Teléfono: 982 139 2460 |
                <strong>vetfauna@gmail.com</strong>
            </p>
        </div>
        <div class="">
            <div class="w-full h-full flex items-center justify-center leading-10 text-justify">
                <p class="font-body pt-5 text-4xl flex items-center justify-center text-black">Veterinario General</p>
            </div>
            <div class="w-full h-full flex items-center justify-center leading-10 text-justify">
                <img src="src/images/Doc1.jpg" class="pt-20 w-96 h-96 box-border">
            </div>
            <div class="w-full h-full flex items-center justify-center leading-10 text-justify">
                <p class="font-mono text2">Dr. Marcos Alonzo Chan Noh</p>
            </div>

            <div class=" hidden w-full h-full flex items-center justify-center leading-10 text-justify">
                <img src="src/images/dr2.jpg" class="pt-20 w-96 h-96 box-border ">
            </div>

            <div class=" hidden w-full h-full pb-20 flex items-center justify-center leading-10 text-justify">
                <p class="font-mono text2">Dr. Doge</p>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <?php include 'src/includes/footer.php';?>

    <!--JAVASCRIPT FILES-->
    <script src="src/javascript/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>

</html>