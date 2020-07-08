<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">¡QUERIDOS SOCIOS! ¡ESTAMOS LISTOS PARA ASESORARTE EN CUALQUIER TIPO DE COMPONENTES PARA PLANTAS DE HORMIGÓN, DEJE LA APLICACIÓN Y NUESTROS ESPECIALISTAS LE DEVOLVERÁN EN EL TIEMPO MÁS CORTO!</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Vendemos varios mezcladores de concreto, incluyendo mezcladores de concreto de doble eje, mezcladores de concreto por gravedad, mezcladores de concreto de mezcla forzada, mezcladores de concreto y mezcladores de concreto con bombas.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway ofrece una amplia gama de equipos para procesar barras de refuerzo, incluidas máquinas para doblar barras de refuerzo, máquinas para cortar barras de refuerzo, máquinas para moldear barras de refuerzo, máquinas para conectar barras de refuerzo y máquinas para pretensar barras de refuerzo, etc.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Catálogo de equipos</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(6,7)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink(1);?>"><amp-img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308" layout="responsive"></amp-img><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></a>
            </div>
            <div class="description">
                <h2><a href="<?php echo $c->get_permalink(1)?>"><?php echo $c->cat_name;?></a></h2>
                <p><a href="<?php echo $c->get_permalink(1);?>"><?php echo dm_trim_words($c->cat_description, 450);?></a></p>
            </div>
        </li>
<?php }
?>
    </ul>
</div>
<?php get_template_part('form');?>
<?php get_footer();?>
