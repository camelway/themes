<div class="wrap hotdeals">
    <h2 class="title">Issiq narxlar</h2>
    <ul class="hot-items">
<?php
$qs = new DM_Query(array('category__in'=>array(1,2,3,4,5,6,7), 'posts_per_page'=>8, 'no_found_rows'=>true, 'meta_key'=>'viewed', 'orderby'=>'meta_value_num'));
while($qs->have_posts()){
    $qs->the_post();
?>
        <li><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></li>
<?php } dm_reset_postdata();?>

    </ul>
</div>
