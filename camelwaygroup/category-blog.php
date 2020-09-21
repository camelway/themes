<?php get_header();?>
<div class="container category-blog blog">
    <div class="breadcrumb">
        Home &gt; <?php the_category();?>
    </div>
    <div class="container">
        <h1><?php the_category_name();?></h1>
        <div class="description"><?php the_category_content()?></div>
        <ul class="items">
<?php
while(have_posts()){
    the_post();
?>
            <li>
<?php
    if(has_thumbnail()){ ?>
                <div class="thumbnail">
                    <a href="<?php the_permalink();?>"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=240" alt="<?php the_subtitle();?>" width="230" height="175"></a>
                </div>
<?php } ?>
                <div class="text">
                    <h2><a href="<?php the_permalink();?>"><?php the_subtitle()?></a></h2>
                    <p><?php echo dm_trim_words(get_the_excerpt(), 120);?></p>
                    <div class="author">
                        <img class="avatar" src="<?php the_author_meta('avatar')?>" alt="<?php the_author()?>" width="50" height="50">
                        <strong><?php the_author()?></strong>
                        <span class="pubdate"><?php the_time('M j, Y');?></span>
                    </div>
                    <div class="comment_count"><?php the_feedback_number()?> comments</div>
                </div>
            </li>
<?php } ?>
        </ul>
<?php if(found_posts() > get_option('posts_per_page')){ ?>
        <div class="loadmore" data-offset="<?php echo get_option('posts_per_page')?>" data-id="<?php the_category_ID()?>">Load More</div>
<?php } ?>
    </div>
</div>

<?php get_footer();
