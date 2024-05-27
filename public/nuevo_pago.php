<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php';
	$sql="SELECT ClienteID, Nombre, Nit from Clientes";
	$result=mysqli_query($conn,$sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
</style>
<body>

<h2 class="container shadow p-2 bg-white text-center" style="margin-top: 20px;">PAGOS</h2>

<div class="container shadow p-5 bg-white" style="margin-top: 20px;">


<form action="../backend/insert_empleado.php" method="POST">
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="ClienteID">Cliente:</label>
            <select class="form-control" id="nombre_empleado" name="nombre_empleado">
            <option>Seleccionar cliente</option>
                <?php while ($ver=mysqli_fetch_row($result)) {?>

                <option value="<?php echo $ver[0] ?>">
                NOMBRE: <?php echo $ver[1] ?> NIT: <?php echo $ver[2] ?>
                </option>

                <?php  }?>
            </select>
        
    </div>
        
        <div class="form-group col-md-6">
            <label for="Monto">Credito solicitado:</label>
            <input type="text" class="form-control" id="Monto" name="Monto" placeholder="Ingrese el Monto">
        </div>
    </div>
    <div class="row mt-3">        
        <div class="form-group col-md-6">
            <label for="FechaInicio">Fecha Inicio:</label>
            <input type="date" class="form-control" id="FechaInicio" name="FechaInicio">
        </div>
        <div class="form-group col-md-6">
            <label for="plazos">Plazos de pago:</label>
            <input type="numeric" class="form-control" id="plazos" name="plazos">
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="Interes">Interes:</label>
            <input type="DECIMAL" class="form-control" id="Interes" name="Interes" placeholder="Ingrese el Interes %">
        </div>
        <div class="form-group col-md-6">
            <label for="Monto_parcial">Monto pago:</label>
            <input type="DECIMAL" class="form-control" id="Monto_parcial" name="Monto_parcial" >
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="MontoFinal">Total a pagar:</label>
            <input type="DECIMAL" class="form-control" id="MontoFinal" name="MontoFinal" readonly>
        </div>  
        <div class="form-group col-md-6">
            <label for="Estado">Estado:</label>
            <select class="form-control" id="Estado" name="Estado">
                <option>Seleccionar estado del credito</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>      
    </div>
    <div class="row mt-3">        
        <div class="form-group col-md-6">
            <label for="Rutadoc">Ingrese el documento:</label>
            <input type="file" class="form-control" id="Rutadoc" name="Rutadoc">
        </div>
    </div>
    
    
    <br>
    <button name="ingresar" value="ingresar" type="submit" class="btn btn-primary">Ingresar</button>
</form>
</div>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('#nombre_empleado').select2();
	});
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var montoParcial = document.getElementById('Monto');
    var interesmonto = document.getElementById('Interes');
    var montoCalculado = document.getElementById('Monto_parcial');
    var montoCalculado2 = document.getElementById('MontoFinal');
    var plazos = document.getElementById('plazos');

    function calcular() {
        var valor = parseFloat(montoParcial.value);
        var valorInteres = parseFloat(interesmonto.value);
        var valorPlazo = parseFloat(plazos.value);
        
        if (!isNaN(valor) && !isNaN(valorInteres) && !isNaN(valorPlazo)) {
            var resultado = calcularMonto(valor, valorInteres, valorPlazo);
            montoCalculado.value = resultado.toFixed(2); // Formato con dos decimales
        } else {
            montoCalculado.value = 'Valor no válido';
        }
    }

    function calcular2() {
        var valor = parseFloat(montoParcial.value);
        var valorInteres = parseFloat(interesmonto.value);
        var valorPlazo = parseFloat(plazos.value);
        
        if (!isNaN(valor) && !isNaN(valorInteres) && !isNaN(valorPlazo)) {
            var resultado = totalfinal(valor, valorInteres, valorPlazo);
            montoCalculado2.value = resultado.toFixed(2); // Formato con dos decimales
        } else {
            montoCalculado2.value = 'Valor no válido';
        }
    }

    // Asignar las funciones calcular y calcular2 al evento keyup de todos los campos
    montoParcial.addEventListener('keyup', function() {
        calcular();
        calcular2();
    });
    interesmonto.addEventListener('keyup', function() {
        calcular();
        calcular2();
    });
    plazos.addEventListener('keyup', function() {
        calcular();
        calcular2();
    });

    function calcularMonto(valor, valorInteres, valorPlazo) {
        var interesCalculado = (valor * valorInteres) / 100;
        var total = valor / valorPlazo;
        var final = total + interesCalculado
        return final; // Dividir el total por el número de plazos
    }

    function totalfinal(valor, valorInteres, valorPlazo) {
        var interesCalculado = (valor * valorInteres) / 100;
        var total = valor / valorPlazo;
        var final = total + interesCalculado
        return final * valorPlazo;  // Dividir el total por el número de plazos
    }
});

</script>