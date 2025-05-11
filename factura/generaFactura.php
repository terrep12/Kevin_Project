<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');
}
include "../../conexion.php";

if (empty($_REQUEST['cl']) || empty($_REQUEST['f'])) {
	echo "No es posible generar la factura.";
	exit;
}

$codCliente = $_REQUEST['cl'];
$noFactura = $_REQUEST['f'];

// Datos empresa
$consulta = mysqli_query($conexion, "SELECT * FROM configuracion");
$resultado = mysqli_fetch_assoc($consulta);

// Datos venta
$ventas = mysqli_query($conexion, "SELECT * FROM factura WHERE nofactura = $noFactura");
$result_venta = mysqli_fetch_assoc($ventas);

// Datos cliente
$clientes = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $codCliente");
$result_cliente = mysqli_fetch_assoc($clientes);

// Productos
$productos = mysqli_query($conexion, "SELECT d.nofactura, d.codproducto, d.cantidad, p.descripcion, p.precio FROM detallefactura d INNER JOIN producto p ON d.codproducto = p.codproducto WHERE d.nofactura = $noFactura");

require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', [80, 210]);      // ancho 80 mm, alto 210 mm
$pdf->SetMargins(3, 3, 3);
$pdf->SetAutoPageBreak(false);             // ¡Nunca crear página nueva!
$pdf->AddPage();
$pdf->SetTitle("Boleta de Venta");

// Logo
$logo_path = 'img/logo.jpg';
if (file_exists($logo_path)) {
	$pdf->Image($logo_path, 25, 5, 30); // ancho 50mm
	$pdf->Ln(25);
}

// Nombre empresa
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 4, utf8_decode($resultado['nombre']), 0, 1, 'C');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(0, 4, 'RUC: ' . $resultado['dni'], 0, 1, 'C');
$pdf->Cell(0, 4, utf8_decode('Dirección: ') . utf8_decode($resultado['direccion']), 0, 1, 'C');
$pdf->Cell(0, 4, 'Telefono: ' . $resultado['telefono'], 0, 1, 'C');
$pdf->Ln(2);


// Línea separadora
$pdf->Line(3, $pdf->GetY(), 77, $pdf->GetY());
$pdf->Ln(2);


// Datos cliente
$pdf->SetFont('Arial', 'B', 8);
// anchura=0, altura=4, texto, sin borde, salto de línea, alineación centrada
$pdf->Cell(0, 4, 'Cliente', 0, 1, 'C');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(0, 4, 'DNI: ' . $result_cliente['dni'], 0, 1, 'C');
$pdf->Cell(0, 4, utf8_decode($result_cliente['nombre']), 0, 1, 'C');

$pdf->Ln(2);



// Línea separadora
$pdf->Line(3, $pdf->GetY(), 77, $pdf->GetY());
$pdf->Ln(2);


// Fecha y hora
$pdf->SetFont('Arial', '', 7);
$fecha = date('d/m/Y', strtotime($result_venta['fecha']));
$hora = date('H:i:s', strtotime($result_venta['fecha']));
$pdf->Cell(0, 4, 'Fecha de Emisión: ' . $fecha, 0, 1);
$pdf->Cell(0, 4, 'Hora de Emisión: ' . $hora, 0, 1);
$pdf->Ln(2);


// Línea separadora
$pdf->Line(3, $pdf->GetY(), 77, $pdf->GetY());
$pdf->Ln(2);

// Detalle productos
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 4, 'Producto', 0, 0);
$pdf->Cell(10, 4, 'Cant', 0, 0);
$pdf->Cell(15, 4, 'P.Unit', 0, 0);
$pdf->Cell(15, 4, 'Total', 0, 1);

$pdf->SetFont('Arial', '', 7);
while ($row = mysqli_fetch_assoc($productos)) {
	$total_item = $row['cantidad'] * $row['precio'];
	$pdf->Cell(40, 4, utf8_decode(substr($row['descripcion'], 0, 20)), 0, 0);
	$pdf->Cell(10, 4, $row['cantidad'], 0, 0);
	$pdf->Cell(15, 4, number_format($row['precio'], 2, '.', ''), 0, 0);
	$pdf->Cell(15, 4, number_format($total_item, 2, '.', ''), 0, 1);
}

$pdf->Ln(2);


// Línea separadora
$pdf->Line(3, $pdf->GetY(), 77, $pdf->GetY());
$pdf->Ln(2);


// Total
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(55, 5, 'Total', 0, 0, 'R');
$pdf->Cell(20, 5, number_format($result_venta['totalfactura'], 2, '.', ''), 0, 1, 'R');

$pdf->Ln(5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(0, 4, utf8_decode("Gracias por su preferencia"), 0, 1, 'C');

$pdf->Output("boleta.pdf", "I");
?>
