<div class="wrap category category-<?php the_category_slug()?>">
    <div class="container item-list">
        <ul>
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <a href="<?php the_permalink()?>">
                    <img src="<?php the_author_meta('avatar')?>" alt="<?php the_author()?>">
                    <h3><?php the_subtitle();?></h3>
                    <p><?php echo dm_trim_words(get_the_excerpt(), 50);?></p>   
                </a> 
            </li>
<?php } ?>
        </ul>
        <div class="posts-pagination">
            <?php //the_posts_pagination(6, 'Previous', 'Next'); ?>
        </div>
    </div>
</div>
