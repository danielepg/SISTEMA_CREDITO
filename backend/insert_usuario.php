<?php

include('config.php');

if(isset($_POST['ingresar']))
{
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $DPI = $_POST['DPI'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Tipo_cliente = $_POST['Tipo_cliente'];
    $Estado = $_POST['Estado'];

    // Preparar la sentencia
    $stmt = $conn->prepare("INSERT INTO clientes(Nombre, Apellido, DPI, Direccion, Telefono, Tipo_cliente, Estado) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $stmt->bind_param("ssisiis", $Nombre, $Apellido, $DPI, $Direccion, $Telefono, $Tipo_cliente, $Estado);

    // Ejecutar la sentencia
    $resultado = $stmt->execute();

    if(!$resultado) 
    {
        die("INSERCIÓN FALLIDA");
    }

    // Cerrar la sentencia preparada
    $stmt->close();

    header("Location: ../public/list_cliente.php");
}

?>
