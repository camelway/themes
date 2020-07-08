<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery diseña y fabrica todos los componentes de planta de hormigón, como mezcladora de concreto, distribuidor de pesaje de agregados, silo de cemento, transportador de tornillo, etc.</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery ofrece todos tipos de hormigoneras utilizadas en la industria de la construcción. Con la alta calidad y el precio favorable lo ayudarán a tener éxito.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">¡El equipo de barra de acero, la máquina de corte de barra de acero, la máquina dobladora de barra de acero, la máquina de enderezado y corte de barra de acero, mejoran la eficiencia de la construcción!</p>
        </a>
        <a href="<?php the_category_link(6);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Las plantas de trituración y trituradoras de gran capacidad y bajo costo pueden aportar más beneficios a las canteras.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Catálogo de Productos</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink(1);?>"><amp-img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308" layout="responsive"></amp-img></a>
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
