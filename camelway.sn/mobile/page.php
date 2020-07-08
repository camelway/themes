<?php get_header();?>
<div class="container single-content">
    <h1 class="aligncenter"><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h1>
    <?php the_content();?>
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
            <p class="price">$<?php the_data('lowprice')?> - $<?php the_data('highprice')?></p>
        </li>
<?php } ?>
    </ul>
</div>
<?php get_footer()?>
