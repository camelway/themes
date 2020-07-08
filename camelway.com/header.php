<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php dm_title();?></title>
<?php if(is_home() || is_single() || is_category() || is_page()){ ?>
    <meta name="keywords" content="<?php dm_keywords();?>">
    <meta name="description" content="<?php dm_description(512);?>">
<?php } if(is_search() && is_paged() || get_query_var('paged')>1){?>
    <meta name="robots" content="noindex,follow">
<?php } ?>
    <meta property="og:locale" content="en_US">
<?php if(is_home()){ ?>
    <meta property="og:type" content="website">
<?php } elseif(is_category() || is_author() || is_search()){ ?>
    <meta property="og:type" content="object">
<?php } elseif(is_single()) { ?>
    <meta property="og:type" content="article">
<?php } ?>
    <meta property="og:site_name" content="Camelway Machinery">
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
    if(in_category(array(1,2,3,4,5,6,7,8,9))) {
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
    <link rel="dns-prefetch" href="//data.camelway.net">
    <link rel="dns-prefetch" href="//pkt.zoosnet.net">
<?php if(!is_404()){ ?>
    <link rel="canonical" href="<?php dm_url();?>">
    <link rel="amphtml" href="<?php dm_mobile_url();?>">
<?php } if(is_home()){ ?>
    <link rel="alternate" href="//www.camelway.com/" hreflang="x-default">
    <link rel="alternate" href="//www.camelway.com/" hreflang="en">
    <link rel="alternate" href="//zh.camelway.com/" hreflang="zh">
    <link rel="alternate" href="//es.camelway.com/" hreflang="es">
    <link rel="alternate" href="//fr.camelway.com/" hreflang="fr">
    <link rel="alternate" href="//ru.camelway.com/" hreflang="ru">
    <link rel="alternate" href="//ar.camelway.com/" hreflang="ar">
    <link rel="alternate" type="application/atom+xml" title="Camelway RSS" href="<?php dminfo('atom_url')?>">
<?php } ?>
    <link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
    <link rel="apple-touch-icon-precompose" href="//data.camelway.net/static/images/camelway-114x114.png">
    <link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>style.php">
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-918898170"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-918898170');
        gtag('config', 'UA-75819314-1');
    </script>
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '418256865395733');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</head>
<body>
<div class="wrap top-quick-navigation">
    <div class="container">
        <ul class="left-nav">
            <li><a href="<?php dminfo('home')?>">Home</a></li>
            <li><a href="<?php the_category_link(14)?>"><?php the_category_name(14)?></a></li>
            <li><a href="<?php the_category_link(12)?>"><?php the_category_name(12)?></a></li>
        </ul>

        <div class="quick-notify"></div>

        <ul class="right-nav">
            <li><a class="email" href="mailto:info@camelway.com">info@camelway.com</a></li>
            <li class="global-site">Global Site</li>
        </ul>
        <div class="website-frame">
            <span>Cameway Machinery Conducts Business on a Global Scale</span>
            <ul>
                <li><a href="https://www.camelway.com/">English</a></li>
                <li><a href="https://es.camelway.com/">Español</a></li>
                <li><a href="https://fr.camelway.com/">Français</a></li>
                <li><a href="https://ru.camelway.com/">русский</a></li>
                <li><a href="https://ar.camelway.com/">العربية</a></li>
                <li><a href="https://zh.camelway.com/">中文</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container primary-navigation">
    <a href="<?php dminfo('home');?>" class="logo"><img src="//data.camelway.net/static/images/logo.camelway.com.png" alt="Camelway Machinery"></a>

    <ul class="primary-menu">
        <li><a href="<?php the_category_link(1)?>"><?php the_category_name(1)?></a>
<?php
$posts = get_posts('category=1');
if(!empty($posts)){ ?>
            <ul class="secondary-menu">
<?php foreach($posts as $post){ ?>
                <li><a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a></li>
<?php } ?>
                <li><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></li>
                <li><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></li>
                <li><a href="<?php the_category_link(4)?>"><?php the_category_name(4)?></a></li>
                <li><a href="<?php the_category_link(5)?>"><?php the_category_name(5)?></a></li>
            </ul>
<?php } ?>
            <i class="arrow"></i>
        </li>
        <li><a href="<?php the_category_link(6)?>"><?php the_category_name(6)?></a>
        <?php
$posts = get_posts('category=6');
if(!empty($posts)){ ?>
            <ul class="secondary-menu">
<?php foreach($posts as $post){ ?>
                <li><a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a></li>
<?php } ?>
            </ul>
<?php } ?>
            <i class="arrow"></i>
        </li>
        <li><a href="<?php the_category_link(10)?>"><?php the_category_name(10)?></a></li>
        <li><a href="<?php the_category_link(11)?>"><?php the_category_name(11)?></a></li>
        <li><a href="<?php the_category_link(13)?>"><?php the_category_name(13)?></a></li>
        <li><a href="<?php the_category_link(16)?>"><?php the_category_name(16)?></a></li>
        <li><a href="<?php the_permalink(1)?>">Contact US</a></li>
        <?php if(!is_search()) { ?><li class="icon-search"></li> <?php } ?>
    </ul>
    <i class="icon-menu"></i>

    <div id="search-frame" class="search-frame">
        <div class="container" itemscope itemtype="https://schema.org/WebSite">
            <meta content="<?php echo home_url(true)?>" itemprop="url">
            <div class="searchform">
            <form action="<?php dminfo('home')?>index.php" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                <meta content="<?php dminfo('home')?>index.php?s={s}" itemprop="target">
                <!--
                <select name="category__in">
                    <option value="">ALL</option>
                    <option value="1,2,3,4,5,6,7,8,9">Product</option>
                    <option value="10">Application</option>
                    <option value="11">Case</option>
                    <option value="12">News</option>
                </select>
                <span class="icon-select">&#xe9ab;</span>
                -->
                <input type="text" class="regular-text" name="s" autofocus autocomplete="off" placeholder="Search" itemprop="query-input" value="<?php if(is_search()) echo get_search_query()?>">
                <input type="submit" value="Search" class="primary-button">
            </form>
            <p class="popular">
                    <strong>Popular:</strong> <a href="/s/batching-plant-price/">Batching Plant Price</a>
            </p>
            </div>
        </div>
    </div>

</div>
