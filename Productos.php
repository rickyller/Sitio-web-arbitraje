<!DOCTYPE html>
<?php

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÁrbitroZMG - Productos</title>
    <link rel="stylesheet" href="Estilos.css">
</head>
<body>
    <div class="div-1">
        <div class="logo">
            <a href="Pagina%20arbitro%201.php">
                <img src="Images\logo1png.png" alt="ÁrbitroZMG">
            </a>
        </div>
        <div id="botones-header">
            <a href="login.html" class="boton-iniciar-sesion">Iniciar sesión</a>
            <a href="Registro.html" class="boton-registrarse">Registro</a>
            <form action="carrito.php" method="post">
                <a href="carrito.php">
                    <img src="Images\carrito-icono.png" alt="ÁrbitroZMG">
                </a>
            </form>
        </div>
        <h1 id="titulo">ÁrbitroZMG</h1>
    </div>
    <nav>
        <div class="div-2">
            <a href="Pagina%20arbitro%201.php" class="menu">Inicio</a>
            <a href="descripcion.php" class="menu">Descripción</a>
            <a href="productos.php" class="menu">Productos</a>
            <a href="Ubicación.html" class="menu">Ubicación</a>
        </div>
    </nav>
    <div>
        <h1 id="subtitulo">Productos</h1>
    </div>
    <table>
        <tr>
            <td>
                <img src="Images/[removal.ai]_silbato.png">
                <h2>Silbato Acme</h2>
                <p>$349</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="1">
                    <input type="hidden" name="nombre" value="Silbato Acme">
                    <input type="hidden" name="precio" value="349">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/[removal.ai]_maleta.png">
                <h2>Maleta deportiva Athix</h2>
                <p>$599</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="2">
                    <input type="hidden" name="nombre" value="Maleta deportiva Athix">
                    <input type="hidden" name="precio" value="599">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/[removal.ai]_tarjetas.png">
                <h2>Tarjeta amarilla y roja</h2>
                <p>$99</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="3">
                    <input type="hidden" name="nombre" value="Tarjeta amarilla y roja">
                    <input type="hidden" name="precio" value="99">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <img src="Images/[removal.ai]_correa.png">
                <h2>Correa para silbato</h2>
                <p>$59</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="4">
                    <input type="hidden" name="nombre" value="Correa para silbato">
                    <input type="hidden" name="precio" value="59">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/[removal.ai]_moneda.png">
                <h2>Moneda para sorteo</h2>
                <p>$99</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="5">
                    <input type="hidden" name="nombre" value="Moneda para sorteo">
                    <input type="hidden" name="precio" value="99">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/[removal.ai]_banderines.png">
                <h2>Banderines para árbitros asistentes</h2>
                <p>$149</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="6">
                    <input type="hidden" name="nombre" value="Banderines para árbitros asistentes">
                    <input type="hidden" name="precio" value="149">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <img src="Images/tenis.png">
                <h2>Tenis Athix</h2>
                <p>$899</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="7">
                    <input type="hidden" name="nombre" value="Tenis Athix">
                    <input type="hidden" name="precio" value="899">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/playera.png">
                <h2>Playera temporada 2022-2023</h2>
                <p>$499</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="10">
                    <input type="hidden" name="nombre" value="Playera temporada 2022-2023">
                    <input type="hidden" name="precio" value="499">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
            <td>
                <img src="Images/libro.png">
                <h2>Libro reglas del juego</h2>
                <p>$199</p>
                <form action="agregar-al-carrito.php" method="post">
                    <input type="hidden" name="id" value="11">
                    <input type="hidden" name="nombre" value="Libro reglas del juego">
                    <input type="hidden" name="precio" value="199">
                    <button class="agregar-carrito" type="submit" name="agregar-al-carrito">Agregar al carrito</button>
                </form>
            </td>
        </tr>
    </table>
</body>
<footer class="div-footer" style="background-color: white; text-decoration: none; text-align: left;">
    <a href="Politica-de-privacidad.html" style="color: white; text-decoration: none;">Derechos de autor © 2023 ÁrbitroZMG. Todos los derechos reservados. <br> Política de privacidad <br> </a>
    <a href="tel:3322206205" style="color: white; text-decoration: none;">Contáctanos: 33 2220 6205 <br></a>
    <a href="mailto:ricardomurillo.udg@gmail.com" style="color: white; text-decoration: none;">ricardomurillo.udg@gmail.com</a>
</footer>
</html>
