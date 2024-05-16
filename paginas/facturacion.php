<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
  session_start();  
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Facturación</title>
  <link rel="stylesheet" href="../css/compra.css" />
  <link rel="stylesheet" href="../css/pedido.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="nav-logo">
        <img src="../imagenes/logo.webp" alt="Logo de la Tienda" />
      </div>
      <ul class="nav-menu left">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Sobre Nosotros</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="../shoppingStore/pagina/consultarInventario.html">Inventario</a></li>
      </ul>
      <ul class="nav-menu right">
        <div class="profile-edit">
          <i class="fa-regular fa-user"></i> <a href="#">Editar perfil</a>
        </div>
      </ul>
    </nav>
  </header>
  <div>
    <h2>Generador de Factura</h2>
    <div id="factura">
    <div>
        <label for="date">Fecha de compra:</label>
        <?php echo $_SESSION['fechaCompra']; ?>
      </div>
      <div>
        <label for="id">Número de factura:</label>
        <?php echo $_SESSION['idCompra']; ?>
      </div>
      <div>
        <label for="nombre">Nombre del Cliente:</label>
        <?php echo $_SESSION['nombre']; echo $_SESSION['apellido'];?>
      </div>
      <div>
        <label for="email">Email del Cliente:</label>
        <?php echo $_SESSION['email']; ?>
      </div>
      <div>
        <label for="cell-phone">Celular:</label>
        <?php echo $_SESSION['cell-phone']; ?>
      </div>
      <div>
        <label for="direccion">Dirección de Facturación:</label>
        <?php echo $_SESSION['direccion']; ?>
      </div>
      <div>
        <label for="city">Ciudad:</label>
        <?php echo $_SESSION['ciudad']; ?>
      </div>

      <table id="productos">
        <tr>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Precio unitario</th>
          <th>Total</th>
        </tr>
        <tr>
          <td>Pantalón formal en mezcla de mohair</td>
          <td id="cantidad_camisas">1</td>
          <td>COP 4,729,300</td>
          <td id="total_camisas">COP 4,729,300</td>
        </tr>        
      </table>

      <div id="totales">
        <p>Subtotal: <span id="subtotal">COP 4,729,300</span></p>
        <p>Impuestos: <span id="impuestos">$0</span></p>
        <p>Total: <span id="total">COP 4,729,300</span></p>
      </div>
    </div>
    <button id="generate-pdf">Descargar factura</button>   
  </div>
  <br>

  <footer>
    <p>© 2023 Kraken Store - Todos los derechos reservados.</p>
  </footer>

  <script src="../js/compra.js"></script>

</body>

</html>