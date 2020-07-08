<?php get_header()?>
<div class="container single">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1 id="headline"><?php the_subtitle()?></h1>
        <div class="introduction">
            <img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" class="thumbnail">
            <div class="text">
                <p class="tips"><?php the_post_data('tips')?></p>
                <p class="contact">
                    <span class="telegram"><?php the_post_data('mobile')?></span>
                    <span class="email"><?php the_post_data('email')?></span>
                </p>
                <div class="quote-quick share">
                    <a href="#feedback" class="quote-btn">Request Quote</a>
                    <div class="rating"><span data-rating='1'></span><span data-rating='2'></span><span data-rating='3'></span><span data-rating='4'></span><span data-rating='5'></span></div>
                </div>
            </div>
        </div>
        <div class="gallery">
<?php
while(have_images('gallery')){
    the_image();
?>
            <a href="<?php the_image_link()?>" target="_blank" title="<?php the_image_title();?>"><img src="<?php if(get_the_image_thumbnail() != '') { the_image_thumbnail();}else{ the_image_link(); }?>" alt="<?php the_image_title();?>" data-description="<?php the_image_description();?>"></a>
<?php } ?>
        </div>
        <div class="content">
<?php the_content();?>
        </div>
        <?php get_template_part('feedback');?> 
        <?php //get_template_part('map');?> 
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
