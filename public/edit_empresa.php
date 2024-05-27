
<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

<?php 
if(isset($_GET['empresaID']))
{
    $empresaID = $_GET['empresaID'];
    $query = "SELECT * FROM empresa WHERE empresaID = $empresaID";
    $resultado = mysqli_query($conn, $query);

    if(mysqli_num_rows($resultado) == 1)
    {
        $row = mysqli_fetch_array($resultado);
        //$ID = $row['ID'];
        $nombre_empresa = $row['nombre_empresa'];
        $direccion_empresa = $row['direccion_empresa'];
        $telefono_emp = $row['telefono_emp'];
        $nit = $row['nit'];
        $correo = $row['correo'];
        $estado = $row['estado'];
        
    }
}

if(isset($_POST['actualizar']))
{
    $empresaID = $_GET['empresaID'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion_empresa = $_POST['direccion_empresa'];
    $telefono_emp = $_POST['telefono_emp'];
    $nit = $_POST['nit'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];

    $query = "UPDATE empresa SET 
    nombre_empresa = '$nombre_empresa', 
    direccion_empresa = '$direccion_empresa' , 
    telefono_emp = '$telefono_emp' , 
    nit = '$nit' , 
    correo = '$correo' ,
    estado = '$estado'
    WHERE empresaID = $empresaID ";

    mysqli_query($conn, $query);
    header("Location: list_empresa.php");
}
?>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empresa</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
</head>

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">ACTUALIZAR EMPRESA</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="edit_empresa.php?empresaID=<?php echo $_GET['empresaID']; ?>" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="nombre_empresa">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="<?php echo $nombre_empresa; ?>" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empresa">Apellido:</label>
            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" value="<?php echo $direccion_empresa; ?>" placeholder="Ingrese el apellido">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_emp">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_emp" name="telefono_emp" value="<?php echo $telefono_emp; ?>" placeholder="Ingrese el telefono">
        </div>
        <div class="form-group col-md-6">
            <label for="nit">NIT:</label>
            <input type="text" class="form-control" id="nit" name="nit" value="<?php echo $nit; ?>" placeholder="Ingrese el NIT">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="correo">Correo:</label>
            <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" placeholder="Ingrese el correo">
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" value="<?php echo $estado; ?>">
                <option>Seleccionar estado del empleado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>
    </div>
    <br>
    <button name="actualizar" value="actualizar" type="submit" class="btn btn-warning">Actualizar</button>
</form>
            </div>
</body>