<?php get_header(); ?>
<h1><?php echo get_query_var('s')?></h1>
<div class="wrap category-blog">
    <ul>
<?php 
    while(have_posts()){
        the_post();
?>
        <li>
<?php if(has_thumbnail()){ ?>
            <a href="<?php the_mobile_permalink()?>" class="thumbnail"><amp-img src="<?php the_thumbnail()?>" alt="<?php the_title()?>" layout="responsive" width="600" height="350"></amp-img></a>
            <h3><a href="<?php the_mobile_permalink()?>"><?php the_title()?></a></h3>
            <p class="meta"><?php the_author()?>, <?php the_time('Y-m-d')?></p>
<?php }else{ ?>
            <h3><a href="<?php the_mobile_permalink()?>"><?php the_title()?></a></h3>
            <p class="excerpt"><?php echo dm_trim_words(get_the_excerpt(), 100)?></p>
            <p class="meta"><?php the_author()?>, <?php the_time('Y-m-d')?></p>
<?php } ?>
        </li>
<?php } ?>
    </ul>
    <div class="pagination">
    <?php the_mobile_posts_pagination(2)?>
    </div>
</div>
<?php get_template_part('form')?>

<?php get_footer();?>
