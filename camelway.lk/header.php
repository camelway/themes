<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php dm_title()?></title>
<?php if(!is_404()){ ?>
<meta name="keywords" content="<?php dm_keywords();?>">
<meta name="description" content="<?php dm_description();?>">
<link rel="canonical" href="<?php dm_url();?>">
<link rel="amphtml" href="<?php dm_mobile_url();?>">
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php dminfo('stylesheet_url')?>?v=20200311">
<link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
<meta property="og:locale" content="en_GB">
<?php if(is_home()){ ?>
<meta property="og:type" content="website">
<?php } elseif(is_category() || is_author() || is_search()){ ?>
<meta property="og:type" content="object">
<?php } elseif(is_single()) { ?>
<meta property="og:type" content="article">
<?php } ?>
<meta property="og:site_name" content="Camelway Sri Lanka">
<meta property="og:title" content="<?php dm_title();?>">
<meta property="og:description" content="<?php dm_description(160);?>">
<meta property="og:url" content="<?php dm_url();?>">
<meta property="article:publisher" content="https://www.facebook.com/camelway/">
<?php if(is_single()){ ?>
<?php
$tags = get_the_tags();
foreach($tags as $tag){
?>
<meta property="article:tag" content="<?php echo $tag->name?>">
<?php }
    if(in_category(array(1,2,3,4,5,6,7,10))) {
?>
<meta property="article:section" content="Products">
<?php } ?>
<meta property="article:published_time" content="<?php the_time('Y-m-d H:i:s');?>">
<meta property="article:modified_time" content="<?php the_modified_time('Y-m-d H:i:s');?>">
<?php } ?>
<?php
   $ogimage = og_image();
   if(!empty($ogimage)){
?>
<meta property="og:image" content="<?php echo $ogimage[0]?>">
<meta property="og:image:width" content="<?php echo $ogimage[1];?>">
<meta property="og:image:height" content="<?php echo $ogimage[2];?>">
<?php } ?>
<?php if(is_single() && in_category(array(1,2,3,4,5,6,7))) { ?>
<script type="application/ld+json">{"@context":"https://schema.org/","@type":"Product","name":"<?php the_subtitle()?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"description":"<?php echo dm_trim_words(get_the_excerpt(), 200);?>","sku":"p-<?php the_ID()?>","mpn":"<?php echo the_category_slug().'-'.get_the_ID();?>","brand":{"@type":"Brand","name":"Camelway"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"<?php the_ratingValue();?>","reviewCount":"<?php the_reviewCount();?>","bestRating":"5","worstRating":"1"},"offers":{"@type":"AggregateOffer","url":"<?php the_permalink()?>#feedback","priceCurrency":"USD","availability":"https://schema.org/PreOrder","itemCondition":"http://schema.org/NewCondition","lowPrice":"<?php the_post_data('lowprice')?>","highPrice":"<?php the_post_data('highprice')?>","seller":{"@type":"Organization","name":"Camelway Sri Lanka"}}}</script>
<?php }elseif(is_single() && in_category(array(8,9))){?>
<script type="application/ld+json">{"@context": "http://schema.org","@type": "BlogPosting","headline": "<?php the_title()?>","alternativeHeadline":"<?php the_subtitle()?>","datePublished": "<?php the_time('Y-m-d');?>","dateModified": "<?php the_modified_time('Y-m-d');?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"keywords":[<?php echo trim(get_the_tag_list('"','", "','"'),',')?>],"mainEntityOfPage":"<?php the_permalink();?>","description":"<?php echo dm_trim_words(get_the_excerpt(), 160)?>","author": "<?php the_author()?>","publisher":{"@type": "Organization","name": "Camelway Sri Lanka","url": "https://www.camelway.lk","logo": {"@type": "ImageObject","url": "https://data.camelway.net/static/images/camelway-114x114.png","width":"114","height":"114"}}}</script>
<?php } ?>
<script>
    var supportwebp = (function supportwebp(){var elem = document.createElement('canvas');if (!!(elem.getContext && elem.getContext('2d'))) {return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;}return false;})();
</script>
</head>
<body>
<div class="container top">
    <div class="s-logo">
        <img src="<?php dminfo('template_url')?>images/logo.png" alt="Camelway Machinery">
    </div>
    <div class="introduce">
        <p>Camelway desin and manufacture concrete batching plant since 1983. <a href="<?php the_permalink(1);?>">More &gt;&gt;</a></p>
    </div>
</div>
<div class="container head">
    <a href="<?php dminfo('home');?>" class="logo"><img src="<?php dminfo('template_url')?>images/logo.png" alt="Camelway"></a>
    <div class="top-contact">
        <p class="mobile">+8613027618609</p>
        <p class="email">clareconcretemixer@gmail.com</p>
    </div>
</div>
<div class="container menu">
    <ul>
        <li><a href="<?php dminfo('home')?>">Home </a></li>
        <li><a href="<?php the_permalink(1);?>">About US</a></li>
        <li><a href="<?php the_permalink(2);?>">Contact US</a></li>
        <li><a href="<?php the_category_link(8);?>">Gallery</a></li>
        <li><a href="<?php the_category_link(9);?>">Blog</a></li>
        <li class="right"><a href="<?php the_permalink(1);?>">Products</a>
            <i class="indicator"></i>
            <ul>
                <div class="productlist">
                <dl>
                    <dt><a href="<?php the_category_link(1)?>"><?php the_category_name(1)?></a></dt>
<?php
$m = new DM_Query('cat=1&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></dt>
<?php
$m = new DM_Query('cat=2&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(3)?>"><?php the_category_name(3);?></a></dt>
<?php
$m = new DM_Query('cat=3&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(4)?>"><?php the_category_name(4)?></a></dt>
<?php
$m = new DM_Query('cat=4&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(5)?>"><?php the_category_name(5)?></a></dt>
<?php
$m = new DM_Query('cat=5&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(6)?>"><?php the_category_name(6)?></a></dt>
<?php
$m = new DM_Query('cat=6&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                    <dt><a href="<?php the_category_link(7)?>"><?php the_category_name(7)?></a></dt>
<?php
$m = new DM_Query('cat=7&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>
            </div>
            <div class="search">
                <form action="<?php dminfo('home')?>index.php" method="get">
                    <input type="text" name="s" value="">
                    <input type="submit" value="">
                </form>
            </div>
        </ul>
    </li>
</ul>
</div>
