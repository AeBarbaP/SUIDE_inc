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
$var = "SELECT * FROM referencias WHERE curp = '$variable'";
$resultadoVariable = $conn->query($var);
$filaVar = $resultadoVariable->num_rows;
    if($filaVar > 0){
    $x=0;
        while($rowVar = $resultadoVariable->fetch_assoc()){
            $x++;
            
            echo'
            <tr>
                <td>'.$x.'</td>
                <td>'.$rowVar['nombre'].'</td>
                <td>'.$rowVar['parentesco'].'</td>
                <td>'.$rowVar['profesion_oficio'].'</td>
                <td>'.$rowVar['direccion'].'</td>
                <td>';
                ?>
                <a href="https://web.whatsapp.com/send/?phone=<?php echo $rowVar['celular'] ?>" target="_blank" class="btn btn bg-success"><i class="bi bi-whatsapp text-light"></i></a>
                <?php
                echo'
                </td>
                <td><button class="btn btn-warning" onclick="editarReferencia('.$rowVar['id'].')" data-bs-toggle="modal" data-bs-target="#editaReferencia"><i class="bi bi-pencil-square text-white"></i></button> <button class="btn btn-danger" onclick="borrarReferencia('.$rowVar['id'].')"><i class="bi bi-trash"></i></button></td>
            </tr>

        ';

        }
    }
    else{
        echo'
        <tr>
            <td colspan="9" class="text-center table-danger">Sin datos</td>
        </tr>
        ';
    }
}
?>