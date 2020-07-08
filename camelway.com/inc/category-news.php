<div class="wrap category category-<?php the_category_slug()?>">
<?php
$posts = get_posts('post_type=topic&numberposts=4');
if(!empty($posts)){
?>
    <div class="container content-section">
        <h2>Special Report</h2>
        <div class="item-list">
            <ul class="item-list-vertical">
    <?php
    foreach($posts as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $excerpt = $post->post_excerpt;
    ?>
                <li>
                    <a href="<?php echo $permalink?>"><img src="<?php $post->post_thumbnail?>" alt="<?php $post->post_subtitle?>"></a>
                    <div class="item-content">
                        <h4><a href="<?php echo $permalink?>"><?php echo $subtitle?></a></h4>
                        <p><?php echo dm_trim_words($excerpt, 50);?></p>
                        <a href="<?php echo $permalink?>" class="more">More</a>
                    </div>
                </li>
<?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>

    <div class="container content-section">
        <h2>News</h2>
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
            <div class="item-pubdate">
                <span class="ym"><?php the_time('Y-m');?></span>
                <span class="day"><?php the_time('d');?></span>
            </div>
            <div class="item-excerpt">
                <h3 itemprop="name"><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                <p itemprop="description"><?php echo dm_trim_words(get_the_excerpt(), 120);?></p>
                <a class="more" href="<?php the_permalink()?>" itemprop="url">More</a>
                <meta itemprop="position" content="<?php echo ($paged - 1) * $posts_per_page + $i?>">
            </div>
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
