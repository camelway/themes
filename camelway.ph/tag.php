<?php get_header();?>
<div class="container tag">
    <div class="main">
        <h1><?php the_tag_title()?></h1>
<?php
if(have_posts()){
?>
        <p class="explain"><?php the_tag_description();?>
        <div class="items">
            <ul>
<?php
    while(have_posts()){
        the_post();
?>
            <li>
<?php if(has_thumbnail){ ?>
                <div class="thumbnail"><a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>"></a></div>
<?php } ?>
                <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
                <p><?php echo dm_trim_words(get_the_excerpt(), 400)?> <a href="<?php the_permalink();?>" class="more">More</a></p>
            </li>
<?php }?>
            </ul>
        </div>
        <div class="pagination">
            <?php the_posts_pagination()?>
        </div>
<?php }else{ ?>
        <div class="no-result">No Object(s) found, try to search what you want.</div>
<?php }?>
        <?php get_template_part('feedback');?> 
        <div class="taglist">
            <ul>
<?php
        $tags = get_tags('number=20&orderby=rand');
        foreach($tags as $tag){
?>
                <li style="font-size:<?php echo rand(12, 22)?>px"><a href="<?php echo $tag->get_permalink()?>"><?php echo $tag->name?></a></li>
<?php } ?>
            </ul>
        </div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer();?>
