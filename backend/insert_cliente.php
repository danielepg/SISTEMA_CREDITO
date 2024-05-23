<?php

include('config.php');

if(isset($_POST['ingresar']))
{
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $DPI = $_POST['DPI'];
    $Nit = $_POST['Nit'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Estado = $_POST['Estado'];

    // Preparar la sentencia
    $stmt = $conn->prepare("INSERT INTO clientes(Nombre, Apellido, DPI, Nit, Direccion, Telefono, Estado) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $stmt->bind_param("ssiisis", $Nombre, $Apellido, $DPI,$Nit, $Direccion, $Telefono, $Estado);

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
