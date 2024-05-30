<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

</head>
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
    h1{
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
</style>

<body>

<?php
$sql = "SELECT nombre_empresa, direccion_empresa, telefono_emp, nit, correo FROM empresa"; // Cambia 'tabla' y 'columna1', 'columna2', 'columna3' según tus necesidades
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos en cajas de texto
    while($row = $result->fetch_assoc()) {
        ?>
        <br>
        <br>
        <div class="container px-4 py-1 shadow" style="background-color: #e8ebef !important; border-radius: 5px;">
        <h2>Empresa</h2>
        <br>

        <a class="btn btn-primary" href="nueva_empresa.php"><i class="bi bi-building-fill-add"></i> Ingresar Sucursal</a>
        <br>
        <div class="row mt-3 container">
            
        <div class="form-group col-md-4">
            <label for="Nombre">Nombre Empresa:</label>
            <input type="text" class="form-control" id="Nombre" readonly value="<?php echo $row['nombre_empresa']; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="Direccion">Direccion</label>
            <input type="text" class="form-control" id="Direccion" value="<?php echo $row['direccion_empresa']; ?>" readonly>
        </div>
        </div>

        <div class="row mt-3 container">
        <div class="form-group col-md-4">
            <label for="Telefono">Telefono</label>
            <input type="text" class="form-control" id="Telefono" readonly value="<?php echo $row['telefono_emp']; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="NIT">NIT</label>
            <input type="text" class="form-control" id="Nit" readonly value="<?php echo $row['nit']; ?>">
        </div>
        </div>
        <div class="form-group col-md-4 mt-3">
            <label for="Correo">Correo</label>
            <input type="text" class="form-control" id="Correo" readonly value="<?php echo $row['correo']; ?>">
        </div>
        </div>
        <br>
        <?php
    }
} else {
    echo "0 resultados";
}
?>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    var display = "none";
    for (j = 0; j < 8; j++) {  // Cambia el número 5 por la cantidad de columnas que deseas filtrar
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) { 
          display = "";
          break;  // Si encuentra una coincidencia en alguna de las columnas, muestra la fila y detiene la búsqueda.
        }
      }
    }
    tr[i].style.display = display;
  }
}
</script>

<script src="script.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

<nav aria-label="Page navigation example" class="px-3">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>


</body>
</html>