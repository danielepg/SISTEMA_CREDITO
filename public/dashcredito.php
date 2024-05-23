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

</head>

<body>

  <div class="row" style="margin-top: 5%; margin-left: 10%; margin-right: 10%; text-align: center;">
    <div class="card" style="width: 18rem; margin: 25px;">
        <div class="card-body">
            <h5 class="card-title">USUARIOS</h5>
            <p class="card-text">Usuarios activos</p>
            <a href="#" class="btn btn-primary">Ir</a>
        </div>
    </div>
    <div class="card" style="width: 18rem; margin: 25px; background-image: url('<?php echo $fondocliente; ?>');">
        <div class="card-body">
            <h5 class="card-title">CREDITOS</h5>
            <p class="card-text">Creditos activos</p>
            <a href="#" class="btn btn-primary">IR</a>
        </div>
    </div>
    <div class="card" style="width: 18rem; margin: 25px;">
        <div class="card-body">
            <h5 class="card-title">CLIENTES</h5>
            <p class="card-text">Clientes</p>
            <a href="#" class="btn btn-primary">Ir</a>
        </div>
    </div>
    <div class="card" style="width: 18rem; margin: 25px;">
        <div class="card-body">
            <h5 class="card-title">CLIENTES</h5>
            <p class="card-text">Clientes</p>
            <a href="#" class="btn btn-primary">Ir</a>
        </div>
    </div>
    <div class="card" style="width: 18rem; margin: 25px;">
        <div class="card-body">
            <h5 class="card-title">CLIENTES</h5>
            <p class="card-text">Clientes</p>
            <a href="#" class="btn btn-primary">Ir</a>
        </div>
    </div>
  </div>
</body>