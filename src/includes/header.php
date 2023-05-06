<div class="bg-gray-500 text-sm text-white shadow grid place-content-end pr-5">

    <!--<button class="block text-white bg-gray-700 hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-1 text-center " type="button" data-modal-toggle="authentication-modal">
  Admin Login
</button> -->

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Admin Login</h3>
                    <form class="space-y-6" action="src/includes/adminloginValidation.php" method="post">
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                            <input type="text" name="username" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Username" required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <button type="submit" formaction="src/includes/adminloginValidation.php"
                            class="w-full text-black bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <nav class="p-5 bg-white w-full shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <span class="text-3xl text-gray-700 font-bold cursor-pointer">
                <img class="h-10 inline" src="src/images/templogo.png">
                VetFauna
            </span>
            <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                <button onclick="expandMenu()">
                    <ion-icon name="close-outline" class="mobileMenuBtn"></ion-icon>
                </button>
            </span>
        </div>
        <div>
            <div class="hidden md:block">
                <ul class="text-gray-900 flex md:items-center md:z-auto
                            bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7">
                    <li class="mx-5 mt-2 my-5 md:my-0">
                        <a href="index.php" class="
                        inline-block
                        relative
                        cursor-pointer
                        transition-all
                        duration-500
                        before:absolute
                        before:-bottom-2
                        before:left-1/2
                        before:-translate-x-1/2
                        before:w-0
                        before:h-0.5
                        before:rounded-full
                        before:opacity-0
                        before:transition-all
                        before:duration-500
                        before:bg-cyan-500
                        hover:before:w-full
                        hover:before:opacity-100">Inicio</a>
                    </li>
                    <li class="mx-5 my-5 md:my-0">
                        <a href="services.php" class="inline-block 
                        relative
                        cursor-pointer
                        transition-all
                        duration-500
                        before:absolute
                        before:-bottom-2
                        before:left-1/2
                        before:-translate-x-1/2
                        before:w-0
                        before:h-0.5
                        before:rounded-full
                        before:opacity-0
                        before:transition-all
                        before:duration-500
                        before:bg-cyan-500
                        hover:before:w-full
                        hover:before:opacity-100">Servicios</a>
                    </li>
                    <li class="mx-5 my-5 md:my-0">
                        <a href="about.php" class="inline-block
                        relative
                        cursor-pointer
                        transition-all
                        duration-500
                        before:absolute
                        before:-bottom-2
                        before:left-1/2
                        before:-translate-x-1/2
                        before:w-0
                        before:h-0.5
                        before:rounded-full
                        before:opacity-0
                        before:transition-all
                        before:duration-500
                        before:bg-cyan-500
                        hover:before:w-full
                        hover:before:opacity-100">Sobre Nosotros</a>
                    </li>
                    <li class="mx-5 my-5 md:my-0">
                        <!-- <a href="contact.php" class="inline-block -->
                        <a href="contact.php" class="inline-block
                        relative
                        cursor-pointer
                        transition-all
                        duration-500
                        before:absolute
                        before:-bottom-2
                        before:left-1/2
                        before:-translate-x-1/2
                        before:w-0
                        before:h-0.5
                        before:rounded-full
                        before:opacity-0
                        before:transition-all
                        before:duration-500
                        before:bg-cyan-500
                        hover:before:w-full
                        hover:before:opacity-100">Contactenos</a>
                    </li>
                    <a href="src/login.php">
                        <button id="appointmentBtn"
                            class="bg-slate-700 text-white px-6 py-1 mx-5 rounded hover:bg-gray-900 duration-500">
                            Ingresar
                        </button>
                    </a>
                </ul>
            </div>
        </div>
        <!--Mobile Menu-->
        <div class="block md:hidden mobile-menu">
            <ul class="text-gray-900 bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7">
                <li class="mx-5 mt-2 my-5 md:my-0">
                    <a href="index.php" class="
                    inline-block
                    relative
                    cursor-pointer
                    transition-all
                    duration-500
                    before:absolute
                    before:-bottom-2
                    before:left-1/2
                    before:-translate-x-1/2
                    before:w-0
                    before:h-0.5
                    before:rounded-full
                    before:opacity-0
                    before:transition-all
                    before:duration-500
                    before:bg-cyan-500
                    hover:before:w-full
                    hover:before:opacity-100">Inicio</a>
                </li>
                <li class="mx-5 my-5 md:my-0">
                    <a href="services.php" class="inline-block
                    relative
                    cursor-pointer
                    transition-all
                    duration-500
                    before:absolute
                    before:-bottom-2
                    before:left-1/2
                    before:-translate-x-1/2
                    before:w-0
                    before:h-0.5
                    before:rounded-full
                    before:opacity-0
                    before:transition-all
                    before:duration-500
                    before:bg-cyan-500
                    hover:before:w-full
                    hover:before:opacity-100">Servicios</a>
                </li>
                <li class="mx-5 my-5 md:my-0">
                    <a href="about.php" class="inline-block
                    relative
                    cursor-pointer
                    transition-all
                    duration-500
                    before:absolute
                    before:-bottom-2
                    before:left-1/2
                    before:-translate-x-1/2
                    before:w-0
                    before:h-0.5
                    before:rounded-full
                    before:opacity-0
                    before:transition-all
                    before:duration-500
                    before:bg-cyan-500
                    hover:before:w-full
                    hover:before:opacity-100">Sobre Nosotros</a>
                </li>
                <li class="mx-5 my-5 md:my-0">
                    <a href="contact.php" class="inline-block
                    relative
                    cursor-pointer
                    transition-all
                    duration-500
                    before:absolute
                    before:-bottom-2
                    before:left-1/2
                    before:-translate-x-1/2
                    before:w-0
                    before:h-0.5
                    before:rounded-full
                    before:opacity-0
                    before:transition-all
                    before:duration-500
                    before:bg-cyan-500
                    hover:before:w-full
                    hover:before:opacity-100">Contactenos</a>
                </li>
                <a href="src/login.php">
                    <button id="appointmentBtn"
                        class="bg-slate-700 text-white px-6 py-1 mx-5 rounded hover:bg-gray-900 duration-500">
                        Sign In
                    </button>
                </a>
            </ul>
        </div>
    </nav>
</div>