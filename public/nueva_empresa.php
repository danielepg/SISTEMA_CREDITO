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

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">Nueva Sucursal</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="../backend/insert_empresa.php" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="nombre_empresa">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empresa">Direccion:</label>
            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Ingrese la Direccion">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_emp">Tell:</label>
            <input type="numeric" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese el telefono">
        </div>
        <div class="form-group col-md-6">
            <label for="nit">NIT:</label>
            <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el NIT">
        </div>
    </div>
    <div class="row mt-3">        
        <div class="form-group col-md-6">
            <label for="correo">Correo:</label>
            <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo">
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado">
                <option>Seleccionar estado</option>
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