<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empleado</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

</head>

<body class="bg-body-secondary">

    <?php include 'dashboard_usuarios.php'; ?>

    <br><br><br>

    <div>
        <div class="container shadow p-5 bg-white">
        <h2>Nuevo Usuario</h2>
        <br>
        <form>
            <div class="form-group mb-2">
                <label for="nombre">Usuario:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre">
            </div>
            <div class="form-group mb-2">
                <label for="apellido">Contraseña:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Ingrese contraseña">
            </div>
            <div class="form-group mb-2">
                <label for="departamento">Empleado:</label>
                <select class="form-control" id="departamento">
                    <option>Empleado uno</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="departamento">Estado:</label>
                <select class="form-control" id="departamento">
                    <option>Activo</option>
                    <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="departamento">Rol:</label>
                <select class="form-control" id="departamento">
                    <option>Administrador</option>
                    <option>Empleado</option>
                </select>
            </div>
            <br>
            <a href="usuarios.php" class="float-end btn border btn-outline-light text-black">Regresar</a>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
        </div>
        </div>



</body>

</html>