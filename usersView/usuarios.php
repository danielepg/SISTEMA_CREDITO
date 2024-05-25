<?php 
include '../backend/config.php'; 

if(isset($_POST["guardar"])){
    mysqli_query($conn, "INSERT INTO usuarios (nombre_usuario, password_usuario, estado_usuario, rol_usuario, fecha_guardado_usuario)value('".$_POST["nombre_usuario"]."', '".$_POST["password_usuario"]."', '".$_POST["estado_usuario"]."', '".$_POST["rol_usuario"]."', '".date("Y-m-d")."');");
    header("Location: ../usersView/usuarios.php");
    exit;
}

$usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creditos</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>

    </style>
</head>

<body class=" bg-body-secondary ">

    <?php include 'dashboard_usuarios.php'; ?>


    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

<form method="post" action="">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="mb-2">
            <label for="uno" class="form-label">Nombre del usuario</label>
            <input class="form-control" type="text" id="uno" name="nombre_usuario">
        </div>

        <div class="mb-2">
            <label for="dos" class="form-label">Contraseña</label>
            <input class="form-control" type="password" id="dos" name="password_usuario">
        </div>

        <div class="mb-2">
            <label for="tres" class="form-label">Estado</label>
            <input class="form-control" type="text" id="tres" value="Activo" name="estado_usuario" readonly>
        </div>

        <div class="mb-2">
            <label for="cuatro" class="form-label">Nombre del usuario</label>
            <select class="form-control" id="cuatro" name="rol_usuario">
                <option></option>
                <option>Administrador</option>
                <option>Usuario</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="guardar" class="btn btn-info">Guardar Usuario</button>
      </div>
      </form>

    </div>
  </div>
</div>


    <br><br>

    <div class="container bg-white py-2 rounded ">
    <button type="button" class="btn btn-info float-end " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Crear Nuevo Usuario
</button>
    <h2 class="w-auto">Lista usuarios</h2>
    <h4 class="w-auto">De la empresa.</h4>
    </div>
   
    <br>

    <div class="bg-white px-3 container overflow-auto" >
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre_del_usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Fecha_registro</th>
           
                </tr>
            </thead>
            <tbody>

            <?php 
            $num = 0;
            foreach($usuarios as $user){ 
                    $num++;
                ?>
                <tr>
                    <td style="padding: 8px;" scope="row"><?= $num ?></td>
                    <td style="padding: 8px;"><?= $user["usuarioID"] ?></td>
                    <td style="padding: 8px;"><?= $user["nombre_usuario"] ?></td>
                    <td style="padding: 8px;"><?= $user["estado_usuario"] ?></td>
                    <td style="padding: 8px;"><?= $user["rol_usuario"] ?></td>
                    <td style="padding: 8px;"><?= $user["fecha_guardado_usuario"] ?></td>
</tr>
                <?php } ?>
               
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example" class="px-3 position-fixed " style="bottom:50px;">
        <ul class="pagination shadow ">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <footer style="background-color: lightslategray; border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h4 class="text-center">2024</h4>
</footer>

<script src="../bootstrap532/js/bootstrap.bundle.min.js"></script>

</body>

</html>