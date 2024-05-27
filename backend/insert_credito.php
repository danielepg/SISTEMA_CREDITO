<?php
include('config.php');

if(isset($_POST['ingresar']))
{
    $ClienteID = $_POST['ClienteID'];
    $Monto = $_POST['Monto'];
    $MontoFinal = $_POST['MontoFinal'];
    $Monto_parcial = $_POST['Monto_parcial'];
    $FechaInicio = $_POST['FechaInicio'];
    $Plazos = $_POST['Plazos'];
    $Interes = $_POST['Interes'];
    $Estado = $_POST['Estado'];

    // Preparar la sentencia
    $stmt = $conn->prepare("INSERT INTO Creditos(ClienteID, Monto, MontoFinal, Monto_parcial, FechaInicio, Plazos, Interes, Estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $stmt->bind_param("idddsdds", $ClienteID, $Monto, $MontoFinal, $Monto_parcial, $FechaInicio, $Plazos, $Interes, $Estado);


    if ($stmt->execute()) {
        // Obtener el ID del último registro insertado
        $lastInsertId = $conn->insert_id;
        $lastInsertId;
    } else {
        echo "Error en la ejecución: " . $stmt->error;
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Fecha inicial
$fechaInicial = new DateTime('2024-05-22');

$fechaActual = new DateTime();
$fechaActual->format('Y-m-d');

// Número de pagos y monto de cada pago

// Arreglo para almacenar las fechas de los pagos

$fechasPagos = []; // Inicializamos el array antes del bucle

for ($i = 0; $i < $Plazos; $i++) {
    // Clonamos la fecha inicial para no modificarla directamente
    $fechaPago = clone $fechaActual;
    // Añadimos el número de meses correspondiente
    $fechaPago->modify("+$i month");
    // Añadimos la fecha del pago al arreglo
    $fechasPagos[] = $fechaPago->format('Y-m-d');
}



$creditoID = $lastInsertId; // Por ejemplo
$clienteID = $ClienteID; // Por ejemplo
$montoPago = $Monto_parcial; // Por ejemplo
$recargo = 0.00; // Por ejemplo
$fechaActual = $fechaActual; // Fecha actual
$recargosID = 1; // Por ejemplo

// Preparar la declaración SQL
$stmt = $conn->prepare("INSERT INTO transacciones (CreditoID, ClienteID, MontoPago, Recargo, FechaPago, FechaActual, RecargosID) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Verificar si la declaración se preparó correctamente
if ($stmt === false) {
    die("Error en la preparación: " . $conn->error);
}

foreach ($fechasPagos as $index => $fecha) {

// Vincular los parámetros a la declaración
$stmt->bind_param("iiddssi", $creditoID, $clienteID, $montoPago, $recargo, $fecha, $fechaActual, $recargosID);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Datos insertados correctamente." . PHP_EOL;
} else {
    echo "Error al insertar datos: " . $stmt->error . PHP_EOL;
}
}
// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Cerrar la sentencia preparada
    $stmt->close();

    header("Location: ../public/list_credito.php");
}

?>
