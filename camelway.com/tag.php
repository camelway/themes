<?php
get_header(); ?>
<div class="wrap secondary-banner">
    <div class="container">
        <h2 class="compact-title"><?php the_tag_title()?></h2>
        <?php if(get_tag_description()) {?><p class="compact-excerpt"><?php the_tag_description();?></p> <?php } ?>
    </div>
</div>
<div class="container bread-language-nav">
    <div class="breadcrumb">
        <?php the_breadcrumblist('&gt;')?>
    </div>
    <div class="languageselector">
        <?php the_languageselector()?>
    </div>
</div>
<div class="container" itemscope itemtype="https://schema.org/ItemList">
    <div class="tag-list">
        <div class="tagstatus"><span itemprop="numberOfItems"><?php echo found_posts();?></span> records related to <strong><?php the_tag_title()?></strong></div>
        <ul>
<?php
$i = 1;
$paged = empty(get_query_var('paged')) ? 1 : intval(get_query_var('paged'));
$posts_per_page = get_option('posts_per_page');
while(have_posts()){
    the_post();
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Thing">
                <a href="<?php the_permalink()?>"><h3 itemprop="name"><?php the_title()?></h3></a>
                <p itemprop="description"><?php echo dm_trim_words(get_the_excerpt(), 255);?> <a href="<?php the_permalink()?>" class="more" itemprop="url">More</a></p>
                <p class="metadata"><span class="keywords"><?php the_tags('');?></span> <span class="pubdate"><?php the_time('Y-m-d');?></span></p>
                <meta itemprop="position" content="<?php echo ($paged - 1) * $posts_per_page + $i?>">
            </li>
<?php
    $i++;
}
?>
        <ul>
        <div class="clearfix"></div>
    </div>
    <div class="posts_pagination">
        <?php the_posts_pagination(5, 'Previous', 'Next');?>
    </div>
</div>
<?php
get_footer();
