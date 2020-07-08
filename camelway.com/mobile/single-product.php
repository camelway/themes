<div class="container single-entry">
    <h1><?php the_subtitle()?></h1>
    <div class="content-section">
        <?php the_content();?>
        <amp-img layout="responsive"  width="600" height="400" src="<?php the_thumbnail()?>"></amp-img>
        <div class="param"><?php the_post_data('param')?></div>
        <?php the_post_data('additional_content');?>
    </div>
    <div class="tags"><?php the_mobile_tags('','')?></div>
</div>

<?php get_template_part('form'); ?>

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

<div class="container block-section">
    <h2>Customer Case</h2>
    <ul class="cols-1">
<?php
$p = new DM_Query(array('category__in'=>array(11), 'orderby'=>'rand', 'posts_per_page'=>'8'));
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
        <h3><a href="<?php the_mobile_permalink();?>"><?php the_subtitle()?></a></h3>
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


<div class="container block-section">
    <h2>Industry Solutions</h2>
    <ul class="cols-1">
<?php
$p = new DM_Query(array('category__in'=>array(10), 'orderby'=>'rand', 'posts_per_page'=>'8'));
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
        <h3><a href="<?php the_mobile_permalink();?>"><?php the_subtitle()?>: <?php the_post_data('tips');?></a></h3>
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
