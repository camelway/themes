<div class="container main">
    <h1 class="title"><?php the_category_name()?></h1>
<?php
$sticky_posts = get_posts(array('cat'=>get_category_ID(), 'number'=>1, 'data_key'=>'banner'));
foreach($sticky_posts as $post){
?>
    <div class="sticky-post">
        <h2><a href="<?php echo $post->get_permalink(1)?>"><?php echo $post->post_subtitle?></a></h2>
        <div class="pubinfo">
                <span class="pubdate"><?php echo date('Y-m-d', strtotime($post->post_date))?></span>
                <span class="viewed"><?php echo intval($post->get_meta('viewed'));?></span>
        </div>
        <div class="sticky_image">
<?php
    list($w, $h) = get_image_size($post->post_banner);
?>
            <a href="<?php echo $post->get_permalink(1)?>"><amp-img layout="responsive" src="<?php echo $post->post_banner;?>" <?php the_srcset($post->post_banner);?> alt="<?php echo $post->post_subtitle?>" width="<?php echo $w;?>" height="<?php echo $h;?>"></amp-img><?php echo webpfallback($post->post_banner, $post->post_subtitle, 800, 280)?></a>
        </div>
        <p><?php echo dm_trim_words($post->post_excerpt, 350)?></p>
    </div>
<?php } ?>
    <ul class="post-gallery">
<amp-list layout="fixed-height" width="auto" height="800" load-more="auto" load-more-bookmark="next" src="<?php dminfo('ajax_url')?>?action=loadposts&cat=<?php the_category_ID()?>">
<template type="amp-mustache">
        <li>
            <a href="{{mobile_permalink}}"><amp-img layout="responsive" src="{{post_primaryimage}}" srcset="{{post_primaryimage_srcset}}" alt="{{post_subtitle}}" width="{{post_primaryimage_width}}" height="{{post_primaryimage_height}}"><amp-img fallback layout="intrinsic" src="{{post_primaryimage_fallback}}" alt="{{post_subtitle}}" width="{{post_primaryimage_width}}" height="{{post_primaryimage_height}}"></amp-img></amp-img></a>
            <h3><a href="{{mobile_permalink}}">{{post_subtitle}}</a></h3>
        </li>
</template>
</amp-list>
    </ul>
</div>
