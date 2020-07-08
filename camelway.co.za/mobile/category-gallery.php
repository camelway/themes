<?php get_header(); ?>
<div class="container category-entry">
    <h1><?php the_category_name()?></h1>
<?php
$topp = new DM_Query('data_key=banner&posts_per_page=1');
while($topp->have_posts()){
    $topp->the_post();
?>
    <div class="category-sticky">
        <h2><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h2>
        <p class="pubdate"><?php the_time("Y-m-d H:i:s")?></p>
        <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_post_data('banner')?>" layout="responsive" width="780" height="270" alt="<?php the_title()?>"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img></a>
        <p><?php echo dm_trim_words(get_the_excerpt(), 255)?></p>
    </div>
<?php  } dm_reset_postdata();?>
</div>

<div class="wrap category-thumb">
    <ul>
<?php 
    $p = 0;
    while(have_posts()){
        the_post();
        if($p%5!=rand(0,4)):
?>
        <li>
            <h2><a href="<?php the_mobile_permalink()?>"><?php the_title()?></a></h2>
            <div class="images">
<?php
$images = get_post_images('gallery');
$i = 0;
foreach($images as $image){
    if($i==3) break;
    $src = empty($image->thumbnail)? $image->url : $image->thumbnail;
    $alt = empty($image->title) ? get_the_subtitle() : $image->title;
?>
            <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php echo $src;?>" alt="<?php echo $alt;?>" layout="responsive" width="600" height="350"><?php echo webpfallback($src, $alt, 600, 350)?></amp-img></a>
<?php $i++;} ?>
            </div>
            <div class="pubmeta"><?php the_author()?>, <?php the_time('Y-m-d');?></div>
        </li>
<?php else: ?>
        <li>
            <h2><a href="<?php the_mobile_permalink()?>"><?php the_title()?></a></h2>
            <p class="excerpt"><a href="<?php the_mobile_permalink()?>"><?php echo dm_trim_words(get_the_excerpt(), 180)?></a></a>
            <div class="pubmeta"><?php the_author()?>, <?php the_time('Y-m-d');?></div>
        </li>

<?php endif; $p++;} ?>
    </ul>
</div>

<div class="container pagination">
    <?php the_mobile_posts_pagination(2)?>
</div>


<?php get_footer();?>
