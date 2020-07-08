<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>Camelway Machinery</em>
        <p>Camelway se especializa en producir todas las clases de la planta de hormigón, la Hormigonera, la máquinas de fabricación de arena, la línea de producción de agregados de arena, etc., y puede proporcionarle una gama completa de soluciones para su proyecto.</p>
    </div>

    <div class="banner">
        <ul class="images">
            <li><a href="<?php the_category_link(1);?>"><img src="<?php dminfo('template_url')?>images/banner1.jpg" alt="<?php the_category_name(1);?>"></a></li>
            <li><a href="<?php the_category_link(5);?>"><img src="<?php dminfo('template_url')?>images/banner2.jpg" alt="<?php the_category_name(5);?>"></a></li>
            <li><a href="<?php the_category_link(7);?>"><img src="<?php dminfo('template_url')?>images/banner3.jpg" alt="<?php the_category_name(7);?>"></a></li>
            <li><a href="<?php the_category_link(3);?>"><img src="<?php dminfo('template_url')?>images/banner4.jpg" alt="<?php the_category_name(3);?>"></a></li>
        </ul>
        </ul>
        <ul class="text">
            <li>Camelway Machinery diseña y fabrica todos los componentes de planta de hormigón, como mezcladora de concreto, distribuidor de pesaje de agregados, silo de cemento, transportador de tornillo, etc.</li>
            <li>Camelway Machinery ofrece todos tipos de hormigoneras utilizadas en la industria de la construcción. Con la alta calidad y el precio favorable lo ayudarán a tener éxito.</li>
            <li>¡El equipo de barra de acero, la máquina de corte de barra de acero, la máquina dobladora de barra de acero, la máquina de enderezado y corte de barra de acero, mejoran la eficiencia de la construcción!</li>
            <li>Las plantas de trituración y trituradoras de gran capacidad y bajo costo pueden aportar más beneficios a las canteras.</li>
        </ul>
    </div>
</div>

<div class="container index-product-showroom">
    <h1>Catálogo de Productos</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink();?>"><img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308"></a>
            </div>
            <div class="description">
                <h2><a href="<?php echo $c->get_permalink()?>"><?php echo $c->cat_name;?></a></h2>
                <p><?php echo dm_trim_words($c->cat_description, 450);?></p>
                <a href="<?php echo $c->get_permalink()?>" class="more">Aprende más</a>
                <a href="<?php echo $c->get_permalink()?>#feedback" class="inquiry">Obtener cotización</a>
            </div>
        </li>
<?php } 
?>
    </ul>

</div>

<div class="container full-feedback">
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
    <?php //get_template_part('map');?> 
    <div class="clearfix"></div>
</div> 

<div class="index-footer">
    <div class="container">
        <div class="foot-logo">
            <img src="<?php dminfo('template_url')?>/images/foot-logo.png" alt="camelway">
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y')?> Camelway Machinery  <a href="https://www.camelway.fr/centrale-a-beton/">Centrale à Béton</a> | <a href="https://www.camelway.fr/centrale-d-enrobage/">Centrale d'enrobage</a> | <a href="https://www.camelway.fr/station-de-concassage/">Station de Concassage</a> | <a href="https://www.camelway.ru/byetohhiy-zavod/">Бетонный завод</a> | <a href="https://www.camelway.ru/byetohhiy-zavod/">Асфальтовый завод</a> | <a href="https://www.camelway.ru/kamhyedrobeelhiy-zavod/">Камнедробильный завод</a></p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>chatonline.js"></script>
<script src="<?php dminfo('template_url');?>jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        var banner_imgs = $('.banner .images li');
        var banner_txts = $('.banner .text li');
        var index = 0;
        function play(index){
            banner_imgs.eq(index).siblings().fadeOut(300, function(){
                 banner_imgs.eq(index).fadeIn(10);
            });
            banner_txts.eq(index).siblings().fadeOut(200, function(){
                banner_txts.eq(index).fadeIn(20);
            });
            setTimeout(function(){
                index++;
                if(index==banner_imgs.length)
                    index = 0;
                play(index);
            }, 5000);
        }
        play(index);
    });
    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(',');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>
