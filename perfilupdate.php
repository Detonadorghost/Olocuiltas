<?php
session_start();
include_once 'connectiodb.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE usuarios set nombre='" . $_POST['nombre'] . "', apellido='" . $_POST['apellido'] . "', usuario='" . $_POST['usuario'] . "' ,edad='" . $_POST['edad'] . "' ,correo='" . $_POST['correo'] . "' ,pssw='" . $_POST['pssw'] . "', direccion='" . $_POST['direccion'] . "' WHERE usuarioid='" . $_GET['usuarioid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuarioid='" . $_GET['usuarioid'] . "'");
$row= mysqli_fetch_array($result);
?>
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

<title>Actualizar Perfil</title>
</head>
<body style="text-align: center;">
<form name="frmUser" method="post" action="" class="form-group">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="perfil.php">Perfil</a>
</div>
Nombre de Usuario: <br>
<input type="text" name="usuario" class="txtField" value="<?php echo ['usuario']; ?>">

<br>
Nombre: <br>
<input type="text" name="nombre" class="txtField" value="<?php echo ['nombre']; ?>">
<br>
Apellido:<br>
<input type="text" name="apellido" class="txtField" value="<?php echo ['apellido']; ?>">
<br>
edad:<br>
<input type="text" name="edad" class="txtField" value="<?php echo ['edad']; ?>">
<br>
correo:<br>
<input type="text" name="correo" class="txtField" value="<?php echo ['correo']; ?>">
<br>
Contraseña:<br>
<input type="text" name="pssw" class="txtField" value="<?php echo ['pssw']; ?>">
<br>
Dirección:<br>
<input type="text" name="direccion" class="txtField" value="<?php echo ['direccion']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Modificar" class="buttom">

</form>
</body>
</html>