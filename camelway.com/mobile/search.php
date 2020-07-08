<?php get_header(); ?>
<div class="container search-entry">
    <form class="search" method="get" action="<?php echo home_url();?>index.php" target="_top">
        <input type="text" name="s" value="<?php echo get_search_query();?>">
        <input type="submit" class="icon-search" value="&#xe90e;">
        <input type="hidden" name="mobile" value="1">
    </form>
    <ul class="cols-1">
<?php
while(have_posts()){
    the_post();
?>
        <li>
<?php
if(has_thumbnail()){
?>
            <div class="left"><a href="<?php the_mobile_permalink()?>"><amp-img layout="responsive" width="600" height="400" src="<?php the_thumbnail()?>"></amp-img></a></div>
            <div class="right">
            <a href="<?php the_mobile_permalink()?>"><strong><?php the_subtitle()?></strong>  <?php echo dm_trim_words(get_the_excerpt(), 40)?></a>
            </div>
<?php 
}else{
?>
        <div class="text"><a href="<?php the_mobile_permalink()?>"><strong><?php the_title()?></strong> <?php echo dm_trim_words(get_the_excerpt(), 100)?></a></div>
<?php
}
?>
        </li>
<?php } ?>
    </ul>
</div>
<div class="container pagnaginnav">
    <?php the_mobile_posts_pagination(1, '&lt;&lt;','&gt;&gt;');?>
</div>

<?php get_template_part('form'); ?>

<?php
get_footer();
