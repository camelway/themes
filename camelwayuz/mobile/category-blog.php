<div class="container main">
    <h1 class="title">Tavsiya qilinganlar</h1>
    <ul class="hot-posts items">
<?php
$q = new DM_Query(array('cat'=>get_category_ID(), 'no_found_rows'=>true, 'has_thumbnail'=>true, 'posts_per_page'=>6, 'meta_key'=>'viewed', 'orderby'=>'meta_value_num'));
while($q->have_posts()){
    $q->the_post();
?>
        <li>
            <a href="<?php the_mobile_permalink()?>"><amp-img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> layout="responsive" alt="<?php the_subtitle()?>" width="300" height="175"><?php echo webpfallback(get_the_thumbnail(), get_the_subtitle(), 300, 175)?></amp-img></a>
            <div class="info">
                <h3><a href="<?php the_mobile_permalink()?>"><?php the_subtitle()?></a></h3>
                <div class="pubinfo">
                    <span class="pubdate"><?php the_time('Y-m-d')?></span>
                    <span class="viewed"><?php echo intval(get_the_meta('viewed'));?></span>
                </div>
            </div>
        </li>
<?php } dm_reset_postdata()?>
    </ul>
    <h2 class="title">So'nggi xabarlar</h2>
    <?php get_template_part('content', 'list');?>
</div>
