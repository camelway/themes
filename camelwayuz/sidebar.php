<div class="aside">
<?php if(is_single()){ ?>
    <div class="section sidebar-catalog">
        <h3 class="title">Mahsulotlar katalogi</h3>
        <ul class="product-catalog">
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
        <li><a href="<?php echo $cat->get_permalink()?>"><?php echo $cat->cat_name?></a>
            <ul>
<?php 
    $posts = get_posts('cat='.$cat->cat_ID);
    foreach($posts as $post){
?>
                <li><a href="<?php echo $post->get_permalink()?>"><?php echo $post->post_subtitle?></a></li>
<?php } ?>
            </ul> 
        </li>
<?php } ?>
        </ul>
    </div>
<?php } ?>
    <div class="section sidebar-gallery">
        <div class="headline">
            <h3 class="title">Ommabop Rasmlar</h3>
            <span class="more refresh" role="button" data-loadtype="2" data-offset="2" onclick="refreshposts(this)"></span>
        </div>
        <ul class="gallery-items items">
<?php
$posts = get_posts('number=2&category__in=8&has_thumbnail=1');
foreach($posts as $post){
?>
            <li>
                <a href="<?php echo $post->get_permalink()?>"><img src="<?php echo $post->post_thumbnail?>" <?php the_srcset($post->post_thumbnail);?> alt="<?php echo $post->post_subtitle?>" width="300" height="175"></a>
                <h4><?php echo $post->post_subtitle;?></h4>
            </li>
<?php } ?>
        </ul> 
    </div>

    <div class="section sidebar-posts">
        <div class="headline">
            <h3 class="title">Ommabop xabarlar</h3>
            <span class="more refresh" role="button" data-loadtype="3" data-offset="5" onclick="refreshposts(this)"></span>
        </div>
        <ul class="post-items items">
<?php
    $posts = get_posts('number=5&category__in=9');
    foreach($posts as $post){
?>
            <li>
                <a href="<?php echo $post->get_permalink()?>"><?php echo $post->post_subtitle;?></a>
                <div class="pubinfo">
                    <span class="pubdate"><?php echo date('Y-m-d', strtotime($post->post_date));?></span>
                    <span class="viewed"><?php echo intval($post->get_meta('viewed'));?></span>
                </div>
            </li>
<?php } ?>
        </ul>
    </div>
</div>
