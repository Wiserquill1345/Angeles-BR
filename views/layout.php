<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION["login"] ?? null;
if (!isset($inicio)) {
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angeles Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <h2 class="nav-titulo">ANGELES <span>BIENESRAICES</span></h2>
                </a>
                <div class="derecha">
                    
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <button type="button" class="open-menu-btn">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </button>
                    <nav class="menu">
                        <button type="button" class="close-menu-btn"></button>
                        <ul>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropbtn">Desarrollos </a>
                                <i>▼</i>
                                <ul class="sub-menu">
                                    <li class="dropdown">
                                        <a href="javascript:void(0)"><span>Ruba</span></a>
                                        <i>▼</i>
                                        <ul class="sub-menu sub-menu-right">
                                            <li><a href="/desarrollos/monet"><span>Monet</span></a></li>
                                            <li><a href="/desarrollos/paseoSantiago"><span>Paseo de Santiago</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)"><span>Ruba</span></a>
                                        <i>▼</i>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/propiedades">Propiedades</a></li>
                            <li><a href="/nosotros">Nosotros</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                            <?php if ($auth): ?>
                                <li> <a href="/logout">Cerrar Sesión</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos exclusivos de lujo</h1>" : ""; ?>
        </div>
    </header>
    <?php echo $contenido; ?>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros.html">Nosotros</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>