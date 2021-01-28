<?php get_header();?>
<div class="primary-banner wrap">
     <div class="items">
<amp-carousel width="800" height="260" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_mobile_category_link(1);?>"><amp-img src="<?php dminfo('template_url')?>images/mobile-banner-1.jpg" layout="responsive" width="800" height="260"></amp-img></a>
        <a href="<?php the_mobile_category_link(1);?>"><amp-img src="<?php dminfo('template_url')?>images/mobile-banner-2.jpg" layout="responsive" width="800" height="260"></amp-img></a>
        <a href="<?php the_mobile_permalink(1);?>"><amp-img src="<?php dminfo('template_url')?>images/mobile-banner-3.jpg" layout="responsive" width="800" height="260"></amp-img></a>
</amp-carousel>
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
            <a href="<?php echo $cat->get_permalink(1)?>"><amp-img src="<?php echo $cat->cat_thumbnail?>" <?php the_srcset($cat->cat_thumbnail);?> alt="<?php echo $cat->cat_name?>" layout="responsive" width="525" height="308"></amp-img></a>
            <h3><a href="<?php echo $cat->get_permalink(1)?>"><?php echo $cat->cat_name?></a></h3>
            <p><?php echo dm_trim_words($cat->cat_description, 120)?></p>
            <div class="action"><a href="<?php echo $cat->get_permalink(1)?>" class="more">Ko'proq &gt;&gt;</a> <a href="<?php echo $cat->get_permalink(1)?>#quote" class="quote">Iqtibos oling</a></div>
        </li>
<?php }?>
    </ul>
</div>

<div class="container index-gallery">
    <div class="headline">
        <h2 class="title">Ommabop rasmlar</h2>
        <a href="<?php the_mobile_category_link(8)?>" class="more">Ko'proq +</a>
    </div>
    <ul class="items">
<?php
    $posts = new DM_Query(array('category__in'=>array(8), 'posts_per_page'=>10, 'has_thumbnail'=>1));
    while($posts->have_posts()){
        $posts->the_post();
?>
        <li><a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" layout="responsive" width="300" height="175"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 300, 175)?></amp-img></a></li>
<?php } dm_reset_postdata();?>
    </ul>
</div>

<div class="container index-posts">
    <div class="headline">
        <h2 class="title">Yangiliklar va xabarlar</h2>
        <a href="<?php the_mobile_category_link(9)?>" class="more">Ko'proq +</a>
    </div>
    <ul class="items">
<?php
    $posts = new DM_Query(array('category__in'=>array(9), 'posts_per_page'=>4, 'has_thumbnail'=>1));
    while($posts->have_posts()){
        $posts->the_post();
?>
    <li>
    <div class="thumbnail"><amp-img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" layout="responsive" width="300" height="175"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 300, 175)?></amp-img></div>
        <div class="text"> 
            <a href="<?php the_mobile_permalink()?>"><?php the_title()?></a>
            <div class="pubinfo"><span class="pubdate"><?php the_time('Y-m-d')?></span><span class="viewed"><?php echo intval(get_the_meta('viewed'))?></span></div>
            <p><?php echo dm_trim_words(get_the_excerpt(), 150);?></p>
        </div>
    </li>
<?php
}
dm_reset_postdata();
while(have_posts()){
    the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>"><?php the_title()?></a>
            <div class="pubinfo"><span class="pubdate"><?php the_time('Y-m-d')?></span><span class="viewed"><?php echo intval(get_the_meta('viewed'))?></span></div>
            <p><?php echo dm_trim_words(get_the_excerpt(), 120);?></p>
        </li>
<?php } ?>
    </ul>
</div>
<?php get_footer();?>
