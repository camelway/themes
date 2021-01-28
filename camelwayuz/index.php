<?php get_header()?>
<div class="primary-banner">
    <div class="items">
        <a href="<?php the_category_link(1)?>" style="background-image:url('<?php dminfo('template_url')?>images/banner-1.jpg')"></a>
        <a href="<?php the_category_link(1)?>" style="background-image:url('<?php dminfo('template_url')?>images/banner-2.jpg')"></a>
        <a href="<?php the_permalink(1)?>" style="background-image:url('<?php dminfo('template_url')?>images/banner-3.jpg')"></a>
    </div>
</div>

<div class="container index-catalog">
    <h2 class="title">Mahsulot katalogi</h2>
    <ul class="product-items">
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6)));
foreach($cats as $cat){
?>
        <li>
            <a href="<?php echo $cat->get_permalink()?>"><img src="<?php echo $cat->cat_thumbnail?>" <?php the_srcset($cat->cat_thumbnail);?> alt="<?php echo $cat->cat_name?>"></a>
            <h3><a href="<?php echo $cat->get_permalink()?>"><?php echo $cat->cat_name?></a></h3>
            <p><?php echo dm_trim_words($cat->cat_description, 120)?></p>
            <div class="action"><a href="<?php echo $cat->get_permalink()?>" class="more">Ko'proq &gt;&gt;</a> <a href="<?php echo $cat->get_permalink()?>#quote" class="quote">Iqtibos oling</a></div>
        </li>
<?php }?>
    </ul>
</div>

<div class="container index-gallery">
    <div class="headline">
        <h2 class="title">Ommabop rasmlar</h2>
        <a href="<?php the_category_link(8)?>" class="more">Ko'proq +</a>
    </div>
    <ul class="items">
<?php
    $posts = new DM_Query(array('category__in'=>array(8), 'posts_per_page'=>10, 'has_thumbnail'=>1));
    while($posts->have_posts()){
        $posts->the_post();
?>
        <li><a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" width="600" height="350"></a></li>
<?php } dm_reset_postdata();?>
    </ul>
</div>

<div class="container index-posts">
    <div class="headline">
        <h2 class="title">Yangiliklar va xabarlar</h2>
        <a href="<?php the_category_link(9)?>" class="more">Ko'proq +</a>
    </div>
    <ul class="items">
<?php
    $posts = new DM_Query(array('category__in'=>array(9), 'posts_per_page'=>4, 'has_thumbnail'=>1));
    while($posts->have_posts()){
        $posts->the_post();
?>
    <li>
        <div class="thumbnail"><img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" width="600" height="350"></div>
        <div class="text"> 
            <a href="<?php the_permalink()?>"><?php the_title()?></a>
            <div class="pubinfo"><span class="pubdate"><?php the_time('Y-m-d')?></span><span class="viewed"><?php echo intval(get_the_meta('viewed'))?></span></div>
            <p><?php echo dm_trim_words(get_the_excerpt(), 90);?></p>
        </div>
    </li>
<?php
}
dm_reset_postdata();
while(have_posts()){
    the_post();
?>
        <li>
            <a href="<?php the_permalink()?>"><?php the_title()?></a>
            <div class="pubinfo"><span class="pubdate"><?php the_time('Y-m-d')?></span><span class="viewed"><?php echo intval(get_the_meta('viewed'))?></span></div>
        </li>
<?php } ?>
    </ul>
</div>

<?php get_template_part('widget', 'form-map')?>
<?php get_footer()?>
