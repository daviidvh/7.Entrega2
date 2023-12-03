<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="container">
    <form id="login-form" action="?controller=auth&function=doLogin" method="post">
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
      </div>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>