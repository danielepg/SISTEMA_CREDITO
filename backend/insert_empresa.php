<?php

include('config.php');

if(isset($_POST['ingresar']))
{
    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion_empresa = $_POST['direccion_empresa'];
    $telefono_emp = $_POST['telefono_emp'];
    $nit = $_POST['nit'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];

    // Preparar la sentencia
    $stmt = $conn->prepare("INSERT INTO empresa(nombre_empresa, direccion_empresa, nit, telefono_emp, correo, estado) VALUES (?,?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $stmt->bind_param("ssiiss", $nombre_empresa, $direccion_empresa, $nit, $telefono_emp, $correo, $estado);

    // Ejecutar la sentencia
    $resultado = $stmt->execute();

    if(!$resultado) 
    {
        die("INSERCIÓN FALLIDA");
    }

    // Cerrar la sentencia preparada
    $stmt->close();

    header("Location: ../public/list_empresa.php");
}

?>
