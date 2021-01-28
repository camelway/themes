<div class="side-showcase">
    <h3>Popular Products</h3>
    <ul>
<?php 
$q = new DM_Query(array('category__in'=>array(1,2,3,4,5,6,7,8,9), 'meta_key'=>'viewed', 'orderby'=>'meta_value_num', 'posts_per_page'=>3));
while($q->have_posts()){
    $q->the_post();
?>
         <li>
            <div class="thumbnail">
                <a href="<?php the_permalink();?>"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=150" alt="<?php the_subtitle();?>" width="150" height="112"></a>
            </div>
            <div class="text">
                <h4><a href="<?php the_permalink();?>" title="<?php the_subtitle();?>"><?php the_subtitle();?></a></h4>
                <p>Capacity: <?php the_data('capacity')?></p>
                <p>Power: <?php the_data('power');?></p>
            </div>
        </li>
<?php } dm_reset_postdata();?>
    </ul>
</div>