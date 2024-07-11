<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
    <form id="login-form" action="doRegister" method="post">
      <h2>Registrar</h2>
      <div class="form-group">
        <label for="username">Email:</label>
        <input type="text" name="email" id="username" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="form-group">
        <label for="password">Comprobacion contraseña:</label>
        <input type="password" name="password-verify" id="password-verify " required>
      </div>
      <div class="form-group">
        <button type="submit" id="login-button">Registrar</button>
      </div>
    </form>
  </div>

</body>
</html>