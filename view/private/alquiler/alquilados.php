<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/historial.css">
</head>
<body>
    <h1>Esta es toda tu flota</h1>
    <table>
            <thead>
                <tr>

                    <th>ID alquiler</th>
                    <th>ID coche</th>
                    <th>Email</th>                    
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Dias</th>
                    <th>Precio</th>
                    <th>Reservado</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($alquiler as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['id_alquiler'] . '</td>';
                    echo '<td>' . $value['id'] . '</td>';
                    echo '<td>' . $value['email'] . '</td>';
                    echo '<td>' . $value['marca'] . '</td>';
                    echo '<td>' . $value['modelo'] . '</td>';
                    echo '<td>' . $value['matricula'] . '</td>';
                    echo '<td>' . $value['capacidad'] . '</td>';
                    echo '<td>' . $value['tipo'] . '</td>';
                    echo '<td>' . $value['dias'] . '</td>';
                    echo '<td>' . $value['precio_total'] . '</td>';
                    echo '<td>' . $value['reservado'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
</body>
</html>