<?php
session_start();
$servername='localhost';
$username='root';
$password='usbw';
$dbname = "olociltab";
$conn=mysqli_connect($servername,$username,$password,"$dbname");


$usuario = $_POST['nombreu'];
$clave = $_POST['password'];

$q = "SELECT * FROM usuarios WHERE usuario='$usuario' and pssw= '$clave'";
$consulta = mysqli_query($conn,$q);
$array = mysqli_num_rows($consulta);

if ($array>0) {

header("location: indexpssw.php");
}else{
	echo '<script type="text/javascript">
    alert("Usuario o contraseña invalido/a");
    window.location.href="index.php";
    </script>';

}
$_SESSION['usuario'] = $usuario;
$_SESSION['nombre'] = $nombre;
$_SESSION['passw'] = $clave;
?>
<?php
include_once 'connectiodb.php';



if(isset($_POST['save']))
{    
    session_start();
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $usuario = $_POST['usuario'];
     $edad = $_POST['edad'];
     $correo = $_POST['correo'];
     $pssw = $_POST['pssw'];
     $direccion = $_POST['direccion'];
     $sql = "INSERT INTO usuarios (nombre,apellido,usuario,edad,correo,pssw,direccion)
     VALUES ('$nombre','$apellido','$usuario','$edad','$correo','$pssw','$direccion')";
     if (mysqli_query($conn, $sql)) {
        header("location:indexpssw.php");



        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>

<?php
include_once 'connectiodb.php';
$user = isset($_POST["nombreu"]) ? $_POST["nombreu"] : "" ;

    
    $psw = isset($_POST["password"]) ? $_POST["password"] : "" ;

