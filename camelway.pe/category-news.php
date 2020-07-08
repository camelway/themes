<?php get_header()?>
<div class="container category category-news">
    <div class="main">
        <h1><?php the_category_name();?></h1>
        <div class="items">
            <ul>
<?php
while(have_posts()){
    the_post();
?>
            <li>
	<img src="<?php the_thumbnail()?>" alt="<?php the_title();?>">
                <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
                <span class="pubdate"><?php the_time('Y-m-d');?></span>
                <p><?php echo dm_trim_words(get_the_excerpt(), 200);?></p>
                <a href="<?php the_permalink();?>" class="more">Lee más &gt;&gt;</a>
            </li>
<?php } ?>
            </ul>
        </div>
        <div class="pagination"><?php the_posts_pagination(3, '&ltAnterior', 'Próximo&gt');?></div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
