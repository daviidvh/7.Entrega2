<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlquiCar</title>
  </head>
  <body>
    <main>
      <form method="post" action="?controller=flota&function=save">
        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca" /><br />
        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" name="modelo" /><br />
        <label for="matricula">Matricula</label>
        <input type="text" id="matricula" name="matricula" /><br />
        <label for="capacidad">Capacidad</label>
        <input type="number" id="capacidad" name="capacidad" /><br />
        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" /><br />
        <label for="precio">Precio</label>
        <input type="number" step="0.01"  id="precio" name="precio" /><br />
        <label for="reservado">Reservado</label>
        <select id="reservado" name="reservado">
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
        <br />
        <button id="enviar">Enviar</button>
      </form>
    </main>
  </body>
</html>
