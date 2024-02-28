<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link rel="stylesheet" href="./css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

</head>

<body class="bg-body-secondary">

    <?php include 'dashboard_usuarios.PHP'; ?>

    <br><br><br>

    <div>
        <div class="container shadow px-5 py-3 mb-2 bg-white">
        <h2 class="text-center">Editar Usuario</h2>
        
        <form>
            <div class="form-group mb-2">
                <label for="nombre">Usuario:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese usuario">
            </div>
         
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambio</button>
        </form>
        </div>

        <div class="container shadow px-5 py-3 mb-2 bg-white">
        <h2 class="text-center">Editar Contraseña</h2>
        
        <form>
            <div class="form-group mb-2">
                <label for="nombre">Contraseña:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese contraseña">
            </div>
            
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambio</button>
        </form>
        </div>

        <div class="container shadow px-5 py-3 mb-2 bg-white">
        <h2 class="text-center">Editar Estado</h2>
        
        <form>
            <div class="form-group mb-2">
                <label for="departamento">Estado:</label>
                <select class="form-control" id="departamento">
                    <option>Activo</option>
                    <option>Inactivo</option>
 
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambio</button>
        </form>
        </div>


        </div>


  

</body>

</html>