
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<section class="h-screen bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-10 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-20 h-20 mr-2 rounded-full" src="../../public/images/default/logo.png" alt="logo">    
      </a>
      <div class="w-full rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
          <div class="p-5 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight mb-5 tracking-tight  md:text-2xl text-white">
                  Iniciar Sesion
              </h1>
              <form action="../../php/login.php" class="space-y-4 md:space-y-6" method="POST">
                  <div class="mb-5 ">
                      <label for="user" class="block mb-2 text-sm font-medium text-white">Usuario</label>
                      <input autocomplete="off" type="text" name="user" id="user" class="bg-gray-50 p-2 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full" placeholder="ermelinda" required="">
                  </div>
                  <div class="mb-10">
                      <label for="password" class="block mb-2 text-sm font-medium text-white">Contraseña</label>
                      <input autocomplete="off" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 p-2 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full" required="">
                  </div>
                  
                  <input type="submit" value="Comenzar" class="cursor-pointer p-5 w-full hover:bg-red-800 rounded-lg text-white font-bold bg-red-500">
                 
              </form>
          </div>
      </div>
  </div>
</section>
</html>