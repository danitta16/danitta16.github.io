<?php
require('./fpdf.php');
require_once '../../controlador/sesion_valida.php';

require_once('../../modelo/database.php');

class PDF extends FPDF
{
    public $pdo;

    // Constructor que recibe la conexión PDO como parámetro
    public function __construct($pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
    }

   // Cabecera de página
   function Header()
   {

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('../../assets/img/logo.png', 250, 5, 25); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 30); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(85); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('TALLER GINA Y KATA'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Cl. 23 # 14-05 Madrid"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 3102953249"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : atencionalcliente@ginakata.com"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : Madrid"), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 102, 204);
      $this->Cell(80); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE PEDIDOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 102, 204); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('HORA'), 1, 0, 'C', 1);
      $this->Cell(28, 10, utf8_decode('ESTADO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('PRODUCTO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TOTAL'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
       $this->SetY(-15);
       $this->SetFont('Arial', 'I', 8);
       $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
       $this->SetY(-15);
       $this->SetFont('Arial', 'I', 8);
       $hoy = date('d/m/Y');
       $this->Cell(500, 10, utf8_decode($hoy), 0, 0, 'C');
   }
}

$pdo = new PDO('mysql:host=localhost;dbname=g', 'root', '1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdf = new PDF($pdo);
$pdf->AddPage("landscape");
$pdf->AliasNbPages();


$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$id = $_SESSION["id"];
$consulta_reporte_pedidos = $pdo->prepare("SELECT p.idpedido, p.fechapedido, p.horapedido, p.estadopedido, 
                                       u.nombre_usuario, u.apellido_usuario, pr.descripProducto, p.totalpedido
                                       FROM pedido p
                                       JOIN usuario u ON p.idusuarioFK = u.id_usuario
                                       JOIN producto pr ON p.idProductoFK = pr.idproducto
                                       WHERE u.id_usuario = :id
                                       ");

$consulta_reporte_pedidos->bindParam(':id', $id, PDO::PARAM_INT);
$consulta_reporte_pedidos->execute();

while ($datos_reporte = $consulta_reporte_pedidos->fetch(PDO::FETCH_OBJ)) {
   $i = $i + 1;
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->idpedido), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->fechapedido), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->horapedido), 1, 0, 'C', 0);
   $pdf->Cell(28, 10, utf8_decode($datos_reporte->estadopedido), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->nombre_usuario), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->apellido_usuario), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($datos_reporte->descripProducto), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->totalpedido), 1, 1, 'C', 0);
}

$fechaHoy = date('Y-m-d'); // Obtener la fecha de hoy en formato 'año-mes-día'
$nombreArchivo = 'PedidosCliente_' . $fechaHoy . '.pdf'; // Concatenar la fecha al nombre del archivo

$pdf->Output($nombreArchivo, 'I'); // Usar el nombre de archivo concatenado
