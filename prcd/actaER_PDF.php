<?php
    session_start();
    $usr = $_SESSION['nombre'];

    include('qc/qc.php');
    require('fpdf/fpdf.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_actual = strftime("%d-%m-%Y");

    $curp =$_REQUEST['curp'];
    $id =$_REQUEST['id'];
    $flag =$_REQUEST['flag'];

    $sqlGenerales = "SELECT * FROM datos_generales WHERE curp = '$curp'";
    $resultadoGenerales = $conn->query($sqlGenerales);
    $rowSqlGenerales = $resultadoGenerales->fetch_assoc();

    $expediente = $rowSqlGenerales['numExpediente'];
    $nombre = $rowSqlGenerales['nombre'].' '.$rowSqlGenerales['apellido_p'].' '.$rowSqlGenerales['apellido_m'];

    $estado = $rowSqlGenerales['estado'];
    $expediente = $rowSqlGenerales['numExpediente'];

    $sqlEstados = "SELECT * FROM catestados WHERE claveEstado = '$estado'";
    $resultadoEstados = $conn->query($sqlEstados);
    $rowSqlEstados = $resultadoEstados->fetch_assoc();

    $municipio = $rowSqlGenerales['municipio'];

    $sqlMunicipios = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$municipio'";
    $resultadoMunicipios = $conn->query($sqlMunicipios);
    $rowSqlMunicipios = $resultadoMunicipios->fetch_assoc();

    $mpionombre = $rowSqlMunicipios['nombreMunicipio'];

    $sqlVivienda = "SELECT * FROM vivienda WHERE curp = '$curp'";
    $resultadoVivienda = $conn->query($sqlVivienda);
    $rowSqlVivienda = $resultadoVivienda->fetch_assoc();

    if ($flag == 1) {
        $sql = "SELECT * FROM solicitud WHERE curp = '$curp'";
        $resultadoSQL = $conn->query($sql);
        $row = $resultadoSQL->fetch_assoc();
        $descripcion1 = $row['tipo'];
        if ($descripcion1 == 4){
            $descripcion = "CREDENCIAL DE PERSONA CON DISCAPACIDAD";
        }
        else if ($descripcion1 == 5){
            $descripcion = "TARJETÓN VEHICULAR";
        }
    }
    else if ($flag == 2) {
        $sql2 = "SELECT * FROM  servicios WHERE curp = '$curp'";
        $resultadoSQL2 = $conn->query($sql2);
        $row2 = $resultadoSQL2->fetch_assoc();
        $detalle = $rowSqlServicios['detalle_solicitud'];

        $sqlServicios = "SELECT * FROM funcionales WHERE id = '$detalle'";
        $resultadoServicios = $conn->query($sqlServicios);
        $rowServicios = $resultadoServicios->fetch_assoc();
        $descripcion = strtoupper($rowServicios['nombre']);
    }

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../img/Logos.png',10,10,100);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        $this->Ln(5);
        // Movernos a la derecha
        $this->Cell(120);
        // Título
        $this->Cell(30,10,'ACTA DE ENTREGA',0,0,'L');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-35);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
        $this->Ln();
        $this->SetFont('Arial','B',8);
        $this->Cell(0,4,utf8_decode('Circuito Cerro del Gato S/N, Edificio K, Nivel 2'),0,0,'R');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('Ciudad Administrativa, C.P. 98160, Zacatecas, Zac.'),0,0,'R');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('inclusion@zacatecas.gob.mx Tels. 4924915088 y 89'),0,0,'R');
    }
    }

    // Creación del objeto de la clase heredada
    $pdf = new PDF('P','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',11);
    $pdf->Multicell(190,8,utf8_decode('
    DIRECCIÓN DE ATENCIÓN PRIORITARIA A PERSONAS CON DISCAPACIDAD'),0,'C',0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(17,7,utf8_decode('FECHA: '),0,0,'C');
    $pdf->Cell(5,7,utf8_decode(''),0,0,'C');
    $pdf->Cell(55,7,$fecha_actual,0,0,'L');
    $pdf->Line(10, 48, 210-10, 48); // 20mm from each edge
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(44,5,utf8_decode('Número de Expediente: '),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(44,5,utf8_decode($expediente),0,0,'C');
    $pdf->Cell(5,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(12,5,utf8_decode('CURP:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(63,5,utf8_decode($curp),0,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(14,5,utf8_decode('Nombre completo:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(125,5,utf8_decode($nombre),0,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(18,5,utf8_decode('Domicilio:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(105,5,utf8_decode($rowSqlGenerales['domicilio']),0,0,'C');
    $pdf->Cell(2,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(13,5,utf8_decode('No. Ext:'),0,0,'R');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_ext']),0,0,'C');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(13,5,utf8_decode('No. Int.:'),0,0,'R');
    $pdf->Cell(1,6,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_int']),0,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,5,utf8_decode('Colonia:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(75,5,utf8_decode($rowSqlGenerales['colonia']),0,0,'C');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(26,5,utf8_decode('Entre vialidades:'),0,0,'R');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(72,5,utf8_decode($rowSqlGenerales['entre_vialidades']),0,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(13,5,utf8_decode('Estado:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(30,5,utf8_decode($rowSqlEstados['nombreEstado']),0,0,'C');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(17,5,utf8_decode('Municipio:'),0,0,'L');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,5,utf8_decode($mpionombre),0,0,'C');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(17,5,utf8_decode('Localidad:'),0,0,'R');
    $pdf->Cell(1,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(54,5,utf8_decode($rowSqlGenerales['localidad']),0,0,'C');
    $pdf->Ln();

    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
    $pdf->Multicell(190,5,utf8_decode('Recibí del Gobierno del Estado de Zacatecas, a través del Instituto para la Atención e Inclusión de las Personas con Discapacidad el(los) artículo(s) que abajo se lista(n) en calidad de Donativo a mi favor.'),0,'J',0);
    $pdf->Multicell(190,10,utf8_decode($descripcion),0,'C',0);
    $pdf->Multicell(190,5,utf8_decode('Mismo(s) que me comprometo a darle buen uso, así como limpieza y mantenimiento en su caso, asimismo, reintegrarlo una vez que deje de ser utilizado por el o la beneficiaria.'),0,'J',0);
    $pdf->Ln();

    /* Insertar tabla de servicios */

    $pdf->Ln();
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(72,5,utf8_decode('Firma de recibido: '),0,0,'R');
    $pdf->Cell(2,5,utf8_decode(''),0,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(90,5,utf8_decode('____________________________________________'),0,0,'C');
    $pdf->Ln();



    $pdf->Output();
?>