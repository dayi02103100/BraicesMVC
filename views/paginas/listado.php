<div class="contenedor-anuncios">
    <?php foreach($propiedad as $propiedades) { ?>

    <div class="anuncio">
                    <img loading="lazy" src="/public/imagenes/<?php echo $propiedades->imagen; ?>" alt="anuncio">

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedades->titulo; ?></h3>
                    <p class="descripcion"><?php echo $propiedades->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedades->precio; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="/public/build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedades->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="/public/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedades->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="/public/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedades->habitaciones; ?></p>
                        </li>
                    </ul>

                    <a href="propiedad?id=<?php echo $propiedades->id; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>

                    
                </div><!--.contenido-anuncio-->
    </div><!--anuncio-->

    <?php } ?>
    
</div> <!--.contenedor-anuncios-->
