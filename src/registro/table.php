<?php 
 require_once '../../php/conexion.php';

 $id = $_GET['id'];
 $sqlparticipante = "SELECT id_participante, nombre_apellido, telefono, telefono_emergencia, encargado FROM participante where id_color = $id";
 $Rparticipante = $mysqli->query($sqlparticipante);

 $sqlcontar = "SELECT count(id_participante) as conteo FROM participante where id_color = $id";
 $Rcontar= $mysqli->query($sqlcontar);
 $rowcontar = $Rcontar->fetch_array(MYSQLI_ASSOC);

 $sqlcolor = "SELECT descripcion FROM color where id_color = $id";
 $Rcolor = $mysqli->query($sqlcolor);
 $rowcol = $Rcolor->fetch_array(MYSQLI_ASSOC);

 $sqlcolorgene = "SELECT id_color, descripcion FROM color";
 $Rcolorgene = $mysqli->query($sqlcolorgene);

if(isset($_POST['create_pdf'])){
	require_once('../../tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Mjo');
	$pdf->SetTitle($_POST['reporte_name']);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '<section>
        <h1 class="text-2xl mb-2">MJO - REPORTE DE PARTICIPANTES</h1>
        <div class="text-xl">Color: '.$rowcol['descripcion'].'</div>
        <div class="text-xl">Total de participantes: '.$rowcontar['conteo'].'</div>
    </section>';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>
       	
      <table  border="1" cellpadding="5">
        <thead >
          <tr style="background-color:gray; color:white;">
            <th>ID</th>
            <th>NOMBRE</th>
            <th>TELEFONO</th>
            <th>ENCARGADO</th>
            <th>TELEFONO EMERGENCIA</th>
          </tr>
        </thead>
	';
	
	
	while ($user=$Rparticipante->fetch_assoc()) { 
	$content .= '
		<tr bgcolor="">
            <td>'.$user['id_participante'].'</td>
            <td>'.$user['nombre_apellido'].'</td>
            <td>'.$user['telefono'].'</td>
            <td>'.$user['encargado'].'</td>
            <td>'.$user['telefono_emergencia'].'</td>
        </tr>
	';
	}
	
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="bg-[#482344]">
    <div class="w-3/4 text-white mt-10 rounded-lg text-sm mx-auto bg-[#AF3838] p-10">
        <div class="justify-between flex flex-row  relative mb-5">
            <div class="flex gap-5">
                <a href="estadistica.php">

                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-arrow-back-up"></i>
                    </div>

                </a>
                
                <form method="post">
                    
                    <input type="hidden" name="reporte_name">
                    
                    <label class="block btn w-20 text-white text-center rounded-full p-2" for="create_pdf">

                        <input id="create_pdf" type="submit" name="create_pdf" class="" value="" /><i
                            class="ti ti-printer"></i>

                    </label>
                    
                </form>
            </div>
            <select onchange="buscarC(this)" id="color" name="id_color"
                class="p-3 rounded-full w-80 drop-shadow-lg text-center text-black">
                <option value="0">
                    <?php echo $rowcol['descripcion']; ?>
                </option>
                <?php while($rowco = $Rcolorgene->fetch_array(MYSQLI_ASSOC)) { ?>

                <option value="<?php echo $rowco['id_color']; ?>">
                    <?php echo $rowco['descripcion']; ?>
                </option>
                <?php } ?>
            </select>
            
        </div>
        <div class="w-full mx-auto mb-8 border-gray-200 h-[45rem] rounded-lg rounded-l-lg overflow-y-auto">
            
            <div class="relative  shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                        LISTA DE PARTICIPANTES
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                            </th>

                            <th scope="col" class="px-6 py-3">
                                TELEFONO
                            </th>
                            <th scope="col" class="px-1 py-3">
                                ENCARGADO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TELEFONO DE EMERGENCIA
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $Rparticipante->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="bg-white border-b dark:border-gray-700">
                            <td class="px-6 py-4">
                                <?php echo $row['id_participante']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['nombre_apellido']; ?>
                            </td>

                            <td class="px-6 py-4">
                                <?php echo $row['telefono']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['encargado']; ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['telefono_emergencia']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
<script>
function buscarC(datos) {
    window.location.href = "table.php?id=" + datos.value;
}
</script>