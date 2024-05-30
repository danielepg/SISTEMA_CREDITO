

<?php include '../backend/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
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
</head>

<body>

<?php include 'dashboard_clientes.php'; ?>

<div class="container shadow p-5 bg-white" style="margin-top: 20px; border-radius: 8px;">
<h2 class="container shadow p-2 bg-white text-center" >EMPLEADOS</h2>

<form action="../backend/insert_empleado.php" method="POST" id="myFormInsert">
    <div class="row mt-5">
        <div class="form-group col-md-6">
            <label for="nombre_empleado">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese el nombre" minlength="4" maxlength="50" required>
            <span class=" alert-danger" id="nombre_empleadoError"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="apellido_empleado">Apellido:</label>
            <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Ingrese el apellido" minlength="4" maxlength="50" required>
            <span class=" alert-danger" id="apellido_empleadoError"></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_empleado">Tell:</label>
            <input type="number" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ingrese el telefono" required>
            <span class=" alert-danger" id="telefono_empleadoError"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empleado">Dirección:</label>
            <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado" placeholder="Ingrese la dirección" required minlength="4" maxlength="100">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="nit_empleado">NIT:</label>
            <input type="text" class="form-control" id="nit_empleado" name="nit_empleado" placeholder="Ingrese el NIT" minlength="5" maxlength="15" required>
            <span class=" alert-danger" id="nit_empleadoError"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="dpi_empleado">DPI:</label>
            <input type="number" class="form-control" id="dpi_empleado" name="dpi_empleado" placeholder="Ingrese el DPI" required>
            <span class=" alert-danger" id="dpi_empleadoError"></span>
        </div>
    </div>
    <div class="row mt-3">
    <div class="form-group col-md-6">
            <label for="estado_empleado">Estado:</label>
            <select class="form-control" id="estado_empleado" name="estado_empleado" required>
                <option></option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>
    </div>
    <br>
    <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
</form>
            </div>

<script>

function validarLetras(texto) {
    return /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/.test(texto);
}

    function validarTelefono(telefono) {
        return /^\d{4}-\d{4}$/.test(telefono);
    }

    function validarDPI(dpi) {
    return /^[0-9]{13}$/.test(dpi);
}

function validarNIT(nit) {
    return /^[0-9]+[a-zA-Z]*$/.test(nit);
}



    document.getElementById("myFormInsert").addEventListener("submit", function (event) {

        var nombre_empleado = document.getElementById("nombre_empleado").value;
        var apellido_empleado = document.getElementById("apellido_empleado").value;
        var nit_empleado = document.getElementById("nit_empleado").value;
        var dpi_empleado = document.getElementById("dpi_empleado").value;
        var telefono_empleado = document.getElementById("telefono_empleado").value;

        if (!validarTelefono(telefono_empleado)) {
            document.getElementById("telefono_empleadoError").innerText = "Por favor, ingresa teléfono(8 dígitos) formato(8888-8888).";
            event.preventDefault();
            return false;
        } else {
            document.getElementById("telefono_empleadoError").innerText = "";
        }

        if (!validarLetras(nombre_empleado)) {
        document.getElementById("nombre_empleadoError").innerText = "Por favor, ingresa solo letras.";
        event.preventDefault();
        return false;
        } else {
            document.getElementById("nombre_empleadoError").innerText = "";
        }

        if (!validarLetras(apellido_empleado)) {
        document.getElementById("apellido_empleadoError").innerText = "Por favor, ingresa solo letras.";
        event.preventDefault();
        return false;
        } else {
            document.getElementById("apellido_empleadoError").innerText = "";
        }

        if (!validarNIT(nit_empleado)) {
        document.getElementById("nit_empleadoError").innerText = "Por favor, verificar NIT.";
        event.preventDefault();
        return false;
        } else {
            document.getElementById("nit_empleadoError").innerText = "";
        }

        if (!validarDPI(dpi_empleado)) {
        document.getElementById("dpi_empleadoError").innerText = "Por favor, Verificar DPI.";
        event.preventDefault();
        return false;
        } else {
            document.getElementById("dpi_empleadoError").innerText = "";
        }

        return true;
    });
</script>


</body>
</html>
