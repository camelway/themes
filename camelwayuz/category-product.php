<div class="container breadcrumb"><?php breadcrumb_nav();?></div>
<ul class="container category-catalog">
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
    <li class="cat-<?php echo $cat->cat_ID;?>"><a href="<?php echo $cat->get_permalink()?>"><?php echo $cat->cat_name?></a></li>
<?php } ?>
</ul>
<div class="container main">
    <div class="content">
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
                <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" width="600" height="350"></a>
                <h3><a href="<?php the_permalink()?>"><?php the_subtitle()?></a> <span class="hot"></span></h3>
                <p class="excerpt"><?php echo dm_trim_words(get_the_excerpt(), 100);?></p>
                <div class="action"><a href="<?php the_permalink()?>" class="more">Ko'proq &gt;&gt;</a> <a href="<?php echo the_permalink()?>#quote" class="quote">Iqtibos oling</a></div>
            </li>
<?php } ?>
        </ul>
        <?php get_template_part('widget', 'company');?>
        <?php get_template_part('widget', 'form');?>
    </div>
    <?php get_sidebar();?>
    <div class="clearfix"></div>
</div>
