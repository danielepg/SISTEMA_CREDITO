<?php
include './backend/config.php'; 
if(isset($_POST['nombre_usuario']) && isset($_POST['password_usuario']))
{
	$nombre_usuario = $_POST['nombre_usuario'];
	$password_usuario = $_POST['password_usuario'];
    $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND password_usuario = '$password_usuario'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $IDUSUARIO = $fila['ID_USUARIO'];
        $IDROL = $fila['ID_ROL'];

		$_SESSION['nombre_usuario'] = $nombre_usuario;
		$_SESSION['ID_USUARIO']= $IDUSUARIO;
		$_SESSION['ID_ROL'] = $IDROL;
		
		header("Location: ./public/dashcredito.php"); // Redirigir a la página de bienvenida
    } else {
        
		header("Location: index.php");
    }

  }
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="../public/css/login.css">
  <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

  <style>
   body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #54983B, #F6EEC9);
    font-family: Arial, sans-serif;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.login-box {
    background: rgba(255, 255, 255, 0.1);
    padding: 70px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(10px);
    text-align: center;
}

.login-box h2 {
    margin: 0 0 20px;
    padding: 0;
    color: #fff;
}

.input-box {
    position: relative;
    margin-bottom: 30px;
}

.input-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 26px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
}

.input-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: 0.5s;
}

.input-box input:focus ~ label,
.input-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #FFFFFF;
    font-size: 15px;
}

button {
    background: #799351;
    border: none;
    padding: 10px 20px;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s ease;
}

button:hover {
    background: #006769;
}

a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

a:hover {
    color: #88d498;
}

.tracking-in-expand-fwd-top{
  -webkit-animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
	        animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
}
@-webkit-keyframes tracking-in-expand-fwd-top {
  0% {
    letter-spacing: -0.5em;
    -webkit-transform: translateZ(-700px) translateY(-500px);
            transform: translateZ(-700px) translateY(-500px);
    opacity: 0;
  }
  40% {
    opacity: 0.6;
  }
  100% {
    -webkit-transform: translateZ(0) translateY(0);
            transform: translateZ(0) translateY(0);
    opacity: 1;
  }
}
@keyframes tracking-in-expand-fwd-top {
  0% {
    letter-spacing: -0.5em;
    -webkit-transform: translateZ(-700px) translateY(-500px);
            transform: translateZ(-700px) translateY(-500px);
    opacity: 0;
  }
  40% {
    opacity: 0.6;
  }
  100% {
    -webkit-transform: translateZ(0) translateY(0);
            transform: translateZ(0) translateY(0);
    opacity: 1;
  }
}

  </style>

</head>

<body style="background-color:rgb(69 215 129);" class="position-fixed top-0 end-0 start-0 bottom-0 d-flex justify-content-center align-items-center">
<div class="login-container">
<form action="index.php"method="POST">
        <div class="login-box">
            <h2 class="tracking-in-expand-fwd-top">Iniciar Sesión</h2>
            <form>
                <div class="input-box">
                    <input type="text" name="nombre_usuario" required>
                    <label>Usuario</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password_usuario" required>
                    <label>Contraseña</label>
                </div>
                <button type="submit" name="entrar">Entrar</button>
            </form>
        </div>
        </form>
    </div>
</body>

</html>