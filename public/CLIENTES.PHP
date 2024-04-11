<?php include 'DASHBOARD.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Form</title>
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">
</head>

<body>
    <form action="#">
        
        <div class="row m-2">
            <div class="col-md-4">
            <label for="nombre">Nombre:</label>
            <br>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-4">
            <label class="font-weight-bold" for="correo">Correo electrónico:</label>
            <br>
            <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
        </div>

    </form>



</body>

</html>