<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/loginRegistro.css">
</head>
<body>
  <header>
  <?php
            if(isset($_SESSION['mensaje'])){
                echo "<h1 style='color:red;'>".$_SESSION['mensaje']."</h1>";
            }
        ?>
  </header>
  <div class="container">
    <form id="login-form" action="doLogin" method="post">
      <h2>Iniciar sesión</h2>
      <div class="form-group">
        <label for="username">Usuario:</label>
        <input type="text" name="email" id="username" >
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="form-group">
        <button type="submit" id="login-button" >Iniciar sesion</button>
        <a href="register">Registrar</a>

      </div>
    </form>
  </div>

</body>
</html>