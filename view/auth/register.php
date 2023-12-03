<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="container">
    <form id="login-form" action="?controller=auth&function=doRegister" method="post">
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
        <input type="password" name="password-verify" id="password" required>
      </div>
      <div class="form-group">
        <button type="submit" id="login-button">Registrar</button>
      </div>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>