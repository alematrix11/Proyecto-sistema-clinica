<?php

//Se empieza a desarrollar el reporte para descargar en PDF de los profesionales de la clinica 01/11/2019

require('fpdf.php');

class PDF extends FPDF{

    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo_pb.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(23);
        // Título
        $this->Cell(140,10,'Profesionales de la Clinica "Domingo Guzman Silva"',1,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
    
}


//Incluimos la conexion a la base de datos
include_once('../../conexion.php');

//Se realiza una consulta para los profesionales
$seleccion_profesionales = "SELECT * FROM profesionales";
$seleccionando_profesionales = $conexion_bdd -> query($seleccion_profesionales);

//Se establece los formatos que tendra el archivo en PDF
$pdf = new PDF();

$pdf->AddPage();

//Se establece un pie de pagina
$pdf->AliasNbPages();

$pdf->SetFont('Arial','B',14);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
//$pdf->Cell(23);
$pdf->Cell(182,10,'Tabla de numero de documentos y matriculas de los profesionales',0,2,'C');
$pdf->Ln(5);

$pdf -> Cell(10, 10, 'N', 1, 0, 'C', 0);
$pdf -> Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
$pdf -> Cell(40, 10, 'Apellido', 1, 0, 'C', 0);
$pdf -> Cell(45, 10, 'DNI', 1, 0, 'C', 0);
$pdf -> Cell(45, 10, 'Matricula', 1, 1, 'C', 0);

$pdf->SetFont('Arial','',12);

while($row2 = $seleccionando_profesionales->fetch(PDO::FETCH_ASSOC)){
    $pdf -> Cell(10, 10, $row2['id_profesional'], 1, 0, 'C', 0);
    $pdf -> Cell(40, 10, $row2['nombre_p'], 1, 0, 'C', 0);
    $pdf -> Cell(40, 10, $row2['apellido_p'], 1, 0, 'C', 0);
    $pdf -> Cell(45, 10, $row2['dni_p'], 1, 0, 'C', 0);
    $pdf -> Cell(45, 10, $row2['matricula_p'], 1, 1, 'C', 0);
}

$pdf->Output();

?>
