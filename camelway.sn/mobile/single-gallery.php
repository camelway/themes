<?php get_header();?>
<div class="container single-header">
    <h1 class="aligncenter"><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h1>
    <p class="pubmeta"><span><?php the_author()?></span> posted this album in <span><?php the_time('Y-m-d')?></span></p>
</div>
<div class="wrap single-image">
     <amp-carousel width="600" height="350" layout="responsive" type="slides" delay="5000" loop>
<?php
while(have_images('gallery')){
    the_image();
    $img = get_the_image_thumbnail() == "" ? get_the_image_link() : get_the_image_thumbnail()
?>
            <a href="<?php the_image_link()?>">
                <amp-img src="<?php echo $img;?>" layout="responsive" width="600" height="350"><?php echo webpfallback($img, get_the_subtitle(), 600, 350)?></amp-img>
                <span class="title"><?php the_image_title()?></span>
            </a>
<?php  } ?>
     </amp-carousel>
</div>
<div class="container single-content">
<?php the_content();?>
<div class="tags"><?php the_mobile_tags(' ', ' ')?></div>
</div>
<div class="container post_nav">
    <p><?php mobile_next_post_link() ?> &gt;&gt;</p>
    <p>&lt;&lt;<?php mobile_previous_post_link() ?></p>
</div>
<?php get_template_part('form')?>
<div class="container related">
    <h3>Related Products</h3>
    <ul>
<?php $ps = new DM_Query('category__in=1,2,3,4,5,6,7&posts_per_page=6&orderby=rand');
while($ps->have_posts()){
    $ps->the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>" class="thumbnail"><amp-img src="<?php the_thumbnail()?>" layout="responsive" width="600" height="350" alt="<?php the_subtitle()?>"></a>
            <h3><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h3>
            <p class="price"><?php echo dm_trim_words(get_the_excerpt(), 200);?> - <?php the_time('Y-m-d');?></p>  
        </li>
<?php } dm_reset_postdata();?>
    </ul>
</div>
<?php get_footer()?>
