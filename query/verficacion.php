<?php 
require('../prcd/qc/qc.php');
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];
 
    $result = $conn->query(
        "SELECT * FROM datos_generales WHERE curp = '$username'"
    );
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $expediente = $row['numExpediente'];
        $curp = $row['curp'];
        if ($curp == null || $curp == '' || $curp == ' ') {
            echo '
                <script>
                    console.log ("curp vacio");
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("CURP registrada anteriormente: '.$expediente.'");
                    document.getElementById("curp").value = "";
                    document.getElementById("edad").value = "";
                    document.getElementById("rfcCut").value = "";
                    document.getElementById("btnGuardarGeneral").disabled = true;
                </script>
            ';
        }
    } else {
        echo '
        <span><small class="text-primary">Usuario válido</small><span>
        ';
    }
}

?>

