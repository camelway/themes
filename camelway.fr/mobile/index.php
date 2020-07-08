<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery conçoit et fabrique la centrale à béton avec toutes les composantes,par exemple:malaxeur à béton,trémie d'agrégat,silo à ciment,vis à ciment etc. </p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery  fournit tous les types de malaxeur à béton pour l'industrie de construction.haute qualité,prix concurrentiel,aider vos business avec succès.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Equipement de fer à béton,machine à couper le fer à béton,machine à cintrer le fer à béton,machine à dresser et couper le fer à béton améliorent l'efficacité de construction.</p>
        </a>
        <a href="<?php the_category_link(6);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Station de concassage de pierre et concasseur,grande capacité mais petit coût,amènent bcp de bénéfices pour les prioritaires de carrière.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Catalogue d'équipement</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
            <a href="<?php echo $c->get_permalink(1);?>"><amp-img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308" layout="responsive"><?php echo webpfallback($c->cat_thumbnail, $c->cat_name, 525, 308)?></amp-img></a>
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
