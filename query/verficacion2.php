<?php 
require('../prcd/qc/qc.php');
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];
 
    $result = $conn->query(
        "SELECT * FROM datos_generales WHERE curp = '$username'"
    );
    
    if ($result->num_rows > 0) {
        echo '
        <span><small class="text-danger">Usuario registrado anteriormente </small><span>
        <script>
            document.getElementById("btnUpdateCURP2").disabled = true;
        </script>
        ';

    } else {
        echo '
        <span><small class="text-primary">Usuario válido</small><span>
        <script>
            document.getElementById("btnUpdateCURP2").disabled = false;
        </script>
        ';
    }
}

?>

