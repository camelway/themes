<?php
$post = get_post();
$catID = $post->post_category;
?>
<div class="wrap single single-cat-<?php echo $catID?>" itemscope itemtype="https://schema.org/Article">
    <h1 itemprop="headline name"><?php the_subtitle()?></h1>
    <strong class="tips"><?php the_post_data('tips')?></strong>

    <?php get_template_part('inc/post', 'pubmeta'); ?>

    <div class="container content-section" itemprop="articleBody">
        <?php the_content();?>
<?php if(has_thumbnail()){ ?>
        <!-- <img class="aligncenter" src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" itemprop="image"> -->
<?php } ?>
    </div>

    <?php get_template_part('widget', 'inquiry-smallcontact'); ?>

    <div class="container content-section" itemprop="articleBody">
        <?php the_post_data('additional_content');?>

    </div>

    <div class="container the-tags">
        <?php the_schema_keywords();?>

    </div>

    <?php get_template_part("widget", "inquiry-form"); ?>

    <div class="container content-section">
        <h2>Related Products</h2>
        <?php the_related_items();?>

    </div>
</div>
