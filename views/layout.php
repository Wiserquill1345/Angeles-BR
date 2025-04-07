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
    <title>Gascón Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <h2 class="nav-titulo">GASCÓN <span>BIENESRAICES</span></h2>
                </a>
                <div class="derecha">
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
                                            <li><a href="/desarrollos/altaria"><span>Altaria</span></a>
                                            </li>
                                            <li><a href="/desarrollos/camille"><span>Camille</span></a>
                                            </li>
                                            <li><a href="/desarrollos/granAlameda"><span>Gran Alameda</span></a>
                                            </li>
                                            <li><a href="/desarrollos/quintaGranadaIII"><span>Quinta Granada III</span></a>
                                            </li>
                                            <li><a href="/desarrollos/palermo"><span>Palermo</span></a>
                                            </li>
                                            <li><a href="/desarrollos/corceles"><span>Corceles</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--<li class="dropdown">
                                        <a href="javascript:void(0)"><span>Corceles</span></a>
                                        <i>▼</i>
                                        <ul class="sub-menu sub-menu-right">
                                            <li><a href="/desarrollos/monet"><span>Monet</span></a></li>
                                            <li><a href="/desarrollos/paseoSantiago"><span>Paseo de Santiago</span></a>
                                            </li>
                                            <li><a href="/desarrollos/altaria"><span>Altaria</span></a>
                                            </li>
                                            <li><a href="/desarrollos/camille"><span>Camille</span></a>
                                            </li>
                                            <li><a href="/desarrollos/granAlameda"><span>Gran Alameda</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)"><span>Palermo</span></a>
                                        <i>▼</i>
                                        <ul class="sub-menu sub-menu-right">
                                            <li><a href="/desarrollos/monet"><span>Monet</span></a></li>
                                            <li><a href="/desarrollos/paseoSantiago"><span>Paseo de Santiago</span></a>
                                            </li>
                                            <li><a href="/desarrollos/altaria"><span>Altaria</span></a>
                                            </li>
                                            <li><a href="/desarrollos/camille"><span>Camille</span></a>
                                            </li>
                                            <li><a href="/desarrollos/granAlameda"><span>Gran Alameda</span></a>
                                            </li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </li>
                            <!-- <li><a href="/propiedades">Propiedades</a></li> -->
                            <li><a href="/nosotros">Nosotros</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                            <?php if ($auth): ?>
                                <li> <a href="/logout">Cerrar Sesión</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                </div>
            </div>
            <?php echo $inicio ? "<h1>Venta/Renta de Casas y Departamentos</h1>" : ""; ?>
        </div>
    </header>
    <?php echo $contenido; ?>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <!-- <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy;</p> -->
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>