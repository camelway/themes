<?php get_header()?>
<div class="container category category-news">
    <div class="main">
        <h1><?php the_category_name();?></h1>
        <div class="explain"><?php the_category_content();?></div>
        <div class="items">
            <ul>
<?php
while(have_posts()){
    the_post();
    if(!has_thumbnail()) continue;
?>
            <li>
                <a href="<?php the_permalink();?>">
                    <img src="<?php the_thumbnail()?>" alt="<?php the_title()?>">
                </a>
                <h3><?php the_subtitle()?></h3>
            </li>
<?php } ?>
            </ul>
        </div>
        <div class="pagination"><?php the_posts_pagination(3);?></div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
