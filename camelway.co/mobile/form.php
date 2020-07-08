<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Presupuesto Gratis</p>
        <p class="slogan">Obtenga una cotización directamente del fabricante.</p>
        <p class="description">Los especialistas del departamento de ventas de Camelway Plant responderán todas sus preguntas de lunes a domingo de 08:00 a 20:00.</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Nombre (requerido):" required></p>
            <p><input type="text" name="user_mobile" placeholder="Teléfono: (requerido):" required></p>
            <p><input type="email" name="user_email" placeholder="Correo electrónico:"></p>
            <p><input type="text" name="content" placeholder="Ingresa los detalles de su solicitud (requerido)" required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="Enviar">
            </p>
        </form>
    </div>
</div>
