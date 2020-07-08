<?php get_header()?>
<div class="container category category-gallery">
    <div class="main">
        <h1><?php the_category_name();?></h1>
<?php
$category = get_the_category()[0];
$top = new DM_Query('cat='.$category->cat_ID.'&posts_per_page=1&has_thumbnail=1&no_found_rows=1');
if($top->have_posts()){
    $top->the_post();
?>
        <div class="first">
            <h2><?php the_title();?></h2>
            <span class="pubdate"><?php the_time('Y-m-d');?></span>
            <a href="<?php the_permalink();?>" class="headimg"><img src="<?php the_thumbnail()?>" alt="<?php the_title();?>"></a>
            <p><?php echo dm_trim_words(get_the_excerpt(), 200);?></p>
        </div>
<?php }?>
        <div class="items">
            <ul>
<?php
    $i=1;
while(have_posts()){
    the_post();
    $imgs = get_post_images('gallery');
?>
            <li>
                <a href="<?php the_permalink();?>"><img src="<?php echo $imgs[0]->url?>" alt="<?php echo $imgs[0]->title;?>"></a>
                <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
            </li>
<?php } ?>
            </ul>
        </div>
        <div class="pagination"><?php the_posts_pagination();?></div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
