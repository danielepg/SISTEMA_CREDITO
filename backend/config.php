<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "adminx";
$database = "creditodbfinal";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>