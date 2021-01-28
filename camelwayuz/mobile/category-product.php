<ul class="container category-catalog">
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
    <li class="cat-<?php echo $cat->cat_ID;?>"><a href="<?php echo $cat->get_permalink(1)?>"><?php echo $cat->cat_name?></a></li>
<?php } ?>
</ul>
<div class="container main">
        <h1 class="title"><?php the_category_name()?></h1>
        <div class="entry-content">
            <?php the_category_content();?>
        </div>
        <ul class="product-items">
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> layout="responsive" alt="<?php the_subtitle()?>" width="300" height="175"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 300, 175)?></amp-img></a>
                <h3><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a> <span class="hot"></span></h3>
                <p class="excerpt"><?php echo dm_trim_words(get_the_excerpt(), 100);?></p>
                <div class="action"><a href="<?php the_mobile_permalink()?>" class="more">Ko'proq &gt;&gt;</a> <a href="<?php echo the_mobile_permalink()?>#quote" class="quote">Iqtibos oling</a></div>
            </li>
<?php } ?>
        </ul>
    <?php get_template_part('widget', 'form');?>
    <?php get_template_part('widget', 'company');?>
</div>
