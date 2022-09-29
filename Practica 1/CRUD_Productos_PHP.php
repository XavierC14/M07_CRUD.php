<?php
$conexion=mysqli_connect('localhost','root','','xavier_colom');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CRUD_Productos_CSS.css"  rel="stylesheet" type="text/css">
    <title>CRUD_Productos</title>
</head>
<header>
    <h1>CRUD de Productos</h1>
    <button id = "boton1" type = "button" name = "botonCrear" style = "cursor: pointer;"><a href="CRUD_Formulario_HTML.html">Nuevo Producto</a></button>
</header>
<body>
    <table align="center">
        <tr>
            <th>id</th>
            <th>producto</th>
            <th>descripcion</th>
            <th>cantidad</th>
            <th>precio</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        $sql="SELECT * from productos";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id']?></td>
            <td><?php echo $mostrar['producto']?></td>
            <td><?php echo $mostrar['descripcion']?></td>
            <td><?php echo $mostrar['cantidad']?></td>
            <td><?php echo $mostrar['precio']?></td>
            <td><button id = "2" type = "button" name = "botonVer" style = "cursor: pointer;">Ver</button></td>
            <td><button id = "3" type = "button" name = "botonEditar" style = "cursor: pointer;">Editar</button></td>
            <td><button id = 4 type = "button" name = "botonEliminar" style = "cursor: pointer;">Eliminar</button></td>
        </tr>
        <?php
        extract($_GET);
        if(@$idborrar==4){
            $sqlborrar="DELETE FROM productos WHERE id=$id";
            $resborrar=mysqli_query($conexion,$sqlborrar);
        }
        ?>
        <?php
        }
        ?>
    </table>
</body>
</html>
