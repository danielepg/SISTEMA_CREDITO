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

<form method="post" action="" id="myFormInsert">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="mb-2">
      <label for="nombre_empleado">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese el nombre" minlength="4" maxlength="50" required>
            <span class=" alert-danger" id="nombre_empleadoError"></span>
        </div>

        <div class="mb-2">
        <label for="apellido_empleado">Apellido:</label>
            <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Ingrese el apellido" minlength="4" maxlength="50" required>
            <span class=" alert-danger" id="apellido_empleadoError"></span>
        </div>

        <div class="mb-2">
            <label for="telefono_empleado">Tell:</label>
            <input type="text" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ingrese el telefono" required>
            <span class=" alert-danger" id="telefono_empleadoError"></span>
        </div>

        <div class="mb-2">
        <label for="direccion_empleado">Dirección:</label>
            <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado" placeholder="Ingrese la dirección" required minlength="4" maxlength="100">
        </div>

        <div class="mb-2">
        <label for="nit_empleado">NIT:</label>
            <input type="text" class="form-control" id="nit_empleado" name="nit_empleado" placeholder="Ingrese el NIT" minlength="5" maxlength="15" required>
            <span class=" alert-danger" id="nit_empleadoError"></span>
        </div>

        <div class="mb-2">
        <label for="dpi_empleado">DPI:</label>
            <input type="number" class="form-control" id="dpi_empleado" name="dpi_empleado" placeholder="Ingrese el DPI" required>
            <span class=" alert-danger" id="dpi_empleadoError"></span>
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