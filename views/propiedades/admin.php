
<main class="contenedor seccion">
        <h1>Aministrador de bienes raices</h1>

         <?php

if(isset($resultado)){
            $mensaje = mostrarNotificacion(intval($resultado));
                
            if($mensaje) { ?> 
                <p class="alerta exito"><?php echo s($mensaje)?></p> 
             <?php 
             } 
          }
        ?>
       
    

        <h2>Propiedades</h2>
        <a href="crear" class="boton boton-verde">Nueva propiedad</a>
        <a href="../vendedores/crear" class="boton boton-amarillo">Nuevo vendedor</a>


    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($propiedades as $propiedad): ?>
            <tr>
                <!--<//?php echo $propiedad['id'];?>-->
                <td class="linea">  <?php echo $propiedad->id;?>      </td>
                <td class="linea">  <?php echo $propiedad->titulo;?>  </td>
                <td class="linea"> <img src= "/public/imagenes/<?php echo $propiedad->imagen;?> " class="imagen-tabla"></td>
                <td class="linea"> $<?php echo $propiedad->precio;?>  </td>
                <td class="linea">

                    <form method="POST" class="w-100" action="eliminar">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                    <input type="hidden" name="tipo" value="propiedad">

                    <input type="submit" class="boton-azul-block" value="eliminar">
                    </form>

                    <a href="actualizar?id=<?php echo $propiedad->id;?>" class="boton-Nclaro-block Nclaro">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--TABLA VENDEDORES-->

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($vendedores as $vendedor): ?>
            <tr>
                <!--<//?php echo $propiedad['id'];?>-->
                <td class="linea">  <?php echo $vendedor->id;?>      </td>
                <td class="linea">  <?php echo $vendedor->nombre ;?>  </td>
                <td class="linea">  <?php echo $vendedor->apellido;?>  </td>
                <td class="linea">  <?php echo $vendedor->telefono;?>  </td>
                <td class="linea">

                    <form method="POST" class="w-100" action="../vendedores/eliminar">
                    <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                    <input type="hidden" name="tipo" value="vendedor">

                    <input type="submit" class="boton-azul-block" value="eliminar">
                    </form>

                    <a href="../vendedores/actualizar?id=<?php echo $vendedor->id;?>" class="boton-Nclaro-block Nclaro">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>    