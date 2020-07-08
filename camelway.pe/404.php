<?php get_header();?>
<div class="container notfound">
    <div class="main">
        <h1>404 no encontrado</h1>
        <h2>No puede encontrar esta página, si desea comprar equipo, contáctenos directamente</h1>
        <div class="feedback">
            <form action="<?php dminfo('feedback_url')?>" method="post">
            <p class="headline">Mensaje en línea</p>
            <p class="slogan">24 horas al día, 365 días al año.</p>
            <p class="description">¿Cuáles son sus necesidades, puede dejar un mensaje, nosotros respondemos</p>
            <p><input type="text" name="user_name" placeholder="Por favor, introduzca su nombre."></p>
            <p><input type="text" name="user_email" placeholder="Por favor, introduzca su dirección de correo electrónico"></p>
            <p><input type="text" name="user_mobile" placeholder="Por favor, introduzca su número de teléfono."></p>
            <p><input type="text" name="content" placeholder="Por favor,Introduzca los detalles de su solicitud (obligatorio)"></p>
            <p><input type="submit" value="para enviar"></p>
            <input type="hidden" name="lang" value="es">
            </form>
        </div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>