<?php get_header();
$searchq = new DM_Query(array('s'=>get_query_var('s'), 'posts_per_page'=>8, 'category__in'=>array(1,2,3,4,5,6,7,8,9)));
?>
<div class="container search-page">
    <div class="main">
        <div class="count">
        About <?php echo ( found_posts() + $searchq->found_posts);?> results
        </div>
        <div class="results">
<?php 
while($searchq->have_posts()){
    $searchq->the_post();
?>
            <div class="item top">
                <div class="thumbnail">
                    <a href="<?php the_permalink()?>"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=220" alt="<?php the_subtitle()?>" width="220" height="165"></a>
                </div>
                <div class="description">
                    <h2><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h2>
                    <ul class="params">
                        <li>Capacity: <span><?php the_data('capacity')?></span></li>
                        <li>Power: <span><?php the_data('power')?></span></li>
                        <li>Container Qty: <span><?php the_data('qty')?></span></li>
                        <li>Price Range: <span><?php the_data('lowprice')?> - <?php the_data('highprice')?>USD</span></li>
                    </ul>
                    <p><a href="<?php the_permalink()?>"><?php echo dm_trim_words(get_the_excerpt(), 200)?></a></p>
                </div>
            </div>
<?php } dm_reset_postdata();?>
<?php
while(have_posts()){
    the_post();
?>
            <div class="item">
                <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
<?php
    if(have_thumbnail()){ ?>
                <a href="<?php the_permalink()?>" class="thumbnail"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=105" alt="<?php the_subtitle()?>" width="105" height="79"></a>
<?php } ?>
                <p><?php echo dm_trim_words(get_the_excerpt(), 220)?></p>
                <a href="<?php the_permalink()?>" class="url"><?php the_permalink();?></a>
            </div>
<?php } ?>
        </div>
<?php if(found_posts() > get_option('posts_per_search')){ ?>
        <div class="loadmore" data-offset="<?php echo get_option('posts_per_search');?>">Load More</div>
<?php } ?>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer();
