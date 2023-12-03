<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <h1>Carrito de: <?php echo($_SESSION['user']['email']); ?></h1>
    <a href="?controller=auth&function=home">Volver atras</a>
    <main>
        <table>
            <caption>Resumen de compra</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Dias</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                var_dump($_SESSION['user']['carrito']);
                foreach ($_SESSION['user']['carrito'] as $key => $value) {
                    var_dump($key);
                    echo '<tr>';

                    echo '<td>' . $value['id'] . '</td>';
                    echo '<td>' . $value['marca'] . '</td>';
                    echo '<td>' . $value['modelo'] . '</td>';
                    echo '<td>' . $value['capacidad'] . '</td>';
                    echo '<td>' . $value['tipo'] . '</td>';
                    echo '<td>' . $value['precio'] . '</td>';
                    echo '<td>' . $value['dias'] . '</td>';
                    echo '<td>' .  $value['precio_total'] . '</td>';

                    echo '</tr>';
                    
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>