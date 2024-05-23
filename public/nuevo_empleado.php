<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

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

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">EMPLEADOS</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="../backend/insert_empleado.php" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="nombre_empleado">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="apellido_empleado">Apellido:</label>
            <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Ingrese el apellido">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_empleado">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ingrese el telefono">
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empleado">Dirección:</label>
            <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado" placeholder="Ingrese la dirección">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="nit_empleado">NIT:</label>
            <input type="text" class="form-control" id="nit_empleado" name="nit_empleado" placeholder="Ingrese el NIT">
        </div>
        <div class="form-group col-md-6">
            <label for="dpi_empleado">DPI:</label>
            <input type="text" class="form-control" id="dpi_empleado" name="dpi_empleado" placeholder="Ingrese el DPI">
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
    </div>
    <br>
    <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
</form>
            </div>
</body>