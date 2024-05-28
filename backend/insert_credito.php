<?php
include('config.php');

if (isset($_POST['ingresar'])) {

    $newFileName = "";
    ///////////////////////////PDF
    if (!isset($_FILES['Rutadoc'])) {
        die("No hay archivo.");
    }

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
    } else {
        echo "Error en la ejecución: " . $stmt->error;
    }


    $targetDir = "../PDF/"; //ruta carpeta

    $fileName = basename($_FILES["Rutadoc"]["name"]); //nombre de pdf
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); //extencion .pdf

    // Comprueba si el archivo es un PDF
    if ($fileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        exit;
    }

    // Establece un nuevo nombre
    $newFileName = $lastInsertId . '.' . $fileType;

    // Ruta completa del archivo de destino
    $targetFilePath = $targetDir . $newFileName;

    // Crea el directorio si no existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Sube el archivo al servidor
    if (move_uploaded_file($_FILES["Rutadoc"]["tmp_name"], $targetFilePath)) {
        //echo "El archivo ha sido subido exitosamente.";
    } else {
        //echo "Hubo un error al subir el archivo.";
    }


    $fechaActual = new DateTime();
    $fechaActual->format('Y-m-d');

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
    $recargosID = 1; // Por ejemplo

    // Preparar la declaración SQL
    $stmt22 = $conn->prepare("INSERT INTO transacciones (CreditoID, ClienteID, MontoPago, FechaPago, RecargosID) VALUES (?, ?, ?, ?, ?)");

    // Verificar si la declaración se preparó correctamente
    if ($stmt22 === false) {
        die("Error en la preparación: " . $conn->error);
    }

    foreach ($fechasPagos as $index => $fecha) {

        // Vincular los parámetros a la declaración
        $stmt22->bind_param("iidsi", $creditoID, $ClienteID, $Monto_parcial, $fecha, $recargosID);

        // Ejecutar la declaración
        if ($stmt22->execute()) {
            echo "Datos insertados correctamente." . PHP_EOL;
        } else {
            echo "Error al insertar datos: " . $stmt22->error . PHP_EOL;
        }
    }
    // Cerrar la declaración y la conexión
    $stmt->close();
    $stmt22->close();
    $conn->close();

    mysqli_query($conn, "UPDATE clientes SET Estado = 'C' WHERE ClienteID = ".$ClienteID."");
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    header("Location: ../public/list_creditos.php");
}
