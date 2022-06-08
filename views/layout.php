<?php 

    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienes Raices</title>
        <link rel="stylesheet" href="/public/build/css/app.css">
    </head>
    <body>
        
        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="index">
                        <img src="/public/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                    </a>
    
                    <div class="mobile-menu">
                        <img src="/public/build/img/barras.svg" alt="icono menu responsive">
                    </div>
    
                    <div class="derecha">
                        <img class="dark-mode-boton" src="/public/build/img/dark-mode.svg">
                        <nav class="navegacion">
                            <a href="nosotros">Nosotros</a>
                            <a href="propiedades">Anuncios</a>
                            <a href="blog">Blog</a>
                            <a href="contacto">Contacto</a>
                            <?php if(!$auth): ?>
                                <a href="/login.php">Inicio</a>
                            <?php endif; ?>
                            <?php if($auth): ?>
                                <a href="/admin/inicio.php">Admin</a>
                            <?php endif; ?>
                            <?php if($auth): ?>
                                <a href="/cerrar-sesion.php">Cerrar Sesion</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                    
                </div> <!--.barra-->
    
                <?php
                    if($inicio){
                        echo"<h1>Venta de casa y departamentos exclusivos de lujo</h1>";
                    }
               ?> 
            </div>
        </header>


<?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('d-D-Y'); ?> &copy;</p>
    </footer>
            
            <script src="/public/build/js/bundle.min.js"></script>
</body>
</html>