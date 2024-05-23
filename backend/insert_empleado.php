<?php

include('config.php');

if(isset($_POST['ingresar']))
{
    $nombre_empleado = $_POST['nombre_empleado'];
    $apellido_empleado = $_POST['apellido_empleado'];
    $dpi_empleado = $_POST['dpi_empleado'];
    $direccion_empleado = $_POST['direccion_empleado'];
    $telefono_empleado = $_POST['telefono_empleado'];
    $nit_empleado = $_POST['nit_empleado'];
    $estado_empleado = $_POST['estado_empleado'];

    // Preparar la sentencia
    $stmt = $conn->prepare("INSERT INTO empleados(nombre_empleado, apellido_empleado, telefono_empleado, direccion_empleado, nit_empleado, dpi_empleado, estado_empleado) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $stmt->bind_param("ssissis", $nombre_empleado, $apellido_empleado, $telefono_empleado, $direccion_empleado, $nit_empleado, $dpi_empleado, $estado_empleado);

    // Ejecutar la sentencia
    $resultado = $stmt->execute();

    if(!$resultado) 
    {
        die("INSERCIÓN FALLIDA");
    }

    // Cerrar la sentencia preparada
    $stmt->close();

    header("Location: ../public/list_empleados.php");
}

?>
