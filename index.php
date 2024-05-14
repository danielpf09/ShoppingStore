<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "store"; 

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realizar Compra - Kraken Store</title>
    <link rel="stylesheet" href="../css/pedido.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      rel="stylesheet" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="nav-logo">
          <img src="../imagenes/logo.webp" alt="Logo de la Tienda" />
        </div>
        <ul class="nav-menu left">
          <li><a href="../index.html">Inicio</a></li>
          <li><a href="#">Sobre Nosotros</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a
              href="../shoppingStore/pagina/consultarInventario.html">Inventario</a></li>
        </ul>
        <ul class="nav-menu right">
          <div class="profile-edit">
            <i class="fa-regular fa-user"></i> <a href="#">Editar perfil</a>
          </div>
        </ul>
      </nav>
    </header>

    <div class="container">
      <!-- Resumen del Pedido -->
      <div class="order-summary">
        <h2>RESUMEN DEL PEDIDO</h2>
        <div class="item">
          <div class="item-image">
            <img src="../imagenes/Pantalon/Img1.webp" alt="Producto" />
          </div>
          <div class="item-details">
            <p>Pantalón formal en mezcla de mohair</p>
            <p>Precio: COP 4,729,300</p>
            <p>Total: COP 4,729,300</p>
          </div>
        </div>
        <p>Total de productos: COP 4,729,300</p>
      </div>

      <!-- Dirección de Facturación -->
      <div class="billing-address">
        <h2>DIRECCIÓN DE FACTURACIÓN</h2>
        <form action="../index.php" method="POST">
          <tr>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" />
          </tr>
          <tr>
            <label for="surname">Apellido:</label>
            <input type="text" id="surname" name="surname" />
          </tr>
          <tr>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" />
          </tr>
          <tr>
            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" />
          </tr>
          <tr>
            <label for="city">Ciudad:</label>
            <input type="text" id="city" name="city" />
          </tr>

          <h2>PAGO</h2>
          <label>
            <input type="radio" name="paymentMethod" value="card" checked />
            Tarjeta de crédito o de débito
            <i class="fa-solid fa-credit-card"></i>
          </label>
          <div class="credit-card-info">
            <label for="card-number">Número de la tarjeta*</label>
            <input type="text" id="card-number" name="card-number" />

            <label for="card-expiration-month">Fecha de caducidad*</label>
            <select id="card-expiration-month" name="card-expiration-month">
              <option>Mes</option>
              <option value="1">01</option>
              <!-- Más opciones de mes -->
            </select>
            <select id="card-expiration-year" name="card-expiration-year">
              <option>Año</option>
              <option value="2021">2021</option>
              <!-- Más opciones de año -->
            </select>

            <label for="card-cvc">Código de seguridad*</label>
            <input type="text" id="card-cvc" name="card-cvc" />
          </div>

          <!-- Opción de PayPal -->
          <label>
            <input type="radio" name="paymentMethod" value="paypal" />
            PayPal
            <i class="fa-brands fa-paypal"></i>
          </label>

          <!-- Condiciones y botón de pago -->
          <p>
            <input type="checkbox" /> He leído y acepto las
            <a href="#">Condiciones de Venta</a>.
          </p>
        </form>
        <a href="../paginas/facturarion.html"><button class="view-product-btn" type="reset" name="compra">Generar factura</button></a>
      </div>
    </div>

    <footer>
      <p>© 2024 Kraken Store - Todos los derechos reservados.</p>
    </footer>
  </body>
</html>


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
