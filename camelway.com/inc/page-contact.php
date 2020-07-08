<div class="wrap single page-<?php echo the_ID()?>" itemscope itemtype="https://schema.org/Article">
    <h1 itemprop="headline name"><?php the_subtitle()?></h1>
    <?php get_template_part('inc/post', 'pubmeta'); ?>
    <div class="container content-section" itemprop="articleBody">
    <?php the_content();?>

    </div>

    <?php get_template_part('widget', 'inquiry-form');?>
</div>
