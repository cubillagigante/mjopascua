<?php 
    require '../phpqrcode/qrlib.php';

    $nombre = $_POST['n'];
    $sexo = $_POST['s'];
    
    if ($sexo == 1 ) {
        $sexovar = 'MASCULINO';
    } else if($sexo == 2) {
        $sexovar = 'FEMENINO';
    }
    $encargado = $_POST['e'];
    $telefonoEncargado = $_POST['te'];
    $telefonoPersonal = $_POST['te'];

    $datosDeRegistro = '?n='. $nombre.'&s='.$sexo. '&e='.$encargado.'&te='. $telefonoEncargado.'&tp='.$telefonoPersonal;

    $dir = '../temp/';
    if(!file_exists($dir))
        mkdir($dir);
    $filename = $dir.$nombre.'.png';
    $tamanio = 10;
    $level = 'M';
    $framesize = 3;
    
    $contenido = $datosDeRegistro;
    QRcode::png($contenido,$filename,$level,$tamanio,$framesize);

    //echo '<img src="'.$filename.'" />';

    ?>

   
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../public/images/default/logo-ico.ico">
    <title>MJO - PASCUA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/tailwin.css">
    <link rel="stylesheet" href="../webfont/tabler-icons.css">
    <script src="../script/npm/qrcode.min.js"></script>
    <script src="../script/npm/jquery.js"></script>
    <script src="../node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <style type="text/css">
        .btn {
             background-color: rgba(0, 0, 0, 0.25);

        }

        .btn:hover {
            background-color: rgba(52, 47, 47, 0.25);
            cursor: pointer;
        }
        #content-principal {
            width: 100%;
        }
        @media (min-width: 700px) { 
            #content-principal {
                width: 37%;
            }
         }
    </style>
</head>

<body class="">
    <div id="content-principal"   class=" bg-[#AF3838]  text-white text-sm rounded-xl p-10">
    <div class=" p-1 text-center w-full mb-5" style=""><img src="../public/images/default/logo.png" class="w-20 mx-auto rounded-full" alt="logoMJO"></div>
        
            <div class="mb-5  bg-gray-900 rounded-xl p-1">
                <h1 class=" font-bold text-xl text-center text-white "> Ticket de Entrada </h1>
                
            </div>
            <div class="flex justify-between mb-5">
                <div class="">
                    <h1 class="mb-3  font-bold">NOMBRE:</h1>
                    <h1 class="mb-3  font-bold">TELEFONO:</h1>
                    <h1 class="mb-3 font-bold">SEXO:</h1>
                    <h1 class="mb-3 font-bold">ENCARGADO:</h1>
                    <h1 class="mb-3 font-bold">TEL. ENCARGADO:</h1>
                </div>
                <div class="">
                    <h1 class="mb-3 font-bold"><?php echo $nombre;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $telefonoPersonal;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $sexovar;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $encargado;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $telefonoEncargado;?></h1>
                </div>
            </div>
            <hr class="mb-5">
            <div class="mb-3 flex  justify-between relative">
                <img src="<?php echo $filename;?>" class="" width="200" alt="qr">
                <div>
                    <label for="print" >
                        <div id="print" class="btn flex justify-center w-20 rounded-full p-3 mb-5">
                            <i class="ti ti-printer "><input id="clean" name="clean" type="btn" value="" /></i>
                        </div>
                    </label>
                    <label for="submit">
                        <div class="btn rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-arrow-back"><a href="../src/asistenciaQR/formulario.php"><input type="btn" name="submit" id="submit"
                                    class="font-bold cursor-pointer" value="" /></a></i>
                        </div>
                    </label>
                </div>
            </div>
            <span style="font-size:10px;font-style: italic;">Guarda este ticket para el dia de la Pascua! 😁</span>
    </div>

    <script>
    document.getElementById('print').addEventListener('click', function() {
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    if (isMobile) {
        // Estás en un dispositivo móvil
        document.getElementById('content-principal').style.width='100%';
        document.getElementById('content-principal').style.margin='0';
        document.body.style.backgroundColor = "white";
    } else {
        document.getElementById('content-principal').style.width='37%';
        document.getElementById('content-principal').style.margin='0';
        
    }
    
    html2canvas(document.body, {
        onrendered: function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var doc = new jsPDF();
            doc.addImage(imgData, 'PNG', 10, 10);
            doc.save('TicketMjoPascua<?php echo $nombre ?>.pdf');
        }
    });
    
});
    </script>
</body>



</html>
    

