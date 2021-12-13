<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="stats/css/colors.css">
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '30b5ca47ac3397e41070688ab0209d1be0084019';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</head>
<body>
<div class="modal-dialog text-center">
<div class="col-sm-8 main-section">
<div class="modal-content">
<div class="col-12 user-img">
<img src="img/logito.png" width="190px">
</div>
<form class="col-12" method="post" action="crud.php">
	<div class="form-group" id="user-group">
		<input type="text" class="form-group" placeholder="Nombre de usuario" name=nombreu>
	</div>
	<div class="form-group" id="contrasena-group">
		<input type="password" class="form-group" placeholder="Contraseña" name="password">
	</div>
<button type="submit">Iniciar Sesión</button>
</form>
<div class="col-12 forgot">
<a href="recover.php">Olvide mi contraseña</a>
</div>
<br>
<div class="col-12">
<a href="registrate.php">¿Aún no tienes una cuenta? Registrate</a>
<div class="col-12 forgot">
  <br>
<button onclick="location.href='index.php'">Seguir sin Registrarte</button>
<br>
<br>
</div>

</body>
</html>