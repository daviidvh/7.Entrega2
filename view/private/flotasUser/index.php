<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/flota.css">
</head>

<body>
    <main>
        <h1>AlquiCar</h1>
        <p>Bienvenido: 
            <?php 
            echo($_SESSION['user']['email']);
            ?>
        </p>
        <br>
        <a href="logout">Cerrar Sesion</a>
        <a href="ver-carrito">Ir al carrito</a>
        <a href="mis-alquileres">Tu historial</a>
        
        
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Dias</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($flota as $key => $value) {
                    echo '<tr>';
                    echo '<form action="alquilar-coche?id=' . $value['id'] . '" method="post">';
                    echo '<td>' . $value['marca'] . '</td>';
                    echo '<td>' . $value['modelo'] . '</td>';
                    echo '<td>' . $value['capacidad'] . '</td>';
                    echo '<td>' . $value['tipo'] . '</td>';
                    echo '<td>' . $value['precio'] . '</td>';
                    echo '<td>';
                    echo '<input type="number" name="dias" min="1" required>';
                    echo '</td>';
                    echo '<td>';
                    echo '<button type="submit">Alquilar</button>';
                    echo '</td>';
                    echo '</form>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>