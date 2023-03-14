


<div id="container-buttons" class="mx-auto rounded-full w-[20rem] grid grid-cols-5 ">

    <button id="btn-1" onclick="insertar(this)" class="py-5 px-2 bg-[#AF3838] text-center " value="a">
        A
    </button>
    <button id="btn-2" onclick="insertar(this)" class="py-5 bg-[#C64E4E] text-center" value="b">
        B
    </button>
    <button id="btn-3" onclick="insertar(this)" class="py-5 bg-[#AF3838] text-center" value="c">
        c
    </button>
    <button id="btn-4" onclick="insertar(this)" class="py-5 bg-[#C64E4E] text-center" value="d">
        D
    </button>
    <button id="btn-5" onclick="insertar(this)" class="py-5 bg-[#AF3838] text-center" value="l">
        l
    </button>
    <button id="btn-6" onclick="insertar(this)" class="py-5 bg-[#C64E4E] text-center" value="f">
        F
    </button>
    <button id="btn-7" onclick="insertar(this)" class="py-5 bg-[#AF3838] text-center" value="g">
        G
    </button>
    <button id="btn-8" onclick="insertar(this)" class="py-5 bg-[#C64E4E] text-center" value="h">
        H
    </button>
    <button id="btn-9" onclick="insertar(this)" class="py-5 bg-[#AF3838] text-center" value="i">
        I
    </button>
    <button id="btn-10" onclick="insertar(this)" class="py-5 bg-[#C64E4E] text-center" value="t">
        t
    </button>
    
</div>
<script>
    <?php
        $sqlletra1 = "SELECT descripcion_letra FROM letra";
        $Rletra1 = $mysqli->query($sqlletra1);
    ?>
    let nombre, a;
    var co = 0;
    for(let x=1; x<11;x++) {
        nombre = "btn-"+ x;
        a = document.getElementById(nombre);
        

        <?php 
         while($row5 = $Rletra1->fetch_array(MYSQLI_ASSOC)) {
        ?>   
             if (a.value == "<?php echo $row5['descripcion_letra']; ?>" ) {
                a.classList.remove("bg-[#AF3838]");
                a.classList.remove("bg-[#C64E4E]");
                a.classList.add("bg-gray-800");
                a.disabled = true; 
                co++;
             }
        <?php 
        }
        ?>
        if (co == 10) {
            
        }
        console.log(a.value);
    }
</script>


