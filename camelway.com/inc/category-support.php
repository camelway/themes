<div class="wrap category category-<?php the_category_slug()?>">
<div class="container">
        <h1 class="headline"><?php the_category_name();?></h1>
        <div class="content-section">
            <?php the_category_content()?>
        </div>
    </div>
<?php get_template_part('widget', 'inquiry-form'); ?>
</div>
