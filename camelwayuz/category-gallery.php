<div class="container breadcrumb"><?php breadcrumb_nav();?></div>
<div class="container main">
    <h1 class="title"><?php the_category_name()?></h1>
<?php
$sticky_posts = get_posts(array('cat'=>get_category_ID(), 'number'=>1, 'data_key'=>'banner'));
foreach($sticky_posts as $post){
?>
    <div class="sticky-post">
        <h2><a href="<?php echo $post->get_permalink()?>"><?php echo $post->post_subtitle?></a></h2>
        <div class="pubinfo">
                <span class="pubdate"><?php echo date('Y-m-d', strtotime($post->post_date))?></span>
                <span class="viewed"><?php echo intval($post->get_meta('viewed'));?></span>
        </div>
<?php
    list($w, $h) = get_image_size($post->post_banner);
?>
    <a href="<?php echo $post->get_permalink()?>"><img src="<?php echo $post->post_banner?>" <?php the_srcset($post->post_banner);?> alt="<?php echo $post->post_subtitle?>" width="<?php echo $w;?>" height="<?php echo $h;?>"></a>
        <p><?php echo dm_trim_words($post->post_excerpt, 350)?></p>
        <a href="<?php echo $post->get_permalink()?>" class="more">Ko'proq &gt;&gt;</a>
    </div>
<?php } ?>
    <ul class="post-gallery">
<?php
while(have_posts()){
    the_post();
    list($thumbnail, $width, $height) = get_primaryimage(NULL, true);
?>
        <li>
            <a href="<?php the_permalink()?>"><img src="<?php echo $thumbnail;?>" <?php the_srcset($thumbnail);?> alt="<?php the_subtitle()?>" width="<?php echo $width;?>" height="<?php echo $height?>"></a>
            <h3><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h3>
        </li>
<?php } ?>
    </ul>
<?php if(found_posts() > get_option('posts_per_page')){ ?>
    <span class="loadmore" role="button" data-offset="<?php echo get_option('posts_per_page')?>" data-category="<?php the_category_ID();?>" onclick="loadposts(this)">Load More</span>
<?php }?>
</div>
