<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>

    <link rel="stylesheet" href="./css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

</head>

<body class="bg-body-secondary">

    <?php include 'dashboard_clientes.PHP'; ?>

    <br><br><br>

    <div>
        <div class="container shadow p-5 bg-white">
            <h2>Nuevo Cliente</h2>
            <br>
            <form action="../backend/insert_cliente.php" method="POST">
            
                <div class="form-group mb-2">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group mb-2">
                    <label for="Apellido">Apellido:</label>
                    <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese el apellido">
                </div>
                <div class="form-group mb-2">
                    <label for="DPI">DPI:</label>
                    <input type="text" class="form-control" name="DPI" id="DPI" placeholder="Ingrese el DPI">
                </div>
                <div class="form-group mb-2">
                    <label for="Nit">Nit:</label>
                    <input type="numeric" class="form-control" name="Nit" id="Nit" placeholder="Ingrese el Nit">
                </div>
                <div class="form-group mb-2">
                    <label for="Direccion">Direccion:</label>
                    <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Ingrese la Direccion">
                </div>
                <div class="form-group mb-2">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el teléfono">
                </div>
                <div class="form-group mb-2">
                    <label for="Estado">Estado empleado:</label>
                    <select class="form-control" name="Estado" id="Estado">
                        <option>Seleccionar estado</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
                </div>
                <br>
                <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>



</body>

</html>