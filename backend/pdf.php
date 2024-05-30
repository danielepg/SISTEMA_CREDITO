<?php
require('../fpdf186/fpdf.php');

// Incluye el archivo de configuración de la base de datos
include '../backend/config.php';

// Obtiene los datos de la base de datos usando el ID de transacción pasado por GET
$query = "SELECT * FROM creditos 
        INNER JOIN clientes on creditos.ClienteID = clientes.ClienteID 
        INNER JOIN transacciones on transacciones.CreditoID = creditos.CreditoID 
        INNER JOIN tipo_recargos on tipo_recargos.RecargosID = transacciones.RecargosID  WHERE transacciones.TransaccionID = '".$_GET["id"]."'";

$resultado_cliente = mysqli_query($conn, $query);
$c = mysqli_fetch_assoc($resultado_cliente);

// Datos del cliente y detalles del crédito
$nombre_cliente = $c["Nombre"] . " " . $c["Apellido"];
$direccion_cliente = $c["Direccion"];
$telefono_cliente = $c["Telefono"];
$fecha_pago = date('d/m/Y');
$numero_credito = rand(10000, 90000);
$monto_credito = $c["Monto"]; // Monto total del crédito
$interes_mensual = $c["Interes"]; // Interés mensual
$numero_pago = $c["Plazos"]; // Número de pagos
$descripcion_recargo = $c["Descripcion"]; // Descripción del recargo
$cantidad_recargo = $c["cantidad"]; // Cantidad del recargo
$monto_mensual_base = $c["Monto_parcial"]; // Monto base mensual
$monto_total_mes = $c["MontoFinal"]; // Monto total del mes

// Creación del PDF
$pdf = new FPDF();
$pdf->AddPage();

// Encabezado
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Boleta de Pago',0,1,'C');

// Línea divisoria
$pdf->SetLineWidth(0.5);
$pdf->Line(10, 30, 200, 30);

// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Datos del Cliente:',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,8,"Nombre: $nombre_cliente",0,1);
$pdf->Cell(0,8,"Direccion: $direccion_cliente",0,1);
$pdf->Cell(0,8,"Telefono: $telefono_cliente",0,1);

// Espacio
$pdf->Ln(10);

// Detalles del crédito y pago en una tabla al 100% del ancho de la página
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Detalles del Credito y Pago:',0,1);

// Configuración de la tabla
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(192,192,192); // Color de fondo para encabezados
$pdf->Cell(95,10,'Descripcien',1,0,'C',true);
$pdf->Cell(95,10,'Valor',1,1,'C',true);

$pdf->SetFont('Arial','',10);
$pdf->Cell(95,10,'Fecha de Pago',1,0);
$pdf->Cell(95,10,$fecha_pago,1,1);
$pdf->Cell(95,10,'No. de Credito',1,0);
$pdf->Cell(95,10,$numero_credito,1,1);
$pdf->Cell(95,10,'Monto del Credito',1,0);
$pdf->Cell(95,10,'Q ' . $monto_credito,1,1);
$pdf->Cell(95,10,'Interes Mensual',1,0);
$pdf->Cell(95,10,$interes_mensual."%",1,1);
$pdf->Cell(95,10,'plazos',1,0);
$pdf->Cell(95,10,$numero_pago,1,1);
$pdf->Cell(95,10,'Cargos: '.$descripcion_recargo,1,0);
$pdf->Cell(95,10,'Q ' .$cantidad_recargo,1,1);
$pdf->Cell(95,10,'Monto pago parcial',1,0);
$pdf->Cell(95,10,'Q ' . $monto_mensual_base,1,1);
$pdf->Cell(95,10,'Monto Final del Credito',1,0);
$pdf->Cell(95,10,'Q ' . $monto_total_mes,1,1);

// Salida del PDF
$pdf->Output();
?>
