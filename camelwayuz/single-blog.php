<div class="container breadcrumb"><?php breadcrumb_nav();?></div>
<div class="container main">
    <div class="content">
        <h1><?php the_subtitle();?></h1>
        <div class="head">
            <div class="pubinfo">
                <span class="pubdate"><?php the_time('Y-m-d');?></span>
                <span class="viewed"><?php echo intval(get_the_meta('viewed')) + 1?></span>
                <a href="#author" class="author"><?php the_author()?></a>
            </div>
            <div class="score"><?php the_ratingValue()?></div>
        </div>
        <div class="entry-content">
            <?php the_content();?>
        </div>
        <div class="post-tags"><?php the_tags('', ' ');?></div>
        <div class="rate-share">
            <?php get_template_part('widget', 'rate');?>
            <?php get_template_part('widget', 'share');?>
        </div>
        <div class="post-pagination">
            <span>Keyingi: <?php next_post_link();?></span>
            <span>Oldingi: <?php previous_post_link();?></span>
        </div>
        <?php get_template_part('widget', 'form')?>
        <?php get_template_part('widget', 'author')?>
        <?php get_template_part('widget', 'related-machines')?>

    </div>
    <?php get_sidebar();?>
    <div class="clearfix"></div>
</div>
