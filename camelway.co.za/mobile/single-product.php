<?php get_header();?>
<div class="container single-header">
    <h1><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h1>
    <amp-img src="<?php the_thumbnail()?>" layout="responsive" width="600" height="350" alt="<?php the_subtitle()?>"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img>
    <p><?php the_post_data('tips')?></p>
    <div class="contact">
        <p class="mobile"><?php the_post_data('mobile')?></p>
        <p class="email"><?php the_post_data('email')?></p>
    </div>
    <div class="action">
        <?php get_template_part('share')?>
        <a class="rfq" href="#feedback">Request Quote</a>
    </div>
</div>
<?php if(get_the_data('gallery')){ ?>
<div class="container single-gallery">
<?php
    while(have_images('gallery')){
        the_image();
        $img = get_the_image_thumbnail() != '' ? get_the_image_thumbnail() : get_the_image_link();
?>
        <a href="<?php the_image_link()?>"><amp-img src="<?php echo $img;?>" alt="<?php the_image_title()?>" layout="responsive" width="600" height="350px"><?php echo webpfallback($img, get_the_image_title(), 600, 350)?></amp-img></a>
<?php } ?>
</div>
<?php } ?>
<div class="container single-content">
<?php the_content();?>
</div>
<?php get_template_part('form');?>

<div class="wrap related">
    <h3>Related Products</h3>
    <ul>
<?php $ps = new DM_Query('category__in=1,2,3,4,5,6,7&posts_per_page=6&orderby=rand');
while($ps->have_posts()){
    $ps->the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>" class="thumbnail"><amp-img src="<?php the_thumbnail()?>" layout="responsive" width="600" height="350" alt="<?php the_subtitle()?>"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img></a>
            <h4><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h4>
            <p class="price">$<?php the_data('lowprice')?> - $<?php the_data('highprice')?></p>
        </li>
<?php } dm_reset_postdata();?>
    </ul>
</div>

<?php get_footer();?>
