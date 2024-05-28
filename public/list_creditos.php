<?php include 'dashboard_clientes.php'; ?>

<?php 
include '../backend/config.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

    <style>
        table th,td{
            background-color: #e8ebef !important;
        }
    </style>
</head>

<body class=" bg-white ">
<footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h5 class="text-center text-white">&copy 2024</h5>
</footer>

<br>


</br>

<div class="w-100 px-3">
<h3 class="text-center float-center"><strong> Lista Creditos Activos. </strong></h3>
<div style="clear: both;"></div>
</div>
<br>

    <div class="container px-4 py-1 shadow" style="background-color: #e8ebef !important;">

    <form class="">
        <label class="form-label">Filtro de creditos</label>
    <input class="form-control me-2 light-table-filter w-50" id="myInput" placeholder="Escribe algo ..." onkeyup="myFunction()">

    </form>   
    
    </div>
    <br>

    <div class="container p-4 shadow overflow-auto" style="background-color: #e8ebef !important;">

        
        <table class="table table-hover table_id" id="myTable">
        <thead class="">
            <tr>

                <th>ID</th>
                <th>Cliente</th>
                <th>Credito</th>
                <th>Monto Parcial</th>
                <th>Plazos</th>
                <th></th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="">
            <?php 
                $query = "SELECT * FROM creditos 
                INNER JOIN clientes on creditos.ClienteID = clientes.ClienteID WHERE clientes.Estado = 'C'";

                $resultado_cliente = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($resultado_cliente)) { ?>

                <tr>
                    <td><?php echo $row['CreditoID']  ?></td>
                    <td><?php echo $row['Nombre']. $row['Apellido'] ?></td>                    
                    <td>Q. <?php echo $row['Monto']  ?></td>
                    <td>Q. <?php echo $row['Monto_parcial']  ?></td>
                    <td><?php echo $row['Plazos']  ?> meses</td>
                    <td><a href="../public/list_pagos.php?id=<?php echo $row['CreditoID']  ?>" class="btn bg-white border">Ver Pagos</a></td>
                    
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
  for (i = 1; i < tr.length; i++) {
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



</body>
</html>