<?php 
include '../backend/config.php'; 

if(isset($_POST["guardar"])){
    mysqli_query($conn, "INSERT INTO usuarios (empleadoID, nombre_usuario, password_usuario, estado_usuario, rol_usuario, fecha_guardado_usuario)value('".$_POST["empleadoID"]."', '".$_POST["nombre_usuario"]."', '".$_POST["password_usuario"]."', '".$_POST["estado_usuario"]."', '".$_POST["rol_usuario"]."', '".date("Y-m-d")."');");
    header("Location: ../usersView/usuarios.php");
    exit;
}

$usuarios = mysqli_query($conn, "SELECT * FROM usuarios");

$sql00 = mysqli_query($conn,"SELECT `empleadoID`, `nombre_empleado` FROM `empleados` ORDER BY `nombre_empleado` ASC");

$ver_usu = mysqli_query($conn,"SELECT `empleadoID` FROM `usuarios`");
$datos = array();
while ($row = $ver_usu->fetch_assoc()) {
    $datos[] = $row["empleadoID"];
} 
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
.curved {
  position: relative;
  background: #2c3e50;
  height: 16vh;
}

.curved::after {
  content: '';
  border-top-left-radius: 50% 100%;
  border-top-right-radius: 50% 100%;
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #fff;
  height: 53%;
}
    </style>
</head>

<body class="bg-white">

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
            <label for="cero" class="form-label">Para empleado:</label>
            <select name="empleadoID" id="cero" class="form-control" required>
            <option value=""></option>

            <?php 

            foreach($sql00 as $row) {
                
            if (in_array($row['empleadoID'], $datos)) {
                continue;
            }

            ?>
            <option value="<?php echo $row['empleadoID'];?>"><?php echo $row['nombre_empleado'];?></option>
            <?php
                //}
            }
            ?>

            </select> 
        </div>

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
        <button type="submit" name="guardar" class="btn text-white" style="background-color: #2c3e50b0;">Guardar Usuario</button>
      </div>
      </form>

    </div>
  </div>
</div>


    <br><br>

    <div class="container  bg-body-secondary  py-2 rounded ">
    <button type="button" style="background-color: #2c3e50b0;" class="btn text-white float-end " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Crear Nuevo Usuario
</button>
    <h2 class="w-auto">Lista usuarios</h2>
    <h4 class="w-auto">De la empresa.</h4>
    </div>
   
    <br>

    <div class=" bg-body-secondary  px-3 container overflow-auto" >
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class=" bg-body-secondary " scope="col">#</th>
                    <th class=" bg-body-secondary " scope="col">ID</th>
                    <th class=" bg-body-secondary " scope="col">ID_del_empleado</th>
                    <th class=" bg-body-secondary " scope="col">Nombre_del_usuario</th>
                    <th class=" bg-body-secondary " scope="col">Estado</th>
                    <th class=" bg-body-secondary " scope="col">Rol</th>
                    <th class=" bg-body-secondary " scope="col">Fecha_registro</th>
           
                </tr>
            </thead>
            <tbody>

            <?php 
            $num = 0;
            foreach($usuarios as $user){ 
                    $num++;
                ?>
                <tr>
                    <td class=" bg-body-secondary " style="padding: 8px;" scope="row"><?= $num ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["usuarioID"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["empleadoID"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["nombre_usuario"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["estado_usuario"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><strong><?= $user["rol_usuario"] ?></strong></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["fecha_guardado_usuario"] ?></td>
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

    <footer style="background-color: #4c6176; border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h4 class="text-center text-white">&copy 2024</h4>
</footer>

<script src="../bootstrap532/js/bootstrap.bundle.min.js"></script>

</body>

</html>