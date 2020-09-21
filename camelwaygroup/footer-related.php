<div class="wrap single-related">
    <div class="container">
        <h3>Related Products</h3>
        <ul>
<?php 
$q = new DM_Query(array('category__in'=>array(1,2,3,4,5,6,7,8,9), 'orderby'=>'rand', 'posts_per_page'=>6));
while($q->have_posts()){
    $q->the_post();
?>
            <li>
                <div class="thumbnail">
                    <a href="<?php the_permalink();?>"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_thumbnail()?>&width=150" alt="<?php the_subtitle();?>" width="150" height="112"></a>
                </div>
                <div class="text">
                    <h4><a href="<?php the_permalink();?>"><?php the_subtitle();?></a></h4>
                    <p class="capacity">Capacity: <?php the_data('capacity')?></p>
                    <p class="power">Power: <?php the_data('power');?></p>
                </div>
            </li>
<?php } dm_reset_postdata();?>
        </ul>
    </div>
</div>
