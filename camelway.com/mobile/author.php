<?php get_header(); ?>
<div class="container author-entry">
    <div class="brief-info">
    <div class="avatar"><amp-img layout="responsive" width="60" height="60" src="<?php the_author_meta('avatar');?>" alt="<?php the_author();?>"></amp-img></div>
        <h1><?php the_author()?></h1>
        <h2><?php the_author_meta('company');?></h2>
        <h3><?php the_author_meta('department');?></h3>
        <h4><?php the_author_meta('title');?></h4>
        <div class="description"><?php the_author_meta('description');?></div>
    </div>
    <div class="contact-info">
        <ul class="contact-info">
            <?php if(get_the_author_meta('tel')){ ?><li class="tel">Tel: <a href="tel:<?php the_author_meta('tel');?>"><?php the_author_meta('tel');?></a></li><?php } ?>
            <?php if(get_the_author_meta('wechat')){ ?><li class="wechat">Wechat: <?php the_author_meta('wechat');?></li><?php } ?>
            <?php if(get_the_author_meta('email')){ ?><li class="email">Email: <a href="mailto:<?php the_author_meta('email');?>"><?php the_author_meta('email');?></a></li><?php } ?>
            <?php if(get_the_author_meta('whatsapp')){ ?><li class="whatsapp">whatsapp: <?php the_author_meta('whatsapp');?></li><?php } ?>
            <?php if(get_the_author_meta('facebook')){ ?><li class="facebook">FaceBook: <?php the_author_meta('facebook');?></li><?php } ?>
            <?php if(get_the_author_meta('linkedin')){ ?><li class="linkedin">LinkedIn: <?php the_author_meta('linkedin');?></li><?php } ?>
        <ul>
    </div> 
</div>

<?php get_template_part('form'); ?>

<div class="container author-section">
        <h2>Posts</h2>
 <ul class="cols-1">
<?php
    while(have_posts()){
        the_post();
?>
    <li>
        <a href="<?php the_mobile_permalink();?>"><h3><?php the_title();?></h3></a>
        <a href="<?php the_mobile_permalink();?>"><p><?php echo dm_trim_words(get_the_excerpt(), 120);?></p></a>
    </li>
<?php } ?>
    </ul>
</div>

<?php
get_footer();
