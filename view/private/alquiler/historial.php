<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/historial.css">
</head>
<body>
    <h1>Estos son los coches alquilados por el usuario <?php echo $_SESSION['user']['email']; ?> </h1>
       <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Dias</th>
                    <th>Precio</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($alquiler as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['marca'] . '</td>';
                    echo '<td>' . $value['modelo'] . '</td>';
                    echo '<td>' . $value['capacidad'] . '</td>';
                    echo '<td>' . $value['tipo'] . '</td>';
                    echo '<td>' . $value['dias'] . '</td>';
                    echo '<td>' . $value['precio_total'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
</body>
</html>