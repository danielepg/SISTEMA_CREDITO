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

    <style>
        .mi-div {
            width: 100%;
            height: 100%;
            background-color: rgb(7 194 48);
            border-bottom-right-radius: 20px;
        }
    </style>

</head>

<body class="w-100" style="background-color: aliceblue;">


<br><br><!--style=" background-image: url('<?php //echo $fondocliente; ?>');"-->

<div class="w-100">
  <div class="row g-3 " style="margin:0 5% !important;">
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow" >
            <h5 class="text-center"><strong>USUARIOS</strong></h5>
            <p class="text-center">Usuarios activos</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="#" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong> CREDITOS</strong></h5>
            <p class="text-center">Creditos activos</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="#" class="btn bg-white px-4">IR</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong> CLIENTES</strong></h5>
            <p class="text-center">Clientes</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="#" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong> CLIENTES</strong></h5>
            <p class="text-center">Clientes</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="#" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mi-div p-4 border shadow">
            <h5 class="text-center"><strong> CLIENTES</strong></h5>
            <p class="text-center">Clientes</p>
            <div class="w-100 d-flex  justify-content-center">
            <a href="#" class="btn bg-white px-4">Ir</a>
            </div>
        </div>
    </div>
  </div>

  </div>

<footer style="background-color: rgb(31 142 55);" class=" shadow py-2 position-fixed bottom-0 start-0 end-0 ">
    <h3 class="text-center">2024</h3>
</footer>

</body>
</html>