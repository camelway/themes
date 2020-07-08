<div class="wrap category category-<?php the_category_slug()?>">
    <h1 class="container headline"><?php the_category_name();?></h1>
    <div class="container content-section">
<?php the_category_content();?> 
    </div>

    <div class="container content-section">
        <ul class="item-list-vertical">
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_subtitle();?>"></a>
                <div class="item-content">
                <h2><?php the_subtitle();?></h2>
                <p><?php the_excerpt();?> <a href="<?php the_permalink()?>" class="more">More</a></p>
                </div>
            </li> 
<?php } ?>
        </ul>
    </div>
<?php  get_template_part('widget', 'inquiry-form'); ?>
</div>
