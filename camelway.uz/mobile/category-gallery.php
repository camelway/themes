<?php get_header(); ?>
<div class="container category-entry">
    <h1><?php the_category_name()?></h1>
<?php
$topp = new DM_Query('data_key=banner&posts_per_page=1');
while($topp->have_posts()){
    $topp->the_post();
?>
    <div class="category-entry">
        <h2><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h2>
        <p class="pubdate"><?php the_time("Y-m-d H:i:s")?></p>
        <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_post_data('banner')?>" layout="responsive" width="780" height="270" alt="<?php the_title()?>"></amp-img></a>
        <p><?php echo dm_trim_words(get_the_excerpt(), 255)?></p>
    </div>
<?php  } dm_reset_postdata();?>
</div>

<div class="wrap category-thumb">
    <ul>
<?php 
    while(have_posts()){
        the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_thumbnail()?>" alt="<?php the_title()?>" layout="responsive" width="600" height="350"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img></a>
            <h3><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h3>
        </li>
<?php } ?>
    </ul>
    <div class="pagination">
    <?php the_mobile_posts_pagination(2)?>
    </div>
</div>


<?php get_footer();?>
