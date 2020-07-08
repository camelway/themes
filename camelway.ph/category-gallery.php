<?php get_header()?>
<div class="container category category-news">
    <div class="main">
        <h1><?php the_category_name();?></h1>
<?php
$cat = get_category();
$cat_id = $cat->cat_ID;
$topposts = get_posts("numberposts=1&category={$cat_id}&data_key=banner");
if(!empty($topposts) && !is_paged()){
$toppost = $topposts[0];
?>
        <div class="sticky-post">
            <h2><?php echo $toppost->post_subtitle;?></h2>
            <span class="pubdate"><?php echo $toppost->post_date;?></span>
            <a href="<?php echo $toppost->get_permalink()?>" class="headimg"><img src="<?php echo $toppost->post_banner?>" alt="<?php echo $toppost->post_subtitle;?>"></a>
            <p><?php echo dm_trim_words($toppost->post_excerpt, 255);?></p>
        </div>
<?php } ?>



        <div class="items">
            <ul>
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <a href="<?php the_permalink();?>">
                    <img src="<?php the_thumbnail()?>" alt="<?php the_subtitle();?>">
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

