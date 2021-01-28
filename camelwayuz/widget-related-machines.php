<div class="wrap content-section related-machines" id="related">
    <div class="headline">
        <h2 class="title">Tegishli mahsulotlar</h2>
        <span class="more refresh" role="button" data-loadtype="1" onclick="refreshposts(this)"></span>
    </div>
    <ul class="items">
<?php
$q = new DM_Query(array('posts_per_page'=>6, 'no_found_rows'=>true, 'post__not_in'=>get_the_ID(), 'orderby'=>'rand', 'category__in'=>array(1,2,3,4,5,6,7)));
while($q->have_posts()){
    $q->the_post();
?>
        <li>
            <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" width="300" height="175"></a>
            <h3><?php the_subtitle();?></h3>
        </li>
<?php } dm_reset_postdata();?>
    </ul>
</div>
