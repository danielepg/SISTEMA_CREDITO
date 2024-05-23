
<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

<?php 
if(isset($_GET['empleadoID']))
{
    $empleadoID = $_GET['empleadoID'];
    $query = "SELECT * FROM empleados WHERE empleadoID = $empleadoID";
    $resultado = mysqli_query($conn, $query);

    if(mysqli_num_rows($resultado) == 1)
    {
        $row = mysqli_fetch_array($resultado);
        //$ID = $row['ID'];
        $nombre_empleado = $row['nombre_empleado'];
        $apellido_empleado = $row['apellido_empleado'];
        $telefono_empleado = $row['telefono_empleado'];
        $direccion_empleado = $row['direccion_empleado'];
        $nit_empleado = $row['nit_empleado'];
        $dpi_empleado = $row['dpi_empleado'];
        $estado_empleado = $row['estado_empleado'];
        
    }
}

if(isset($_POST['actualizar']))
{
    $empleadoID = $_GET['empleadoID'];
    $nombre_empleado = $_POST['nombre_empleado'];
    $apellido_empleado = $_POST['apellido_empleado'];
    $telefono_empleado = $_POST['telefono_empleado'];
    $direccion_empleado = $_POST['direccion_empleado'];
    $nit_empleado = $_POST['nit_empleado'];
    $dpi_empleado = $_POST['dpi_empleado'];
    $estado_empleado = $_POST['estado_empleado'];

    $query = "UPDATE empleados SET 
    nombre_empleado = '$nombre_empleado', 
    apellido_empleado = '$apellido_empleado' , 
    telefono_empleado = '$telefono_empleado' , 
    direccion_empleado = '$direccion_empleado' , 
    nit_empleado = '$nit_empleado' ,
    dpi_empleado = '$dpi_empleado',
    estado_empleado = '$estado_empleado' 
    WHERE empleadoID = $empleadoID ";

    mysqli_query($conn, $query);
    header("Location: list_empleados.php");
}
?>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleados</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
</head>

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">ACTUALIZAR EMPLEADOS</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="edit_empleado.php?empleadoID=<?php echo $_GET['empleadoID']; ?>" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="nombre_empleado">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" value="<?php echo $nombre_empleado; ?>" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="apellido_empleado">Apellido:</label>
            <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" value="<?php echo $apellido_empleado; ?>" placeholder="Ingrese el apellido">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_empleado">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_empleado" name="telefono_empleado" value="<?php echo $telefono_empleado; ?>" placeholder="Ingrese el telefono">
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empleado">Dirección:</label>
            <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado" value="<?php echo $direccion_empleado; ?>" placeholder="Ingrese la dirección">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="nit_empleado">NIT:</label>
            <input type="text" class="form-control" id="nit_empleado" name="nit_empleado" value="<?php echo $nit_empleado; ?>" placeholder="Ingrese el NIT">
        </div>
        <div class="form-group col-md-6">
            <label for="dpi_empleado">DPI:</label>
            <input type="text" class="form-control" id="dpi_empleado" name="dpi_empleado" value="<?php echo $dpi_empleado; ?>" placeholder="Ingrese el DPI">
        </div>
    </div>
    <div class="row mt-3">
    <div class="form-group col-md-6">
            <label for="estado_empleado">Estado:</label>
            <select class="form-control" id="estado_empleado" name="estado_empleado" value="<?php echo $estado_empleado; ?>">
                <option>Seleccionar estado del empleado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>
    </div>
    <br>
    <button name="actualizar" value="actualizar" type="submit" class="btn btn-primary">Ingresar</button>
</form>
            </div>
</body>