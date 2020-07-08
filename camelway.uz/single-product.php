<?php get_header()?>
<div class="container single">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1><?php the_subtitle()?></h1>
        <div class="introduction">
            <img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" class="thumbnail">
            <div class="text">
                <p class="tips"><?php the_post_data('tips')?></p>
                <p class="contact">
                    <span class="telegram"><?php the_post_data('mobile')?></span>
                    <span class="email"><?php the_post_data('email')?></span>
                </p>
                <div class="ya-share2 share" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,viber,whatsapp,telegram"></div>
            </div>
        </div>
        <div class="gallery">
<?php
while(have_images('gallery')){
    the_image();
    $img = get_the_image_thumbnail() ? get_the_image_thumbnail() : get_the_image_link();
?>
            <img src="<?php echo $img?>" alt="<?php the_image_title();?>" title="<?php the_image_title();?>" data-description="<?php the_image_description();?>">
<?php } ?>
        </div>
        <div class="content">
<?php the_content();?>
        </div>
        <?php get_template_part('feedback');?> 
        <?php get_template_part('map');?> 
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
