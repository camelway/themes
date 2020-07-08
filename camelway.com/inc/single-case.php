<?php
$post = get_post();
$catID = $post->post_category;
?>
<div class="wrap single single-cat-<?php echo $catID?>" itemscope itemtype="https://schema.org/Article">
    <h1 class="container" itemprop="headline name"><?php the_subtitle()?></h1>
    <?php get_template_part('inc/post', 'pubmeta'); ?>

    <div class="container content-section" itemprop="articleBody">
        <div class="case-content">
            <?php the_content();?>

        </div>
        <div class="case-summary">
            <ul class="brief">
                <li>
                    <span>Continent</span>
                    <span><?php the_post_data('case_mainland');?></span>
                </li>
                <li>
                    <span>Location</span>
                    <span><?php the_post_data('case_location');?></span>
                </li>
                <li>
                    <span>Company</span>
                    <span><?php the_post_data('case_company');?></span>
                </li>
                <li>
                    <span>Product</span>
                    <span><?php the_post_data('case_product');?></span>
                </li>
            </ul>
            <div class="case-thumbnail"><img src="<?php the_thumbnail()?>" alt="<?php the_subtitle();?>" itemprop="image"></div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="container content-section" itemprop="articleBody">
            <?php the_post_data('additional_content');?>

    </div>

    <?php get_template_part('widget', 'inquiry-contact'); ?>

    <div class="container content-section">
        <h2>Solutions</h2>
        <?php the_horizontal_items(array(10), 2);?>
    </div>

<?php get_template_part('widget','inquiry-form'); ?>
    
    <div class="container content-section">
        <h2>Related Products</h2>
       <?php the_vertical_items(array(1,2,3,4,5,6,7,8,9), 4);?>
    </div>

</div>
