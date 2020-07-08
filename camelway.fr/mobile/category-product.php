<?php get_header();?>
<div class="wrap category-entry">
    <h1><?php the_category_name()?></h1>
    <div class="category-content">
    <?php the_category_content();?>
    </div>
    <div class="action">
        <?php get_template_part('share')?>
        <a class="rfq" href="#feedback">Citation Requise</a>
    </div>
</div>

<div class="wrap category-list">
    <ul>
<?php while(have_posts()){
    the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_thumbnail()?>" alt="<?php the_title()?>" layout="responsive" width="600" height="350"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350)?></amp-img></a>
            <h2><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h2>
            <a href="<?php the_mobile_permalink()?>"><?php echo dm_trim_words(get_the_excerpt(), 255)?></a>
        </li> 
<?php } ?>
    </ul>
</div>
<?php get_template_part('form');?>
<?php get_footer();?>
