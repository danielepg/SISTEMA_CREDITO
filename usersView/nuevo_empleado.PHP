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
        <h2>Nuevo Empleado</h2>
        <br>
        <form>
            <div class="form-group mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
            </div>
            <div class="form-group mb-2">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Ingrese el apellido">
            </div>
            <div class="form-group mb-2">
                <label for="email">Dirección:</label>
                <input type="email" class="form-control" id="email" placeholder="Ingrese el correo electrónico">
            </div>
            <div class="form-group mb-2">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" placeholder="Ingrese el teléfono">
            </div>

            <br>
            <a href="empleados.php" class="float-end btn border btn-outline-light text-black">Regresar</a>
            <button type="submit" class="btn btn-primary">Guardar Empleado</button>
        </form>
        </div>
        </div>



</body>

</html>