<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Presupuesto gratis</p>
        <p class="slogan">Estamos ubicados en Lima y somos fabricantes.</p>
        <p class="description">Los expertos del departamento de ventas de fábrica de Camelway responderán todas sus preguntas de lunes a domingo de 06:00 a 20:00 (hora de Lima).</p>
        <p><input type="text" name="user_name" placeholder="Tu nombre(obligatorio)" required></p>
        <p><input type="text" name="user_mobile" placeholder="Su numero de telefono(obligatorio)" required></p>
        <p><input type="email" name="user_email" placeholder="Tu correo electrónico"></p>
        <p><input type="text" name="content" placeholder="Ingrese los detalles de su solicitud(obligatorio)" required></p>
        <p><input type="submit" value="Solicite un presupuesto"></p>
        <input type="hidden" name="lang" value="es">
    </form>
</div>