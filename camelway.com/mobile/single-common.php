<div class="container single-entry">
    <h1><?php the_subtitle()?></h1>
    <div class="pub-meta">
        <div class="author_avatar">
            <amp-img layout="responsive" width="30" height="30" src="<?php the_author_meta('avatar')?>"></amp-img>
        </div>
        <div class="pub-detail">
            <span class="author"><a href="<?php the_mobile_author_posts_link()?>" rel="nofllow"><?php the_author();?></a></span>
            <span class="pubdate"><?php the_time('Y-m-d H:i')?></span>
        </div>
        <div class="facebooklike"><amp-facebook-like width="90" height="20" layout="fixed" data-layout="button_count" data-href="https://www.facebook.com/camelway/"></div>
    </div>
    <div class="content-section">
        <?php the_content();?>
    </div>
    <div class="tags"><?php the_mobile_tags('','')?></div>
</div>

<?php get_template_part('form'); ?>

<div class="container block-section">
    <h2>Related Proudcts</h2>
    <ul class="cols-1">
<?php
$p = new DM_Query(array('category__in'=>array(2,3,4,5,6,7), 'orderby'=>'rand', 'posts_per_page'=>'10'));
while($p->have_posts()){
    $p->the_post();
?>
    <li>
        <div class="left">
            <a href="<?php the_mobile_permalink();?>"><amp-img layout="responsive" width="600" height="400" src="<?php the_thumbnail();?>"></amp-img></a>
        </div>
        <div class="right">
        <h3><a href="<?php the_mobile_permalink();?>"><?php the_subtitle()?></a></h3>
        </div>
        
    </li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>

<div class="container block-section">
    <h2>Latest News</h2>
    <ul class="cols-1">
<?php
$p = new DM_Query('cat=12&posts_per_page=8&orderby=rand&no_found_rows=1');
while($p->have_posts()){
    $p->the_post();
?>
    <li>
<?php
    if(has_thumbnail()){
?>
        <div class="left">
            <a href="<?php the_mobile_permalink();?>"><amp-img layout="responsive" width="600" height="400" src="<?php the_thumbnail();?>"></amp-img></a>
        </div>
        <div class="right">
        <h3><a href="<?php the_mobile_permalink();?>"><?php the_title()?></a></h3>
        </div>
<?php }else{ ?>
        <h3><a href="<?php the_mobile_permalink();?>"><?php the_subtitle()?></h3>
        <p><a href="<?php the_mobile_permalink();?>"><?php echo dm_trim_words(get_the_excerpt(), 120);?></a></p>
<?php } ?>
    </li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>
