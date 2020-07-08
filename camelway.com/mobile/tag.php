<?php get_header(); ?>
<div class="container tag-entry">
    <h1><?php the_tag_title()?></h1>
    <div class="tagstatus"><span itemprop="numberOfItems"><?php echo found_posts();?></span> record(s) related to <strong><?php the_tag_title()?></strong></div>
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
            <a href="<?php the_mobile_permalink()?>"><strong><?php the_title()?></strong>  <?php echo dm_trim_words(get_the_excerpt(), 20)?></a>
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
