<?php 
 require '../../php/conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-[#482344]">
    <div class="flex mt-10 p-10 justify-center gap-5">
        <div class="w-3/4 text-white rounded-lg text-sm  bg-[#EFE4AB] p-10">
            <nav class="flex flex-row mb-10">
                <div class=" flex gap-5 flex-row  relative mb-5">

                    <a href="../registro/participantes.php?color=1">

                        <div class="btn rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-arrow-back-up"></i>
                        </div>

                    </a>


                </div>
                <div class="mx-auto flex items-center">
                    <h1 class="text-2xl font-bold text-[#ad1f53ee] ">Seleccione un Juego: </h1>
                </div>

            </nav>
            <div class="flex gap-10 flex-row justify-center mb-16">
                <a href="index.php">
                    <div class="px-24 py-14 hover:bg-[#ad1f53ee] shadow-xl  bg-slate-500 rounded-lg text-center">
                        <i class="ti ti-sunset-2"></i>

                        <h1 class="mt-7 text-3xl font-bold">LA CREACION</h1>
                    </div>
                </a>
                <a href="memorias.php?id=1">
                    <div class="px-24 py-14 shadow-xl hover:bg-[#a1ad1fee] bg-slate-500 rounded-lg text-center">
                        <i class="ti ti-puzzle"></i>
                        <h1 class="mt-7 text-3xl font-bold">MEMORIAS</h1>
                    </div>
                </a>
            </div>

        </div>
    </div>
</body>

</html>
