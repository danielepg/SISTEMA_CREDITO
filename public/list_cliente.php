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

<body class=" bg-body-secondary ">

<h2 class="text-center">Clientes</h2>
</br>

    <div class="container-fluid px-3">

    <form class="d-flex">
    <input class="form-control me-2 light-table-filter" id="myInput" onkeyup="myFunction()">
    <hr>
    </form>    
    <br/>
        
        <table class="table table-hover table_id" id="myTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DPI</th>
                <th>NIT</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM clientes";
                $resultado_cliente = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($resultado_cliente)) { ?>

                <tr>
                    <td><?php echo $row['ClienteID'] ?></td>
                    <td><?php echo $row['Nombre']  ?></td>
                    <td><?php echo $row['Apellido']  ?></td>
                    <td><?php echo $row['DPI']  ?></td>
                    <td><?php echo $row['Nit']  ?></td>
                    <td><?php echo $row['Direccion']  ?></td>
                    <td><?php echo $row['Telefono']  ?></td>
                    <td><?php echo $row['Estado']  ?></td>
                    
                    <td>

                    <div class="btn-group">
                    <a href="editcliente.php?ID=<?php echo $row['ClienteID']?>" class="btn btn-primary">
                        <i class="fas fa-marker"></i>
                        </a>
                        <a href="deletecliente.php?ID=<?php echo $row['ClienteID']?>" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                    </div>                 

                    </td>
                </tr>
            <?php } ?>

        </tbody>
        </table>
    </div>

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