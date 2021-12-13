<?php
session_start();
$usuario = "root";
$clave = "pssw";


if (!$enlace = mysql_connect('localhost', 'root', 'usbw')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('olociltab', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}

$sql="SELECT nombre FROM usuarios WHERE usuario='$usuario' and pssw= '$clave";
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: ' ". mysql_error();
    exit;
}

while ($fila = mysql_fetch_assoc($resultado)) {
    $nombre=$fila['nombre'];
}

mysql_free_result($resultado);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="stats/css/index.css">
	<title></title>
</head>
<body>
<table class="table">
<tr>
<td>ID</td>	
<td>Nombre</td>
<td>Apellido</td>
<td>Usuario</td>
<td>Edad</td>
<td>Correo</td>
<td>Contraseña</td>
<td>Dirección</td>
</tr>
<?php



?>
<td><?php echo $row["usuarioid"]; ?></td>
<td><?php echo $nombre; ?></td>
<td><?php echo $row["apellido"]; ?></td>
<td><?php echo $row["usuario"]; ?></td>
<td><?php echo $row["edad"]; ?></td>
<td><?php echo $row["correo"]; ?></td>
<td><?php echo $row["pssw"]; ?></td>
<td><?php echo $row["direccion"]; ?></td>
<td><a href="perfilupdate.php?usuarioid=<?php echo $row["usuarioid"]; ?>">Update</a></td>
</tr>
<?php

?>
</table>
</body>
</html>