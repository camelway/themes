<div class="wrap category category-<?php the_category_slug()?>">
    <div class="container">
        <h1 class="headline"><?php the_category_name();?></h1>
        <div class="content-section">
            <?php the_category_content()?>
        </div>
    </div>

    <?php get_template_part('widget', 'inquiry-smallcontact');?>

    <div class="container content-section">
        <ul class="item-list-vertical" itemscope itemtype="https://schema.org/ItemList">
        <meta itemprop="numberOfItems" content="<?php echo found_posts();?>">
<?php
$i = 0;
while(have_posts()){
    the_post();
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Thing">
                <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail();?>" alt="<?php the_subtitle()?>" itemprop="image"></a>
                <div class="item-content">
                    <h3 itemprop="name"><?php the_subtitle();?></h3>
                    <p itemprop="description"><?php echo dm_trim_words(get_the_excerpt(), 100)?></p>
                    <a itemprop="url" href="<?php the_permalink()?>" class="more">More</a>
                </div>
            </li>
<?php } ?>
        </ul>
    </div>
</div>
