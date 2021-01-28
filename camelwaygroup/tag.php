<?php get_header();?>
<div class="container tag">
    <div class="main">
        <h1><?php the_tag_title();?></h1>
        <p class="description"><?php the_tag_description()?></p>
        <div class="results">
<?php
while(have_posts()){
    the_post();
    $images = get_images();
    if(count($images) == 0){
?>
            <div class="item">
                <h2><a href="<?php the_permalink();?>"><?php the_subtitle()?></a></h2>
                <p><?php echo dm_trim_words(get_the_excerpt(), 255);?></p>
                <span class="pubdate"><?php the_time('M j, Y H:i')?></span>
            </div>            
<?php } elseif(count($images) <= 2){
$url = $images[0];
 ?>

            <div class="item">
                <img src="<?php echo dminfo('ajax_url').'?action=cropimage&f='.urlencode($url).'&width=200'?>" alt="<?php the_title()?>" width="200" height="150" class="thumbnail">
                <h2><a href="<?php the_permalink();?>"><?php the_subtitle()?></a></h2>
                <p><?php echo dm_trim_words(get_the_excerpt(), 255);?></p>
                <span class="pubdate"><?php the_time('M j, Y H:i')?></span>
            </div>

<?php } elseif(count($images) > 2){ ?>
            <div class="item">
                <h2><a href="<?php the_permalink();?>"><?php the_subtitle()?></a></h2>
                <p><?php echo dm_trim_words(get_the_excerpt(), 255);?></p>
                <div class="thumbnails">
<?php 
foreach($images as $key=>$image){
    if($key==3)
        break;
?>
                    <a href="<?php the_permalink()?>"><img src="<?php echo dminfo('ajax_url').'?action=cropimage&f='.urlencode($image).'&width=315&height=235'?>" alt="<?php the_title()?>" width="315" height="235"></a>
<?php } ?>
                </div>
                <span class="pubdate"><?php the_time('M j, Y H:i')?></span>
            </div>
<?php } } ?>
        </div>
<?php if(found_posts() > get_option('posts_per_page')){ ?>
        <div class="loadmore" data-offset="<?php echo get_option('posts_per_page')?>" data-id="<?php the_tag_ID()?>">Load More</div>
<?php } ?>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?>   
        <?php get_template_part('sidebar', 'tag');?>
        <?php get_template_part('sidebar', 'share');?>
    </div>
    <div class="clearfix"></div>
</div>

<?php get_footer();?>