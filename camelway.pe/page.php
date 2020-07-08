<?php get_header()?>
<div class="container single">
    <div class="main">
        <h1><?php the_subtitle()?></h1>
        <div class="content">
<?php the_content();?>
        </div>
        <?php get_template_part('feedback');?> 
        <?php get_template_part('map');?> 
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer();
