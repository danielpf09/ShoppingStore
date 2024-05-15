<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "store"; 

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

?>

<?php
if(isset($_POST['compra'])){
    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $email = $_POST['email'];
    $direccion = $_POST['address'];
    $ciudad = $_POST['city'];
    $tarjeta = $_POST['card-number'];
    $cvc = $_POST['card-cvc'];  

    $insertarDatos = "INSERT INTO compra VALUES('$nombre', '$apellido', '$email', '$direccion', '$ciudad', '$tarjeta', '$cvc', '')";

    $ejecutarDatos = mysqli_query($enlace, $insertarDatos);

    if($ejecutarDatos){
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . mysqli_error($enlace);
    }

    mysqli_close($enlace);
    
}
?>
