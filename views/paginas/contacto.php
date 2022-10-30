<h1 class="fw-300 centrar-texto">Contacto</h1>
<?php if($mensaje) { ?>
<p class="alerta exito"> <?php echo $mensaje; ?></p>;
<?php }?>
<img src="/build/img/destacada3.jpg" alt="Imagen Principal">

<main class="contenedor seccion contenido-centrado">
    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">
            
           


            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>


       <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[opciones]">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[presupuesto]">

        </fieldset>

    <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" >

                <label for="contactar-email">E-mail</label>
                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" >
            </div>
            <div id="contacto"></div>
   

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>