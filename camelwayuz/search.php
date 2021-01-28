<?php get_header();?>
<div class="container main">
    <form action="<?php dminfo('home_url')?>" method="get">
        <input type="text" name="s" value="<?php echo get_query_var('s')?>">
        <input type="submit" value="&#xe915;">
    </form>
    <div class="result_num">Нашлось <span><?php echo found_posts();?></span> результатов</div>
    <?php get_template_part('content', 'list');?>
    <?php get_template_part('widget', 'hotdeals');?>
</div>
<?php get_footer();?>
