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
                <a href="<?php the_mobile_permalink()?>"><h3><?php the_subtitle()?></h3></a>
                <?php the_post_data('param');?>
            </div>
        </li>
<?php } ?>
    </ul>
</div>

<div class="container category-section">
    <ul class="text-tile">
<?php
$categories = get_categories('parent=1'); 
foreach($categories as $category){ 
?>
        <li><a href="<?php the_mobile_category_link($category)?>"><?php the_category_name($category)?></a></li>
<?php }?>

<?php
$posts = get_posts('category=10&numberposts=4&orderby=rand'); 
foreach($posts as $post){ 
?>
        <li><a href="<?php the_mobile_permalink($post)?>"><?php echo $post->post_subtitle?></a></li>
<?php }?>

    <ul>
</div>
