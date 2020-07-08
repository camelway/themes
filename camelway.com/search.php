<?php
get_header();
?>
<div class="container search-box" itemscope itemtype="https://schema.org/WebSite">
    <meta content="<?php echo home_url(true)?>" itemprop="url">
    <form action="<?php dminfo('home')?>index.php" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
        <meta content="<?php dminfo('home')?>index.php?s={s}" itemprop="target">
        <input type="text" class="regular-text" name="s" autofocus autocomplete="off" itemprop="query-input" value="<?php if(is_search()) echo get_search_query()?>">
        <input type="submit" value="Search" class="primary-button">
    </form>
</div>

<div class="container" itemscope itemtype="https://schema.org/ItemList">
<?php
if(have_posts())
    get_template_part('inc/search', 'result');
else
    get_template_part('inc/search', 'none');
?>
</div>
<?php get_footer(); ?>
