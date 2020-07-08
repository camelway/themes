<div class="wrap category category-<?php the_category_slug()?>">
    <div class="container headlines">
        <ul>
<?php
$headlines = new DM_Query('has_thumbnail=1&posts_per_page=4&category__in='.get_category_ID());
while($headlines->have_posts()){
    $headlines->the_post();
?>
            <li>
                <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>"></a>
                <h3><a href="<?php the_permalink()?>"><?php the_subtitle();?></a></h3>
                <p><?php echo dm_trim_words(get_the_excerpt(), 50);?></p>
            </li>
<?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="container products">

    </div>
    
    <div class="container item-list">
        <ul>
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <a href="<?php the_permalink()?>">
                    <h3><?php the_subtitle()?></h3>
                    <p><?php echo dm_trim_words(get_the_excerpt(), 50);?></p>
                </a>
            </li>
<?php } ?>
        </ul>
    </div>
</div>
