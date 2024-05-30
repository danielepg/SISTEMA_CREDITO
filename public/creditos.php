<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>

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
    <BR></BR>

<h2 class="text-center">HISTORIAL DE CREDITOS</h2>
</br>

    <div class="container-lg p-4" style="background-color: #e8ebef !important;">

    <form class="w-100">
        <label class="form-label">Filtro...</label>
    <input class="form-control me-2 light-table-filter" id="myInput" onkeyup="myFunction()">
    <hr>
    </form>    
    <br/>
        
        <table class="table table-hover table_id" id="myTable">
        <thead class="">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DPI</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>

                <th>Monto credito</th>
                <th>Monto final</th>
                <th>Monto parcial</th>
                <th>Fecha</th>
                <th>Plazos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM creditos 
                INNER JOIN clientes on clientes.ClienteID = creditos.ClienteID";
                $resultado_cliente = mysqli_query($conn, $query);

                $num = 0;
                foreach($resultado_cliente as $row) { 
                   $num++; ?>

                <tr>
                    <td><?= $num ?></td>
                    <td><?php echo $row['ClienteID'] ?></td>
                    <td><?php echo $row['Nombre']  ?></td>
                    <td><?php echo $row['Apellido']  ?></td>
                    <td><?php echo $row['DPI']  ?></td>
                    <td><?php echo $row['Direccion']  ?></td>
                    <td><?php echo $row['Telefono']  ?></td>

                    <td><?php echo $row['Monto']  ?></td>
                    <td><?php echo $row['MontoFinal']  ?></td>
                    <td><?php echo $row['Monto_parcial']  ?></td>
                    <td><?php echo $row['FechaInicio']  ?></td>
                    <td><?php echo $row['Plazos']  ?></td>
                    
                    <td style="width: 140px;"><a href="../public/list_pagos.php?id=<?php echo $row['CreditoID']  ?>" class="btn bg-white border">Ver Pagos</a></td>

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