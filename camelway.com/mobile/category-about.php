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
            <div class="left"><a href="<?php the_mobile_permalink()?>"><amp-img layout="responsive" width="600" height="400" src="<?php the_thumbnail()?>"></amp-img></a></div>
            <div class="right">
            <a href="<?php the_mobile_permalink()?>"><p><strong><?php the_title()?></strong>: <?php echo dm_trim_words(get_the_excerpt(), 30);?></a>
            </div>
        </li>
<?php } ?>
    </ul>
</div>

<?php get_template_part('form'); ?>
