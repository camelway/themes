<?php
$post = get_post();
$catID = $post->post_category;
?>
<div class="wrap single single-cat-<?php echo $catID?>" itemscope itemtype="https://schema.org/Article">
    <h1 itemprop="headline name"><?php the_subtitle()?></h1>
    <?php get_template_part('inc/post', 'pubmeta');?>
    <div class="container content-section" itemprop="articleBody">
        <?php the_content();?>

    </div>

    <div class="container rich-info" itemprop="articleSection">
            <div class="media-info">
<?php if(get_the_post_data('video')){ ?>
                <span class="video" data-video="<?php the_post_data('video')?>" data-name="<?php the_subtitle();?>"></span>
<?php } ?>
                <img itemprop="image" src="<?php the_thumbnail()?>" alt="<?php the_subtitle();?>">
            </div>

            <div class="txt-info">
                <div class="specifications">
                    <?php the_post_data('param');?>
                </div>

                <dl class="related-items">
                    <dt>Related Products</dt>
<?php
$related = new DM_Query(array('category__in'=>array(1,2,3,4,5), 'posts_per_page'=>4, 'no_found_rows'=>1, 'orderby'=>'rand'));
while($related->have_posts()){
    $related->the_post();
?>
                        <dd><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></dd>
<?php
}
dm_reset_postdata();
?>
                    <dt>Related Applications</dt>
<?php
$related = new DM_Query(array('category__in'=>array(10), 'posts_per_page'=>4, 'no_found_rows'=>1, 'orderby'=>'rand'));
while($related->have_posts()){
    $related->the_post();
?>
                        <dd><a href="<?php the_permalink()?>"><?php the_post_data('tips')?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>

                <div class="links">
<?php if(get_the_post_data('brochure')){ ?>
                    <a href="<?php the_post_data('brochure')?>" class="down" target="_blank">Product Brochure</a>
<?php } if(get_the_post_data('gallery_url')){ ?>
                    <a href="<?php the_post_data('gallery_url')?>" class="viewpic">Product Gallery</a>
<?php } ?>
                </div>

            </div>
    </div>

    <?php get_template_part('widget','inquiry-smallcontact'); ?>

    <div class="container content-section" itemprop="articleBody">
        <?php the_post_data('additional_content');?>

    </div>

    <?php get_template_part('widget','inquiry-form'); ?>

    <div class="container content-section">
        <h2>Case</h2>
        <?php the_vertical_items(array(11), 4);?>
    </div>

</div>
