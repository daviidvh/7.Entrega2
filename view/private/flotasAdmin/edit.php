<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AlquiCar</title>
  <link rel="stylesheet" href="asset/css/createEdit.css">

</head>

<body>
  <main>
    <?php
         foreach ($flota as $key => $value) {
           $marca = $value['marca'];
           $modelo = $value['modelo'];
           $matricula = $value['matricula'];
           $capacidad = $value['capacidad'];
           $tipo = $value['tipo'];
           $precio = $value['precio'];
           $reservado = $value['reservado'];
         }


    ?>
    <form method="post" action="update-coche?id=<?php echo $id; ?>">
          <label for="marca">Marca</label>
          <input type="text" value="<?php echo $marca; ?>" id="marca" name="marca" /><br />
          <label for="modelo">Modelo</label>
          <input type="text" value="<?php echo $modelo; ?>" id="modelo" name="modelo" /><br />
          <label for="matricula">Matricula</label>
          <input type="text" value="<?php echo $matricula; ?>" id="matricula" name="matricula" /><br />
          <label for="capacidad">Capacidad</label>
          <input type="number" value="<?php echo $capacidad; ?>" id="capacidad" name="capacidad" /><br />
          <label for="tipo">Tipo</label>
          <input type="text" value="<?php echo $tipo; ?>" id="tipo" name="tipo" /><br />
          <label for="precio">Precio</label>
          <input type="number" step="0.01" value="<?php echo $precio; ?>" id="precio" name="precio" /><br />
          <label for="reservado">Reservado</label>
          <select id="reservado" name="reservado">
        <option value="Si" <?php if ($reservado == 'Si') echo 'selected'; ?>>Si</option>
        <option value="No" <?php if ($reservado == 'No') echo 'selected'; ?>>No</option>
      </select>
      <br />
      <button id="enviar">Actualizar</button>
    </form>
  </main>
</body>

</html>