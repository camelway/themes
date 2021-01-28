<?php get_header()?>
<div class="container category category-<?php the_category_slug()?>">
    <?php breadcrumb_nav();?>
    <div class="main"> 
        <h1><?php the_category_name()?></h1>
        <div class="category-content">
            <?php the_category_content();?>
        </div>
        <ul class="items">
<?php 
while(have_posts()){
    the_post();
?>
            <li id="item-<?php the_ID();?>">
                <div class="thumbnail"><a href="<?php the_permalink()?>"><img srcset="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=350 350w, <?php the_thumbnail()?> 500w" src="<?php the_thumbnail()?>" alt="<?php the_subtitle();?>" width="500" height="262"></a></div>
                <div class="description">
                    <h3><a href="<?php the_permalink()?>"><?php the_subtitle();?></a></h3>
                    <ul class="params">
                        <li>Capacity: <span><?php the_data('capacity')?></span></li>
                        <li>Power: <span><?php the_data('power')?></span></li>
                        <li>Container Qty: <span><?php the_data('qty')?></span></li>
                        <li>Price Range: <span><?php the_data('lowprice')?> - <?php the_data('highprice')?>USD</span></li>
                    </ul>
                    <div class="excerpt"><?php echo dm_trim_words(get_the_excerpt(), 320);?></div>
                </div>
            </li>
<?php }?>
        </ul>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?> 
        <?php get_template_part('sidebar', 'rfq');?> 
        <?php get_template_part('sidebar', 'showcase');?> 
    </div>
    <div class="clearfix"></div>
</div>

<?php get_template_part('category', 'product-footer');?>

<?php get_footer();