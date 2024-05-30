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
<body>
<br>
<form action="../backend/insert_empresa.php" method="POST" id="empresaForm">
<div class="shadow row g-3 p-5" style="margin: 0 10%; background-color: #e8ebef !important;">
                <h2>Nueva Empresa</h2>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="nombre_empresa">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese el nombre"  required>
            <span class="error-message" id="nombre_empresa_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="direccion_empresa">Direccion:</label>
            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Ingrese la Direccion"  required>
            <span class="error-message" id="direccion_empresa_error"></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="telefono_emp">Tell:</label>
            <input type="text" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese el telefono"  required>
            <span class="error-message" id="telefono_emp_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="nit">NIT:</label>
            <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el NIT"  required>
            <span class="error-message" id="nit_error"></span>
        </div>
    </div>
    <div class="row mt-3">        
        <div class="form-group col-md-6">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo"  required>
            <span class="error-message" id="correo_error"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="">Seleccionar estado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
            <span class="error-message" id="estado_error"></span>
        </div>
    </div>    
    <br>
    <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
    </div>
</form>


<script>
    document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('empresaForm');

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
</html>
