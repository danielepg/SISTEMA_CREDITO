<?php 
include '../backend/config.php'; 

if(isset($_POST["guardar"])){
    mysqli_query($conn, "INSERT INTO empleados value(0,'".$_POST["nombre_empleado"]."', '".$_POST["apellido_empleado"]."', '".$_POST["telefono_empleado"]."', '".$_POST["direccion_empleado"]."', '".$_POST["nit_empleado"]."', '".$_POST["dpi_empleado"]."' , '".$_POST["estado_empleado"]."', '".date("Y-m-d")."');");
    header("Location: ../usersView/empleados.php");
    exit;
}

$usuarios = mysqli_query($conn, "SELECT * FROM empleados");
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
  border-bottom-left-radius: 50% 34%;
  border-bottom-right-radius: 50% 34%;
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="mb-2">
            <label for="uno" class="form-label">Nombre del empleado</label>
            <input class="form-control" type="text" id="uno" name="nombre_empleado">
        </div>

        <div class="mb-2">
            <label for="dos" class="form-label">apellido del empleado</label>
            <input class="form-control" type="text" id="dos" name="apellido_empleado">
        </div>

        <div class="mb-2">
            <label for="tres" class="form-label">Telefono</label>
            <input class="form-control" type="text" id="tres" name="telefono_empleado">
        </div>

        <div class="mb-2">
            <label for="cuatro" class="form-label">DIrección</label>
            <input class="form-control" type="text" id="cuatro" name="direccion_empleado">
        </div>

        <div class="mb-2">
            <label for="cinco" class="form-label">NIT</label>
            <input class="form-control" type="text" id="cinco" name="nit_empleado">
        </div>

        <div class="mb-2">
            <label for="seis" class="form-label">DPI</label>
            <input class="form-control" type="text" id="seis" name="dpi_empleado">
        </div>

        <div class="mb-2">
            <label for="siete" class="form-label">Estado</label>
            <input class="form-control" type="text" id="siete" value="Activo" name="estado_empleado" readonly>
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
    <h2 class="w-auto">Lista empleados</h2>
    <h4 class="w-auto">De la empresa.</h4>
    </div>
   
    <br>

    <div class=" bg-body-secondary  px-3 container overflow-auto" >
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class=" bg-body-secondary " scope="col">#</th>
                    <th class=" bg-body-secondary " scope="col">ID</th>
                    <th class=" bg-body-secondary " scope="col">Nombre_del_empleado</th>
                    <th class=" bg-body-secondary " scope="col">Apellido_del_empleado</th>
                    <th class=" bg-body-secondary " scope="col">Teléfono</th>
                    <th class=" bg-body-secondary " scope="col">Dirección</th>
                    <th class=" bg-body-secondary " scope="col">NIT</th>
                    <th class=" bg-body-secondary " scope="col">DPI</th>
                    <th class=" bg-body-secondary " scope="col">Estado</th>
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
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["empleadoID"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["nombre_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["apellido_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["telefono_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["direccion_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["nit_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["dpi_empleado"] ?></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><strong><?= $user["estado_empleado"] ?></strong></td>
                    <td class=" bg-body-secondary " style="padding: 8px;"><?= $user["fecha_guardado_empleado"] ?></td>
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