<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "store";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (isset($_POST['compra'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST['name']);
    $apellido = mysqli_real_escape_string($enlace, $_POST['surname']);
    $email = $_POST['email'];
    $direccion = mysqli_real_escape_string($enlace, $_POST['address']);
    $ciudad = mysqli_real_escape_string($enlace, $_POST['city']);
    $tarjeta = $_POST['card-number'];
    $cvc = $_POST['card-cvc'];
    $celular = $_POST['cell-phone'];

    $insertarDatos = "INSERT INTO compra (nombre, apellido, celular, email, direccion, ciudad, nroTarjeta, cvc) VALUES ('$nombre', '$apellido', '$celular','$email', '$direccion', '$ciudad', '$tarjeta', '$cvc')";
 

    if (mysqli_query($enlace, $insertarDatos)) {

        // Obtener el ID generado por AUTO_INCREMENT
        $idCompra = mysqli_insert_id($enlace);

        // Consultar la fecha de compra
        $consultaFecha = "SELECT fecha_compra FROM compra WHERE id = $idCompra";
        $resultadoFecha = mysqli_query($enlace, $consultaFecha);
        $fila = mysqli_fetch_assoc($resultadoFecha);
        $fecha_compra = $fila['fecha_compra'];

        // Guardar los datos en la sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['email'] = $email;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['nroTarjeta'] = $tarjeta;
        $_SESSION['cvc'] = $cvc;
        $_SESSION['cell-phone'] = $celular;
        $_SESSION['fechaCompra'] = $fecha_compra;
        $_SESSION['idCompra'] = $idCompra;

        // Redirigir a la página de facturación
        header("Location: paginas/facturacion.php");
        exit(); // Asegurarse de que el script termine aquí
    } else {
        echo "Error al insertar datos: " . mysqli_error($enlace);
    }
}
mysqli_close($enlace);
?>

<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Detalles de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "store";

// Conectar a la base de datos
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

// Verificar la conexión
if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['productodes'])) {
    // Imprimir los valores recibidos
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (!empty($_POST['talla']) && !empty($_POST['unidades'])) {
        $talla = mysqli_real_escape_string($enlace, $_POST['talla']);
        $unidades = mysqli_real_escape_string($enlace, $_POST['unidades']);

        // Guardar los datos en la sesión
        $_SESSION['talla'] = $talla;
        $_SESSION['unidades'] = $unidades;

        // Construir la consulta SQL
        $sql = "INSERT INTO pedidos (talla, unidades) VALUES ('$talla', '$unidades')";       

        // Ejecutar la consulta y verificar si es exitosa
        if (mysqli_query($enlace, $sql)) {
            echo "Datos insertados correctamente.";
            // Cerrar la conexión y redirigir después de la inserción exitosa
            mysqli_close($enlace);
            header("Location: paginas/resumenpedido.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
            mysqli_close($enlace);
        }
    } else {
        echo "Por favor seleccione una talla y una cantidad.";
    }
}

// Cerrar la conexión al final del script si aún no se ha cerrado
if ($enlace) {
    mysqli_close($enlace);
}
?>