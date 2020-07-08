<?php get_header();?>
<div class="container search">
    <div class="main">
        <form action="/index.php" method="get" class="searchform">
            <input type="text" name="s" value="<?php echo get_query_var('s')?>">
            <input type="submit" value="Search">
        </form>
        <div class="content">
<?php
if(!have_posts()){
?>
            <p class="no-result">No results found, you can try another word</p>
<?php } else{ ?>
            <ul class="results">
<?php while(have_posts()){
    the_post();
    $cat = get_the_
?>
            <li>
                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                <div class="path"><a href="<?php echo home_url();?>"><?php echo home_url(1);?></a>  › <?php the_category(' ›');?></div>
                <p class="description"><?php echo dm_trim_words(get_the_excerpt(), 255)?></p>
            </li>
<?php } ?>
            </ul>
            <div class="pagination"><?php the_posts_pagination();?></div>
<?php } ?>
        </div>
        <?php get_template_part('feedback');?>
        <?php //get_template_part('map');?>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();

