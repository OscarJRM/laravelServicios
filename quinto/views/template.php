<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Agrega el enlace a la biblioteca de iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Agrega el enlace a tu archivo de estilos -->
    <link rel="stylesheet" href="css/estiloNav.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?action=inicio"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="index.php?action=html"><i class="fas fa-code"></i> HTML</a></li>
            <li><a href="index.php?action=jquery"><i class="fas fa-jquery"></i> jQuery</a></li>
        </ul>
    </nav>

    <?php
    require_once("controllers/controller.php");
    require_once("models/model.php");
    $mvc=new MvcController();
    $mvc->enlacesPaginaController();
    ?>

    <!-- Agrega tu footer aquí -->
    <footer>
        <p>© 2024 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
