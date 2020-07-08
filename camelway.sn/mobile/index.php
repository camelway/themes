<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery Design and Manufacture Concrete Batching Plant avec tous les composants, comme le malaxeur à béton, les lots de granulats, les silos à ciment, les convoyeurs à vis, etc.</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery propose tous les types de bétonnières pour l'industrie de la construction. Haute qualité, prix compétitif, aidez votre entreprise à réussir.</p>
        </a>
        <a href="<?php the_category_link(3);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img>
            <p class="amp-carousle-subtitle">Équipement d'armature, Machine de découpe d'armature, Cintreuse d'armature, Machine de redressage et de découpe d'armature, Améliorez l'efficacité de la construction!</p>
        </a>
        <a href="<?php the_category_link(4);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img>
            <p class="amp-carousle-subtitle">L'usine de concassage de pierre et le broyeur, de grande capacité, à faible coût, font plus de profit pour les propriétaires de carrières.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Equipment Catalog</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink(1);?>"><amp-img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308" layout="responsive"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img></a>
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
