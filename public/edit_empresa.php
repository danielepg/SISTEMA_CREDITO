
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
<style>
    label {
        font-weight: bold;
    }
    input, select {
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .error-message {
        color: red;
        font-size: 0.875em;
        margin-top: 5px;
    }
</style>

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">ACTUALIZAR EMPRESA</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="edit_empresa.php?empresaID=<?php echo $_GET['empresaID']; ?>" method="POST" id="empresaFormU">
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="nombre_empresa">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empresa" required name="nombre_empresa" value="<?php echo $nombre_empresa; ?>" placeholder="Ingrese el nombre">
            <span class="error-message" id="nombre_empresa_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empresa">Apellido:</label>
            <input type="text" class="form-control" id="direccion_empresa" required name="direccion_empresa" value="<?php echo $direccion_empresa; ?>" placeholder="Ingrese el apellido">
            <span class="error-message" id="direccion_empresa_error"></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_emp">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_emp" required name="telefono_emp" value="<?php echo $telefono_emp; ?>" placeholder="Ingrese el telefono">
            <span class="error-message" id="telefono_emp_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="nit">NIT:</label>
            <input type="text" class="form-control" id="nit" required name="nit" value="<?php echo $nit; ?>" placeholder="Ingrese el NIT">
            <span class="error-message" id="nit_error"></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="correo">Correo:</label>
            <input type="text" class="form-control" id="correo" required name="correo" value="<?php echo $correo; ?>" placeholder="Ingrese el correo">
            <span class="error-message" id="correo_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" required name="estado" value="<?php echo $estado; ?>">
                <option>Seleccionar estado del empleado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
            <span class="error-message" id="estado_error"></span>
        </div>
    </div>
    <br>
    <button name="actualizar" value="actualizar" type="submit" class="btn btn-warning">Actualizar</button>
</form>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('empresaFormU');

    form.addEventListener('submit', (event) => {
        let valid = true;

        // Resetear mensajes de error
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Obtener valores de los campos
        const nombreEmpresa = document.getElementById('nombre_empresa').value.trim();
        const direccionEmpresa = document.getElementById('direccion_empresa').value.trim();
        const telefonoEmp = document.getElementById('telefono_emp').value.trim();
        const nit = document.getElementById('nit').value.trim();
        const correo = document.getElementById('correo').value.trim();
        const estado = document.getElementById('estado').value;

        // Validar nombre de la empresa
        if (nombreEmpresa.length < 5 || nombreEmpresa.length > 50) {
            document.getElementById('nombre_empresa_error').textContent = 'El nombre debe tener entre 5 y 50 caracteres.';
            valid = false;
        }

        // Validar dirección de la empresa
        if (direccionEmpresa.length < 5 || direccionEmpresa.length > 150) {
            document.getElementById('direccion_empresa_error').textContent = 'La dirección debe tener entre 5 y 150 caracteres.';
            valid = false;
        }

        // Validar teléfono
        if (telefonoEmp.length !== 8 || !/^\d+$/.test(telefonoEmp)) {
            document.getElementById('telefono_emp_error').textContent = 'El teléfono debe tener exactamente 8 dígitos numéricos.';
            valid = false;
        }

        // Validar NIT
        if (nit.length < 8 || nit.length > 12) {
            document.getElementById('nit_error').textContent = 'El NIT debe tener entre 8 y 12 caracteres.';
            valid = false;
        }

        // Validar correo electrónico
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(correo)) {
            document.getElementById('correo_error').textContent = 'Introduce una dirección de correo electrónico válida.';
            valid = false;
        }

        // Validar estado
        if (estado === '') {
            document.getElementById('estado_error').textContent = 'Selecciona un estado.';
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});

            </script>
</body>