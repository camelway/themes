<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery Design and Manufacture Concrete Batching Plant with all components, like concrete mixer, aggregate batchers, cement silos, screw conveyor, etc.</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery offers all types of concrete mixers for construction industry. High quality, competitive price, help your business success.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Rebar equipment, Rebar cutting machine, Rebar bending machine, Rebar straightening adn cutting machine, Improve construction efficiency!</p>
        </a>
        <a href="<?php the_category_link(6);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Stone Crushing Plant and Crusher, high capacity, low cost, make more profit for quarry owners.</p>
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
