<h2>相关产品</h2>
<ul class="item-list-vertical">
<?php
$posts = get_posts(array('posts_per_page'=>4, 'category__in'=>array(1,2,3,4,5,6,7,8,9), 'orderby'=>'rand'));
foreach($posts as $post){
    $permalink = $post->get_permalink();
    $subtitle = $post->post_subtitle;
    $excerpt = dm_trim_words($post->post_excerpt, 53);
    $thumbnail = $post->post_thumbnail;
?>
    <li>
        <a href="<?php echo $permalink;?>"><img src="<?php echo $thumbnail;?>" alt="<?php echo $subtitle;?>"></a>
        <div class="item-content">
            <h3><a href="<?php echo $permalink;?>"><?php echo $subtitle;?></a></h3>
            <p><?php echo $excerpt;?></p>
            <a href="<?php echo $permalink;?>" class="more">了解更多</a>
        </div>
    </li> 
<?php } ?>
</ul>
