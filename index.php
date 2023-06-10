<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="titulo">Examen final Leonel Lemus</h1>

    <?php
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=Final_carnet_1139', 'root', '', $pdo_options);
if (isset($_POST["accion"])){
    if ($_POST["accion"] == "Crear"){
        $insert = $conexion->prepare("INSERT INTO alumno (Carnet,Nombre,Grado,Telefono) VALUES (:Carnet, :Nombre,:Grado,:Telefono)");
        $insert->bindValue('carnet', $_SPOT['Carnet']);
        $insert->bindValue('nombre', $_SPOT['Nombre']);
        $insert->bindValue('dpi', $_SPOT['Grado']);
        $insert->bindValue('direccion', $_SPOT['Telefono']);
        $indert->execute();
    }
}

$select = $conexion->query("SELECT Carnet, Nombre, Grado, Telefono FROM alumno");
    ?>
    <table class="tabla">
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Grado</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($select->fetchAll() as $Alumno) { ?>
                <tr>
                    <td class=""> <?php echo $Alumno["Carnet"]?> </td>
                    <td> <?php echo $Alumno["Nombre"]?> </td>
                    <td> <?php echo $Alumno["Grado"]?> </td>
                    <td> <?php echo $Alumno["Telefono"]?> </td>
            </tr>

            <?php }?>
    </table>

    
</body>
</html>