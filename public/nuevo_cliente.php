<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>

    <link rel="stylesheet" href="./css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

</head>

<body class="bg-white">

    <?php include 'dashboard_clientes.PHP'; ?>

    <br><br><br>

    <div>
    <form action="../backend/insert_cliente.php" method="POST">
        <div class="shadow row g-3 p-5" style="margin: 0 10%; background-color: #e8ebef !important;">
            <h2>Nuevo Cliente</h2>
            <br>
       
            
                <div class="col-md-4">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="col-md-4">
                    <label for="Apellido">Apellido:</label>
                    <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese el apellido">
                </div>
                <div class="col-md-4">
                    <label for="DPI">DPI:</label>
                    <input type="text" class="form-control" name="DPI" id="DPI" placeholder="Ingrese el DPI">
                </div>
                <div class="col-md-4">
                    <label for="Nit">Nit:</label>
                    <input type="numeric" class="form-control" name="Nit" id="Nit" placeholder="Ingrese el Nit">
                </div>
                <div class="col-md-4">
                    <label for="Direccion">Direccion:</label>
                    <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Ingrese la Direccion">
                </div>
                <div class="col-md-4">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el teléfono">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Estado">Estado empleado:</label>
                    <select class="form-control" name="Estado" id="Estado">
                        <option>Seleccionar estado</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
                </div>
                
                <button name="ingresar" value="ingresar" type="submit" class="btn bg-white border">Ingresar</button>
            
        </div>
        </form>

    </div>

    <footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h5 class="text-center text-white">&copy 2024</h5>
</footer>


</body>

</html>