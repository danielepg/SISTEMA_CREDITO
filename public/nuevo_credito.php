<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "GestorCreditos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
	$sql="SELECT ClienteID, Nombre, Nit from Clientes";
	$result=mysqli_query($conn,$sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<style>
    label{
        font-weight: bold;
    }
    input{
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    select{
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>
<body>

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">CREDITOS</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="../backend/insert_empleado.php" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="estado_empleado">Estado:</label>
            <select class="form-control" id="nombre_empleado" name="nombre_empleado">
                <?php while ($ver=mysqli_fetch_row($result)) {?>

                <option value="<?php echo $ver[0] ?>">
                <?php echo $ver[1] ?> <?php echo $ver[2] ?>
                </option>

                <?php  }?>
            </select>
        
    </div>
        <div class="form-group col-md-6">
            <label for="nombre_empleado">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="Monto">MONTO:</label>
            <input type="text" class="form-control" id="Monto" name="Monto" placeholder="Ingrese el Monto">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_empleado">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ingrese el telefono">
        </div>
        <div class="form-group col-md-6">
            <label for="FechaInicio">Fecha Inicio:</label>
            <input type="date" class="form-control" id="FechaInicio" name="FechaInicio">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="FechaFin">Fecha Fin:</label>
            <input type="date" class="form-control" id="FechaFin" name="FechaFin">
        </div>
        <div class="form-group col-md-6">
            <label for="FechaPago">Fecha de Pago:</label>
            <input type="date" class="form-control" id="FechaPago" name="FechaPago" >
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="Interes">Interes:</label>
            <input type="DECIMAL" class="form-control" id="Interes" name="Interes" placeholder="Ingrese el Interes %">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="estado_empleado">Estado:</label>
            <select class="form-control" id="estado_empleado" name="estado_empleado">
                <option>Seleccionar estado del empleado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="Rutadoc">Ingrese el documento:</label>
            <input type="file" class="form-control" id="Rutadoc" name="Rutadoc">
        </div>
    </div>
    
    
    <br>
    <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
</form>
</div>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('#nombre_empleado').select2();
	});
</script>