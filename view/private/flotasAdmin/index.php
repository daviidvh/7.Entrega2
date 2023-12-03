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
        <a href="?controller=auth&function=logout">Cerrar Sesion</a>
        <a href="?controller=flota&function=create">Crear coche</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Capacidad</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Reservado</th>


                </tr>
            </thead>
            <tbody>
                <?php
                         $flota = new Flota();

                         $flota = $flota->findAll()->fetchAll();
                         foreach ($flota as $key => $value) {
                             echo '<tr>';
                             echo '<td>' . $value['id'] . '</td>';
                             echo '<td>' . $value['marca'] . '</td>';
                             echo '<td>' . $value['modelo'] . '</td>';
                             echo '<td>' . $value['matricula'] . '</td>';
                             echo '<td>' . $value['capacidad'] . '</td>';
                             echo '<td>' . $value['tipo'] . '</td>';
                             echo '<td>' . $value['precio'] . '</td>';
                             echo '<td>' . $value['reservado'] . '</td>';

                             echo '<td>
                     <a href="?controller=flota&function=edit&id=' . $value['id'] . '">Editar</a>
                     <a href="?controller=flota&function=destroy&id=' . $value['id'] . '">Eliminar</a>
                 </td>';
                             echo '</tr>';
                }     ?>
            </tbody>
        </table>
    </main>
</body>

</html>