<?php include 'dashboard_clientes.php'; ?>

<?php include '../backend/config.php'; ?>
<?php $fondocliente = '../public/image/client2.jpg';?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <style>
        .mi-div {
            width: 100%;
            height: 100%;
            background-color: #e8ebef !important;
            border-bottom-right-radius: 30px;
        }
    </style>

</head>

<body class="w-100 bg-white">


<br><br><!--style=" background-image: url('<?php //echo $fondocliente; ?>');"-->

<div class="w-100">
  <div class="row g-3 " style="margin:0 5% !important;">
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow" >
            <h5 class="text-center"><strong><i class="bi bi-person-fill-add"></i> Cliente</strong></h5>
            <p class="text-center">Nuevo Cliente</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="../public/nuevo_cliente.PHP" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong><i class="bi bi-person-standing"></i> Clientes</strong></h5>
            <p class="text-center">Lista Clientes</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="../public/list_cliente.php" class="btn bg-white px-4">IR</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong><i class="bi bi-cash-coin"></i> Creditos</strong></h5>
            <p class="text-center">Creditos Activos</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="../public/list_creditos.php" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong><i class="bi bi-cash-stack"></i> Credito</strong></h5>
            <p class="text-center">Nuevo Credito</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="../public/nuevo_credito.php" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong><i class="bi bi-person-vcard-fill"></i> Creditos</strong></h5>
            <p class="text-center">Historial Creditos</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="../public/creditos.php" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
  </div>

  </div>

  <footer style="background-color: rgb(31 142 55); border-top-right-radius:20px; border-top-left-radius:20px;" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h5 class="text-center text-white">&copy 2024</h5>
</footer>


</body>
</html>