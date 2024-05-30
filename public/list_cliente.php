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

<body class=" bg-white">

<br>
<h3 class="text-center float-center"><strong> Lista Clientes. </strong></h3>
<div style="clear: both;"></div>

<div class="container px-4 py-1 shadow" style="background-color: #e8ebef !important;">

    <form class="w-100 px-3">
        <label class="form-label">Filtro de clientes</label>
    <input class="form-control me-2 light-table-filter w-50" id="myInput" placeholder="Escribe algo ..." onkeyup="myFunction()">

    </form>
    </div>
    
    <br>
    <br/>
    <div class="container px-4 py-1 shadow" style="background-color: #e8ebef !important;">
        
        <table class="table table-hover table_id" id="myTable">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DPI</th>
                <th>NIT</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>ESTADO</th>
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
                    
                </tr>
            <?php } ?>

        </tbody>
        </table>
    </div>

    <footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h5 class="text-center text-white">&copy 2024</h5>
</footer>


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