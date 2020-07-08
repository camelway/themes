<div class="wrap category category-<?php the_category_slug()?>">
<div class="container content-section">
<?php
the_category_content();
?>
        <ul class="item-list-common" itemscope itemtype="https://schema.org/ItemList">
        <meta itemprop="numberOfItems" content="<?php echo found_posts();?>">
<?php
$i = 1;
$paged = empty(get_query_var('paged')) ? 1 : intval(get_query_var('paged'));
$posts_per_page = get_option('posts_per_page');
while(have_posts()){
    the_post();
?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Thing">
            <h3 itemprop="name"><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
            <p itemprop="description"><?php echo dm_trim_words(get_the_excerpt(), 120);?></p>
            <a class="more" href="<?php the_permalink()?>" itemprop="url">More</a>
            <meta itemprop="position" content="<?php echo ($paged - 1) * $posts_per_page + $i?>">
        </li>

    <?php
    }
    ?>
        <ul>
        <div class="posts-pagination">
<?php the_posts_pagination(6, 'Previous', 'Next'); ?>
        </div>
    </div>
</div>
