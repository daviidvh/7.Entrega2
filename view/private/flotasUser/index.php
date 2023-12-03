<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquiCar</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <main>
        <p>Bienvenido: 
            <?php 
            echo($_SESSION['user']['email']);
            ?>
        </p>
        <br>
        <a href="?controller=auth&function=logout">Cerrar Sesion</a>
        <a href="?controller=carrito&function=index">Ir al carrito</a>
        
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Dias</th>



                </tr>
            </thead>
            <tbody>
                <?php
                $flota = new Flota();

                $flota = $flota->findNoReservados()->fetchAll();
                foreach ($flota as $key => $value) {
                    echo '<tr>';
                    echo '<form action="?controller=carrito&function=create&id=' . $value['id'] . '" method="post">';
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