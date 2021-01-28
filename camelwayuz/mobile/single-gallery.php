<div class="container main">
    <h1><?php the_subtitle();?></h1>
    <div class="head">
        <div class="pubinfo">
            <span class="pubdate"><?php the_time('Y-m-d');?></span>
            <span class="viewed"><?php echo intval(get_the_meta('viewed')) + 1?></span>
            <a href="#author" class="author"><?php the_author()?></a>
        </div>
        <div class="score"><?php the_ratingValue()?></div>
    </div>
    <div class="gallery-slider">
        <amp-carousel lightbox width="800" height="600" layout="responsive" type="slides" loop>
<?php
while(have_images('gallery')){
    the_image();
    $img = get_the_image_link();
    list($width, $height) = get_image_size($img);
?>
    <amp-img lightbox="hero" src="<?php echo $img?>" <?php the_srcset($img);?> layout="responsive" width="<?php echo $width;?>" height="<?php echo $height;?>"><?php echo webpfallback($img, the_image_title(), $width, $height)?></amp-img>
<?php }?>
        </amp-carousel>
    </div>
    <div class="entry-content">
        <?php the_content();?>
    </div>
    <div class="post-tags"><?php the_tags('', ' ');?></div>
    <div class="rate-share">
        <?php get_template_part('widget', 'rate');?>
        <?php get_template_part('widget', 'share');?>
    </div>
    <div class="post-pagination">
        <span>Keyingi: <?php mobile_next_post_link();?></span>
        <span>Oldingi: <?php mobile_previous_post_link();?></span>
    </div>
    <?php get_template_part('widget', 'form')?>
    <?php get_template_part('widget', 'author')?>
    <?php get_template_part('widget', 'related-machines')?>
</div>
