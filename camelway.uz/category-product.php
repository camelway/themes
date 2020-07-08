<?php get_header()?>
<div class="container category">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1><?php the_category_name();?></h1>
        <div class="explain">
        <?php the_category_content();?>
        </div>
        <div class="items">
            <ul class="showroom">
<?php
while(have_posts()){
    the_post();
?>
            <li>
                <div class="thumbnail">
                    <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_title()?>" width="600" height="350"></a>
                </div>
                <div class="description">
                    <h2><a href="<?php the_permalink()?>" title="<?php the_subtitle();?>"><?php the_subtitle()?></a></h2>
                    <p><?php echo dm_trim_words(get_the_excerpt(), 230);?></p>
                    <a href="<?php the_permalink()?>" class="more">Узнавай больше</a>
                    <a href="<?php the_permalink()?>#feedback" class="inquiry">Запрос цены</a>
                </div>
            </li>
<?php } ?>
            </ul>
        </div>
        <?php get_template_part('feedback');?> 
        <?php get_template_part('map');?> 
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
