<main class="contenedor seccion">
<h1>Crear Vendedor</h1>

<?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach; ?>

 <a href= "/public/index.php/propiedades/admin"  class="boton boton-amarillo">volver</a>

     <form class="formulario" method="POST"  enctype="multipart/form-data">
             <?php include __DIR__ . '/formularioV.php';?>
             
             <input type="submit" value="Crear Vendedor" class="boton boton-verde"> 

      </form>
</main>
