<div class="container category-entry">
    <h1><?php the_category_name();?></h1>
    <div class="conetent-section">
        <?php the_category_content();?>
    </div>
</div>
<div class="container category-section">
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
    <div class="text"><a href="<?php the_mobile_permalink()?>"><h3><?php the_title()?></h3> <?php echo dm_trim_words(get_the_excerpt(), 50)?></a></div>
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
