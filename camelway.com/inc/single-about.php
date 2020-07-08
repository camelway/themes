<?php
$post = get_post();
$catID = $post->post_category;
?>
<div class="wrap single single-cat-<?php echo $catID?>" itemscope itemtype="https://schema.org/Article">
    <h1 class="container" itemprop="headline name"><?php the_subtitle()?></h1>
    <div class="container content-section" itemprop="articleBody">
        <?php the_content();?>
    </div>
    <div class="container content-section">
        <h2>Camelway News</h2>
        <?php the_common_lists_with_date(array(12));?>
    </div>
    
    <?php  get_template_part('widget', 'inquiry-form'); ?>
</div>
