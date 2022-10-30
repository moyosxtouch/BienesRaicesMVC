<h1 class="fw-300 centrar-texto">Contacto</h1>
<img src="/build/img/destacada3.jpg" alt="Imagen Principal">

<main class="contenedor seccion contenido-centrado">
    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">
            
            <label for="email">E-mail: </label>
            <input type="email" id="email" placeholder="Tu Correo electrónico" required name="contacto[email]">

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" placeholder="Tu Teléfono" required name="contacto[telefono]">

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
   <p>Si eligió Teléfono, elija la fecha y la hora</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]>
            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>