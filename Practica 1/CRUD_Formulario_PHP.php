<?php
$codigo=$_GET["id"];
$producto=$_GET["producto"];
$descripcion=$_GET["descripcion"];
$cantidad=$_GET["cantidad"];
$precio=$_GET["precio"];

$servidor="localhost";
$usuario="root";
$password="";
$bd="xavier_colom";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    echo "Se ha establecido correctamente la conexión a la base de datos";

    $sql="INSERT INTO `productos`(`id`, `producto`, `descripcion`, `cantidad`,`precio`) 
    VALUES ($codigo,'$producto','$descripcion',$cantidad,$precio)";
    
    $consulta=mysqli_query($con,$sql);

    if(!$consulta){
        die("No se ha podido realizar el insert");
    }else{
        echo "El insert se ha realizado correctamente";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
    <?php
        $sql2="SELECT * FROM `productos`";
        $consulta=mysqli_query($con,$sql2);
        while($fila=$consulta->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["id"]."</td>";
            echo "<td>".$fila["producto"]."</td>";
            echo "<td>".$fila["descripcion"]."</td>";
            echo "<td>".$fila["cantidad"]."</td>";
            echo "<td>".$fila["precio"]."</td>";
            echo "</tr>";
        }
    ?>
    </table>
    <form action="/logout.php" method="post">
</form>
</body>
</html>
<?php
}
?>