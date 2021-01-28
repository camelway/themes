<!DOCTYPE HTML>
<html amp lang="<?php echo get_option('site_lang')?>">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
<title><?php dm_title()?></title>
<?php if(is_home() || is_category() || is_tag() || is_single() || is_page() || is_topic()){ ?>
<meta name="keywords" content="<?php dm_keywords()?>">
<meta name="description" content="<?php dm_description()?>">
<link rel="canonical" href="<?php dm_url()?>">
<?php } ?>
<link rel="icon" href="<?php dminfo('template_url')?>images/favicon.ico">
<link rel="apple-touch-icon-precompose" href="<?php dminfo('template_url')?>images/touch-icon.png">
<link rel="alternate" type="application/atom+xml" title="RSS Feed" href="<?php dminfo('rss_url')?>">
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<?php if(is_single()){?>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<?php } ?>
<?php
if(!is_404()){
the_twitter_card();
the_facebook_ogp('ИП ООО «CAMELWAY CHINA»', 'https://www.facebook.com/camelway/');
the_google_schema('ИП ООО «CAMELWAY CHINA»', 'ИП ООО «CAMELWAY CHINA»');
}
?>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<?php load_style();?>
</head>
<body>
<div class="wrap header">
    <a href="<?php dminfo('mobile_home_url')?>" class="go-home" tabindex="1">
        <amp-img src="<?php dminfo('template_url')?>images/camelway-logo.png" layout="intrinsic" width="275" height="50"></amp-img>
    </a>
    <span class="menu-btn" role="button" on="tap:slidernav.open" tabindex="3"></span>
    <span class="search-btn" id="search-btn" role="button" on="tap:tsearch.toggleClass(class='sliderout'),search-btn.toggleClass(class='active')"  tabindex="2"></span>
    <form action="<?php dminfo('mobile_home_url')?>" method="GET" target="_top" id="tsearch">
        <input type="text" name="s" placeholder="Katalogdan qidirish...">
    </form>
</div>
<div class="wrap divider"></div>
<amp-sidebar id="slidernav" class="slidernav" layout="nodisplay" side="right">
    <ul>
        <li><a href="<?php dminfo('home_url')?>">Bosh Sahifa</a></li> 
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
        <li class="products"><a href="<?php echo $cat->get_permalink(1)?>"><?php echo $cat->cat_name?><span><?php echo count_category_posts($cat->cat_ID);?></span></a>
<?php } ?>
        <li><a href="<?php the_mobile_category_link(8)?>">Galereya</a></li>
        <li><a href="<?php the_mobile_category_link(9)?>">Blog</a></li>
        <li><a href="<?php the_mobile_permalink(1)?>">Biz haqimizda</a></li>
        <li><a href="<?php the_mobile_permalink(2)?>">Biz bilan bog`laning</a></li>
    </ul>
</amp-sidebar>
