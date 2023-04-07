<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color";
  $RColor = $mysqli->query($sqlColor);
  $arra = [];
  $arraM = [];
  $co = 0;

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
    <div class="w-full text-white text-sm mx-auto bg-[#AF3838] p-10">
        <div class="mb-2 flex gap-5 flex-row  relative">
                   
            <a href="participantes.php?color=1">
                
                <div class="btn rounded-full w-20 flex justify-center p-3">
                    <i class="ti ti-arrow-back-up"></i>
                </div>
                
            </a>
            <a href="table.php?id=1">
                
                <div class="btn rounded-full w-20 flex justify-center p-3">
                    <i class="ti ti-file-spreadsheet"></i>
                </div>
                
            </a>
        </div>
        <div class="grid mb-8 border-gray-200 rounded-lg rounded-l-lg  md:mb-12 md:grid-cols-2">
            <?php while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { 
                
                $id = $row['id_color'];   
                $sqlmasculino = "SELECT count(*) as 'masculino' FROM participante where id_sexo = 1 and id_color = $id";
                $Rm = $mysqli->query($sqlmasculino);
                $rowRm = $Rm->fetch_array(MYSQLI_ASSOC);
                
                $sqlfemenino = "SELECT count(*) as 'femenino' FROM participante where id_sexo = 2 and id_color = $id";
                $Rf = $mysqli->query($sqlfemenino);
                $rowRf = $Rf->fetch_array(MYSQLI_ASSOC);
            ?>
            
            <figure class="flex flex-col items-center justify-center p-8 text-center ">
                <div class="w-full bg-[#482344] text-white font-bold p-2 rounded-lg">
                    <h1 class=""><?php echo $row['descripcion'];?></h1>
                </div>
                <blockquote class="mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        
                        <div class="overflow-hidden rounded-lg ">
                            
                            <canvas class="ojo text-white p-10" id="chartPie<?php echo $co ?>"></canvas>
                            <div class="inline-flex rounded-md shadow-sm mb-5" role="group">
                                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-[#02BEB9] border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                                    <i class="ti ti-man" ></i>
                                    <?php echo $rowRm['masculino']; $arra[$co] = $rowRm['masculino']; $arraM[$co] = $rowRf['femenino'];; ?>
                                </button>
                            
                                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#482344] border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                                    <i class="ti ti-woman" ></i>
                                    <?php echo $rowRf['femenino']; ?>
                                </button>
                            </div>
                        </div>  
                </blockquote>
                
            </figure>
            <?php $co++; } ?> 
        </div>

    </div>
</body>
</html>
<script src="../../script/npm/chart.js"></script>
<script>
  
  <?php for ( $i = 0; $i < $co; $i++) {?>
    
    var dataPie = {
        labels: ["", ""],
        datasets: [
        {
            label: "cantidad de personas",
            data: [ <?php echo $arra[$i];  ?>, <?php echo $arraM[$i];  ?>],
            backgroundColor: [
            "rgb(12, 176, 166)",
            "rgb(72, 35, 68)",
            ],
            hoverOffset: 4,
        },
        ],
    };
    var configPie = {
        type: "pie",
        data: dataPie,
        options: {},
    };
    var nombre;
    nombre = "chartPie<?php echo $i;  ?>";

    var chartBar = new Chart(
        document.getElementById(nombre),
        configPie
        );
    <?php }?>


  
  

 
  
</script>

