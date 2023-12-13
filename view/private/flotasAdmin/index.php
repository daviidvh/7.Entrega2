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
        <a href="logout">Cerrar Sesion</a>
        <a href="create">Crear Coche</a>
        <a href="alquilados">Ver Alquilados</a>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                             <a href="edit-coche?id=' . $value['id'] . '" class="edit-button">Editar</a>
                             <a href="destroy-coche?id=' . $value['id'] . '" class="delete-button">Eliminar</a>
                 </td>';
                             echo '</tr>';
                }     ?>
            </tbody>
        </table>
    </main>
</body>

</html>