<div class="feedback" id="feedback">
   <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Presupuesto gratis</p>
        <p class="slogan">Obtenga una cotización directamente del fabricante.</p>
        <p class="description">Los especialistas del departamento de ventas de Camelway Plant responderán todas sus preguntas de lunes a domingo de 08:00 a 20:00.</p>
        <p><input type="text" name="user_name" placeholder="Nombre (requerido):" required></p>
        <p><input type="text" name="user_mobile" placeholder="Teléfono: (requerido):" required></p>
        <p><input type="text" name="user_email" placeholder="Correo electrónico:"></p>
        <p><input type="text" name="content" placeholder="Ingresa los detalles de su solicitud (requerido)" required></p>
        <p><input type="submit" value="Solicita una oferta"></p>
    </form>
</div>
