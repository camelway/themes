<?php get_header();?>
<div class="container main">
    <h1 class="title"><?php the_tag_title()?></h1>
<?php 
    if(get_tag_description()){
?>
    <p class="description"><?php echo the_tag_description()?></p>
<?php } ?>
    <?php get_template_part('content', 'list');?>
    <?php get_template_part('widget', 'hotdeals');?>
</div>
<?php get_footer();?>
