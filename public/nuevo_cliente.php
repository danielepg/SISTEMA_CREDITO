<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>

    <link rel="stylesheet" href="./css/DASHBOARD.css">
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

<body class="bg-white">

    <?php include 'dashboard_clientes.php'; ?>

    <br><br><br>

    <div>
        <form action="../backend/insert_cliente.php" method="POST" id="clienteForm">
            <div class="shadow row g-3 p-5" style="margin: 0 10%; background-color: #e8ebef !important;">
                <h2>Nuevo Cliente</h2>
                <br>
                <div class="col-md-4">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre">
                    <span class="error-message" id="Nombre_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="Apellido">Apellido:</label>
                    <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese el apellido">
                    <span class="error-message" id="Apellido_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="DPI">DPI:</label>
                    <input type="text" class="form-control" name="DPI" id="DPI" placeholder="Ingrese el DPI">
                    <span class="error-message" id="DPI_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="Nit">Nit:</label>
                    <input type="text" class="form-control" name="Nit" id="Nit" placeholder="Ingrese el Nit">
                    <span class="error-message" id="Nit_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="Direccion">Direccion:</label>
                    <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Ingrese la Direccion">
                    <span class="error-message" id="Direccion_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el teléfono">
                    <span class="error-message" id="Telefono_error"></span>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Estado">Estado empleado:</label>
                    <select class="form-control" name="Estado" id="Estado">
                        <option value="">Seleccionar estado</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
                    <span class="error-message" id="Estado_error"></span>
                </div>
                <button name="ingresar" value="ingresar" type="submit" class="btn bg-white border">Ingresar</button>
            </div>
        </form>
    </div>

    <footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class="shadow py-2 position-fixed bottom-0 start-0 end-0 ">
        <h5 class="text-center text-white">&copy 2024</h5>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('clienteForm');

            form.addEventListener('submit', function(event) {
                let valid = true;

                // Resetear mensajes de error
                document.querySelectorAll('.error-message').forEach(function(el) {
                    el.textContent = '';
                });

                // Obtener valores de los campos
                const Nombre = document.getElementById('Nombre').value.trim();
                const Apellido = document.getElementById('Apellido').value.trim();
                const DPI = document.getElementById('DPI').value.trim();
                const Nit = document.getElementById('Nit').value.trim();
                const Direccion = document.getElementById('Direccion').value.trim();
                const Telefono = document.getElementById('Telefono').value.trim();
                const Estado = document.getElementById('Estado').value;

                // Validar Nombre
                if (Nombre === '') {
                    document.getElementById('Nombre_error').textContent = 'Ingrese el nombre.';
                    valid = false;
                }

                // Validar Apellido
                if (Apellido === '') {
                    document.getElementById('Apellido_error').textContent = 'Ingrese el apellido.';
                    valid = false;
                }

                // Validar DPI
                if (DPI === '' || isNaN(DPI) || DPI.length !== 13) {
                    document.getElementById('DPI_error').textContent = 'Ingrese un DPI válido de 13 dígitos.';
                    valid = false;
                }

                // Validar Nit
                if (Nit === '' || Nit.length < 8 || Nit.length > 12) {
                    document.getElementById('Nit_error').textContent = 'Ingrese el Nit.';
                    valid = false;
                }

                // Validar Direccion
                if (Direccion === '') {
                    document.getElementById('Direccion_error').textContent = 'Ingrese la dirección.';
                    valid = false;
                }

                // Validar Telefono
                if (Telefono === '' || isNaN(Telefono) || Telefono.length < 8 || Telefono.length > 10) {
                    document.getElementById('Telefono_error').textContent = 'Ingrese un teléfono válido de 8 a 10 dígitos.';
                    valid = false;
                }

                // Validar Estado
                if (Estado === '') {
                    document.getElementById('Estado_error').textContent = 'Seleccione un estado.';
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
