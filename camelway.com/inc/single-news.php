<?php
$post = get_post();
$catID = $post->post_category;
?>
<div class="wrap single single-cat-<?php echo $catID?>" itemscope itemtype="https://schema.org/Article">
    <h1 class="container" itemprop="headline name"><?php the_subtitle()?></h1>
    <?php get_template_part('inc/post', 'pubmeta'); ?>

    <div class="container content-section" itemprop="articleBody">
        <?php the_content();?>

    </div>

    <div class="container post-tags">
        <?php the_schema_keywords();?>

    </div>

    <div class="container post-pagination">
        <?php camelway_post_pagination();?>
    </div>

    <div class="container content-section">
        <h2>Related Products</h2>
        <?php the_vertical_items(array(1,2,3,4,5,6,7,8,9), 4);?>
    </div>
    
    <div class="container content-section">
        <h2>Applications</h2>
        <?php the_horizontal_items(array(10), 2);?>

    </div>

    <?php  get_template_part('widget', 'inquiry-form'); ?>
</div>
