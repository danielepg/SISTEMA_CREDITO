<link rel="stylesheet" href="bootstrap/css/DASHBOARD.css">
<?php include 'DASHBOARD.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Empleado</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

<div class="container mt-5">
  <h2>Formulario de Empleado</h2>
  <form>
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="text" class="form-control" id="apellido" placeholder="Ingrese el apellido">
    </div>
    <div class="form-group">
      <label for="email">Correo Electrónico:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese el correo electrónico">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="text" class="form-control" id="telefono" placeholder="Ingrese el teléfono">
    </div>
    <div class="form-group">
      <label for="departamento">Departamento:</label>
      <select class="form-control" id="departamento">
        <option>Seleccionar departamento</option>
        <option>Ventas</option>
        <option>Marketing</option>
        <option>Finanzas</option>
        <option>Recursos Humanos</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>

</body>
</html>
