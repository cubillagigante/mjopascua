<?php 
 require '../../php/conexion.php';
  
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-gray-800">
    
  <div class="col-md-12 text-white">
         <h2>QR Code</h2>
         <div id="reader"></div>
         <div id="result"></div>
        </div>

     </div>

  <script>
     
     const scanner = new Html5QrcodeScanner('reader', { 
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        },  // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success(result) {
        /*
        document.getElementById('result').innerHTML = `
        <h2>Success!</h2>
        <p><a href="res.php${result}">${result}</a></p>
        `;*/
        // Prints result as a link inside result element
        window.location.href = 'res.php'+ result;
        scanner.clear();
        // Clears scanning instance

        document.getElementById('reader').remove();
        // Removes reader element from DOM since no longer needed
    
    }

    function error(err) {
        console.error(err);
        // Prints any errors to the console
    }
            </script>
        
    </div>
</body>

</html>
