<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="./css/login.css">
  <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

  <style>
    .margen {
      margin: 30px;
    }
  </style>

</head>

<body class="bg-body-secondary position-fixed top-0 end-0 start-0 bottom-0 d-flex justify-content-center align-items-center">
  <div class=" shadow p-3 bg-white" style="width: 500px;">
    <form class="form-signin">
      <div class="margen">
        <h1 class="h3 mb-3 font-weight-normal text-center">Iniciar sesión</h1>
        <br><br>
        <label for="inputEmail" class="sr-only">Correo electrónico</label>
        <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Correo electrónico" required
          autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Contraseña" required>
        <br>
        <button class="btn btn-lg btn-success btn-block" type="submit">
          <a class=" text-decoration-none text-white" href="../public/creditos.php">Iniciar sesión</a>
        </button>
      </div>
    </form>
  </div>
</body>

</html>