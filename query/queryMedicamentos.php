<?php
// if (isset($POST['text'])){

    include('../prcd/qc/qc.php');

    $medicamento = $_POST['medicamento'];
    $Query = "SELECT * FROM medicamentos WHERE nombre LIKE '%$medicamento%' ORDER BY nombre ASC" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;

    $x = 0;

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        $id = $row_sql_catalogo['id'];
        $nombre = strtoupper($row_sql_catalogo['nombre']);

        echo '
        <option value="'.$id.'" id="M'.$id.'" onclick="queryMedicamentosBadges(this.value)"><span id="TextoBadge'.$id.'">'.$nombre.'</span></option>
        ';
    }
    if ($filas == 0){
        echo'
            <script>
                document.getElementById("nohay").innerHTML = ""
            </script>
        ';
    }
    echo '
    <input type="text" id="numMX" value="'.$x.'">
    <option value="0" onclick="openModalM('.$x.')">Otra</option>
    ';
    ?>