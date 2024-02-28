<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap/css/login.css">

  <style>
    .margen {
      margin: 30px;
    }
  </style>

</head>
<body>
  <div class="container">
    <form class="form-signin">
      <div class="margen">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label for="inputEmail" class="sr-only">Correo electrónico</label>
      <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Correo electrónico" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Contraseña" required>
      <button class="btn btn-lg btn-success btn-block" type="submit">Iniciar sesión</button>
      </div>
    </form>
  </div>
</body>
</html>
