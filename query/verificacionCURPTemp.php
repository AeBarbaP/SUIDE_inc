<?php 
require('../prcd/qc/qc.php');
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];

    $result = $conn->query(
        "SELECT * FROM datos_usuariot WHERE curp = '$username'"
    );
    
    if ($result->num_rows > 0) {
        echo json_encode(array(
            'success' => 1
        ));
        
    } else {
        echo json_encode(array(
            'success' => 0
        ));
    }
}

?>

