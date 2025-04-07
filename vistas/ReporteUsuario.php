<?php
require_once('../reporte/fpdf.php');
require_once('../Modelo/Conexion.php');
require_once('../Modelo/ClsUsuario.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../assets/img/logo.png', 10, 8, 33);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(30, 10, 'Listado de Usuarios', 0, 0, 'C');
        $this->Ln(50);
        $this->SetFont('Arial', '', 8);
        $this->Cell(10, 6, 'Id', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Nombre', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Apellido', 1,0, 'C', 0);
        $this->Cell(27, 6, 'Correo', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Telefono', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Direccion', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Rol', 1, 0, 'C', 0);
        $this->Cell(27, 6, 'Estado', 1, 1, 'C', 0);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$objeto = new ClsUsuario();
$filas = $objeto->consultaGeneral();

if (!empty($filas)) {
    foreach ($filas as $fila) {
        $id = $fila['usua_codigo'];
        $name = $fila['usua_nombre'];
        $apellido = $fila['usua_apellido'];
        $correo = $fila['usua_correo'];
        $telefono = $fila['usua_telefono'];
        $direccion = $fila['usua_direccion'];
        $rol = $fila['usua_rol'];
        $estado = $fila['usua_estado'];

        $pdf->Cell(10, 6, $id, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $name, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $apellido, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $correo, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $telefono, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $direccion, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $rol, 1, 0, 'C', 0);
        $pdf->Cell(27, 6, $estado, 1, 1, 'C', 0);
    }

    $pdf->Output();
} else {
    echo "No se encontraron datos para generar el PDF.";
}
?>
