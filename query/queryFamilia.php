<?php
include('../prcd/qc/qc.php');
if(empty($_POST['curp_exp'])){
    echo'
        <tr>
            <td colspan="9" class="text-center table-danger">Sin datos</td>
        </tr>
        ';

}
else if(isset($_POST['curp_exp'])){
$variable = $_POST['curp_exp'];
$var = "SELECT * FROM integracion WHERE curp = '$variable'";
$resultadoVariable = $conn->query($var);
$filaVar = $resultadoVariable->num_rows;

    if($filaVar != 0){
    $x=0;
        while($rowVar = $resultadoVariable->fetch_assoc()){
            $x++;
            
            echo'
            <tr>
                <td>'.$x.'</td>
                <td>'.$rowVar['nombre'].'</td>
                <td>'.$rowVar['parentesco'].'</td>
                <td>'.$rowVar['edad'].'</td>
                <td>'.$rowVar['escolaridad'].'</td>
                <td>'.$rowVar['profesion_oficio'].'</td>
                <td>'.$rowVar['discapacidad'].'</td>
                <td>'.$rowVar['ingreso'].'</td>
                <td>'.$rowVar['correoe'].'</td>
                <td>'
                ?>
                <a href="https://web.whatsapp.com/send/?phone=<?php echo $rowVar['telcel'] ?>" target="_blank" class="btn btn bg-success"><i class="bi bi-whatsapp text-light"></i></a>
                <?php
                '
                </td>
            </tr>
        ';
        }
    }
    else{
        echo'
        <tr>
            <td colspan="10" class="text-center table-danger">Sin datos</td>
        </tr>
        ';
    }
}
?>