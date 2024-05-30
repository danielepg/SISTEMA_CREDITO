

<?php 
include '../backend/config.php';


if(isset($_POST["pago"])){

  if($_POST["validar"] == "si"){
    mysqli_query($conn, "UPDATE clientes SET Estado = 'A' WHERE ClienteID = ".$_POST["ClienteID"]."");
  }

    mysqli_query($conn, "UPDATE transacciones SET estado_pago = 'cancelado', RecargosID = ".$_POST["RecargosID"]." WHERE TransaccionID = ".$_POST["TransaccionID"]."");
  

    header("Location: ../public/list_pagos.php?id=" . $_GET["id"]);
    exit();
}




$query = "SELECT * FROM transacciones 
INNER JOIN clientes on transacciones.ClienteID = clientes.ClienteID 
INNER JOIN tipo_recargos on tipo_recargos.RecargosID = transacciones.RecargosID
INNER JOIN creditos on transacciones.CreditoID = creditos.CreditoID WHERE transacciones.CreditoID = ".$_GET["id"] ?? '0'." ";

$resultado_cliente = mysqli_query($conn, $query);
$cli = mysqli_fetch_assoc($resultado_cliente);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        table th,td{
            background-color: #e8ebef !important;
        }
    </style>
</head>

<body class=" bg-white ">
<?php include 'dashboard_clientes.php'; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    <form method="POST" action="">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Realizar pago</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" name="TransaccionID" id="id_trans">
        <input type="hidden" name="ClienteID" value="<?= $cli["ClienteID"] ?>">
        <input type="hidden" name="validar" id="validar">
        <input type="hidden" value="<?= $_GET["id"] ?>" name="id" >
        <div class="mb-2">
            <label class="form-label">Cargo ?</label>
            <select name="RecargosID" class="form-control" required>
                <option></option>
                <option value="1">Sin cargos</option>
                <option value="2">Recargo de apremio reducido</option>
                <option value="3">Recargo ejecutivo</option>
                <option value="4">Mora</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" onclick="abrirNuevaPestana()" name="pago" class="btn border">Guardar</button>
      </div>
      </form>


    </div>
  </div>
</div>


<br>

<h2 class="text-center"></h2>
</br>

    <div class="container-fluid row g-3 px-3">

    <div class="col-md-5">
    <div class="py-5 px-5" style="background-color: #e8ebef !important;">

    <div class="card w-100">
        <div class="row g-0 w-100">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="bi bi-person-vcard-fill" style="font-size: 85px;"></i>
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Cliente</h5>
                <p class="card-text"><?= $cli["Nombre"] ?> <?= $cli["Apellido"] ?> - DPI: <?= $cli["DPI"] ?></p>
                <p class="card-text"><small class="text-body-secondary">Fecha inicio del credito <?= $cli["FechaInicio"] ?></small></p>
            </div>
            </div>
        </div>
        </div>

    </div>

    </div>

    <div class="col-md-7" >
    <div class="py-2 px-4" style="background-color: #e8ebef !important;">

    <h4 class="text-center">Estado pagos</h4>
    <form class="">
        <label class="form-label">Filtrar fecha</label>
    <input class="form-control me-2 light-table-filter w-75" id="myInput" onkeyup="myFunction()">
    </form>   
    </div>
    <br/>
    <div class="py-4 px-4 overflow-auto" style="background-color: #e8ebef !important;">

    <h5 class="float-end pb-2">Monto credito ► <?= $cli["MontoFinal"] ?></h5>

        <table class="table table-hover table_id" id="myTable">
        <thead class="">
            <tr>

                <th>No.</th>
                <th>PAGO PARCIAL</th>
                <th>Fecha Pago</th>
                <th>Cargo</th>
                <th>Monto cargo</th>
                <th>Saldo</th>
                <th style="width: 140px;"></th>
                <th style="width: 140px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $num = 0;
                $saldo = $cli["MontoFinal"];
                $boton = false;
                $sumacargos = 0;
                foreach($resultado_cliente as $row) { 
                    $num++; 
                    $sumacargos += $row["cantidad"];
                    ?>

                <tr>
                    <td><?php echo $num  ?></td>
                  
                    <td>Q. <?php echo $row['MontoPago']  ?></td>
                    <td><?php echo $row['FechaPago']  ?></td>
                    <td><?php echo $row['Descripcion']  ?></td>
                    <td>
                      <?php if($row["RecargosID"] == 1){ ?>
                          0
                        <?php }else{ 
                          echo $row["cantidad"];
                        } ?>
                    </td>
                    <th>
                        <?php
                         if($row["estado_pago"] == "cancelado"){
                            echo $saldo -= $row['MontoPago'];
                         }
                        
                         ?>
                    </th>
                    <td style="width: 140px;"><?= $row["estado_pago"] ?></td>
                    
                    <td style="width: 140px;">

                    <?php 
                    if($row["estado_pago"] != "cancelado"){ 
                      if($boton == false){
                        $boton = true;
                        ?>
                      
                      
                    <button class="btn bg-white border" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="pagar(<?= $row['TransaccionID']?>, '<?php if(mysqli_num_rows($resultado_cliente) == $num){ echo 'si'; }else{ echo 'no'; } ?>')">Realizar pago</button>                 
                      <?php }} ?>
                    </td>
                </tr>
            <?php } ?>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total Cargos:</td>
              <td><?= $sumacargos ?></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

        </tbody>
        </table>
    </div>
</div>


   
    </div>


    <footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h5 class="text-center text-white">&copy 2024</h5>
</footer>



<script type="text/javascript">
    function abrirNuevaPestana() {
      var url = '../backend/pdf.php?id=' + document.getElementById("id_trans").value;
      window.open(url, '_blank');
        
    }
    



function pagar(id, validar){
    document.getElementById("id_trans").value = id;
    document.getElementById("validar").value = validar;
}

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
<script src="../bootstrap532/js/bootstrap.bundle.min.js"></script>

</body>
</html>