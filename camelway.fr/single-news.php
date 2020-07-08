<?php get_header();?>
<div class="container single single-news">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1><?php the_subtitle()?></h1>
        <div class="pubmeta"><span class="author"><?php the_author()?></span> posted this article in <span class="date" pubdate="<?php the_time('Y-m-d H:i:s');?>"><?php the_time('F d, Y');?></span></div>
        <div class="content">
            <?php the_content();?>
        </div>
        <div class="tags"><?php the_tags()?></div>
        <div class="share">
            <?php get_template_part('share');?>
            <div class="rating"><span data-rating='1' title="Very Bad Post"></span><span data-rating='2' title="Bad Post"></span><span data-rating='3' title="Not Bad Post"></span><span data-rating='4' title="Good Post"></span><span data-rating='5' title="Excellent Post"></span></div>
        </div>
        <div class="post_nav">
            <p>Previous: <?php previous_post_link();?></p>
            <p>Next: <?php next_post_link();?></p>
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

