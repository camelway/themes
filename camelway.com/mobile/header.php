<!DOCTYPE HTML>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
    <title><?php dm_title();?></title>
<?php if(is_home() || is_single() || is_category() || is_page()){ ?>
    <meta name="keywords" content="<?php dm_keywords();?>">
    <meta name="description" content="<?php dm_description(160);?>">
<?php } if(!is_404()) {?>
    <link rel="canonical" href="<?php dm_url();?>">
<?php } ?>
    <link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
    <link rel="apple-touch-icon-precompose" href="//data.camelway.net/static/images/camelway-114x114.png">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<?php if((in_category(array(10,11,12,13,14,15,16,17,18,19,20)) && is_single()) || is_page()){ ?>
    <script async custom-element="amp-facebook-like" src="https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js"></script>
<?php } ?>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
    @font-face {font-family:'icon';src: url('//data.camelway.net/static/font/icon.eot');src: url('//data.camelway.net/static/font/icon.eot#iefix') format('embedded-opentype'),url('//data.camelway.net/static/font/icon.woff2') format('woff2'),url('//data.camelway.net/static/font/icon.woff') format('woff'),url('//data.camelway.net/static/font/icon.ttf') format('truetype'),url('//data.camelway.net/static/font/icon.svg#icon') format('svg');font-weight: normal;font-style: normal;font-display:swap}
    * {padding:0;margin:0}
    body {font-family:Arial,Verdana;padding-top:40px;padding-bottom:40px;font-size:14px;line-height:2em}
    h1 {margin:20px 0 15px 0}
    h2 {margin:15px 0 10px 0}
    h3 {margin:10px 0 6px 0}
    a {color:#333;text-decoration:none}
    table {border-collapse:collapse;border-spacing:0}
    .icon, [class^="icon-"], [class*=" icon-"], *:before, *:after {font-family:icon;speak: none;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale}
    .wrap {width:100%}
    .container {max-width:1024px;margin:0 auto}
    .primary-navigation {position:fixed;top:0;z-index:999999;height:60px;margin:0 auto;background:#fff;box-shadow:0 0 2px 2px rgba(0,0,0,.1)}
    .primary-navigation ul, .primary-navigation li {list-style:none}
    .primary-navigation .logo {display:inline-block;width:40px;height:40px;margin:10px}
    .primary-menu {float:right;display:block;height:60px;margin:0}
    .primary-menu a {display:inline-block}
    .primary-menu>li{position:relative;float:left;display:block;padding:0 25px;line-height:60px}
    .primary-menu li:hover {background:#f4f4f4}
    .primary-menu .arrow {width:0;height:0;margin-left:5px;display:inline-block;border:4px solid #555;border-bottom-color:transparent;border-left-color:transparent;border-right-color:transparent;transition:transform .3s}
    .primary-menu li:hover .arrow {transform: rotate(180deg)}
    .secondary-menu {position:absolute;z-index:9999;left:50%;display:none;padding:0;background:#fff;box-shadow:0 5px 10px rgba(0,0,0,.1);transform:translateX(-50%)}
    .secondary-menu li {padding:0 20px;white-space:nowrap}
    .primary-menu>li:hover .secondary-menu {display:block}
    #sidemenu {background:#fff;padding:0 20px}
    #sidemenu ul{padding:0}
    #sidemenu li{display:block;line-height:60px}
    #sidemenu li a {display:block;padding:0 25px}
    .scrollbox li h3{margin:5px 0;font-size:12px;line-height:1.2em;font-weight:normal;text-align:center}
    .primary-banner {text-align:center;position:relative}
    .amp-carousle-subtitle {position:absolute;left:0;right:0;bottom:10px;font-size:16px;text-align:center;color:#fff}
    .home-section {padding:20px 0 10px 0;margin:10px auto;background:#fff}
    .home-section h1 {text-align:center}
    .home-section h2 {border-bottom:1px solid #555}
    .home-section .icon-more {float:right;transform:rotate(90deg);font-size:12px}
    ul.scroller {list-style:none;margin-top:20px;display:flex;flex-wrap:nowrap;width:auto;overflow-x:scroll}
    ul.scroller li {flex:1 0 30vw; margin-right:3vw}
    ul.scroller h3 {font-size:12px;font-weight:normal;line-height:1.4em;text-align:center}
    .cols-3 {display:-webkit-flex;display:flex;flex-wrap:wrap;justify-content:space-between}
    .cols-3 li {width:32%;text-align:center;font-size:10px}
    .cols-3 h3 {font-weight:normal;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .cols-1 li {width:100%;border-bottom:1px solid #ccc;margin:10px 0;padding-bottom:10px;overflow:hidden}
    .cols-1 li:nth-last-child(1) {border-bottom:none}
    .cols-1 .left {width:32%;float:left}
    .cols-1 .right {width:64%;float:right}
    .cols-1 h3 {line-height:1em;margin-top:0}
    .cols-1 h3.long {line-height:2em}
    .cols-1 .right h3 {font-weight:normal}
    .home-section .cols-1 h3 {line-height:1.5em}
    .category-section .cols-1 h3 {line-height:1.5em}
    .text-tile {list-style:none}
    .text-tile li {float:left;border:1px solid #ccc;line-height:30px;padding:0 10px;border-radius:5px;margin-right:10px;margin-top:10px}
    .category-entry {background:#fff;padding-top:30px;padding-bottom:20px;margin-top:3px}
    .category-section {background:#fff;padding:30px 0;margin-top:5px;overflow:hidden}
    .category-entry a, .category-section a {color:#38f}
    .single-entry {background:#fff;padding-top:30px;padding-bottom:20px;margin-top:5px;overflow:hidden}
    .pub-meta {width:100%;height:40px;padding:10px;border-bottom:1px solid #eee;margin-bottom:20px}
    .pub-meta .author_avatar {float:left;width:40px;height:40px;margin-right:10px}
    .pub-meta .pub-detail {float:left;height:40px;line-height:20px;font-size:12px;color:#333}
    .pub-meta .pub-detail span {display:block}
    .pub-meta img {border-radius:50%}
    .facebooklike {float:right;height:20px;margin-top:15px;line-height:20px}
    .facebookcomment {background:#fff;margin-top:5px}
    .tags {background:#fff;margin-top:5px}
    .tags a{display:inline-block;padding:0 5px;border:1px solid #ccc;border-radius:2px;margin-right:10px;font-size:12px;line-height:20px}
    .tag-entry {background:#fff;padding-top:30px;padding-bottom:20px}
    .author-entry {background:#fff;padding-top:30px;padding-bottom:20px;margin-top:3px}
    .author-section {background:#fff;padding:30px 0;margin-top:5px;overflow:hidden}
    .search-entry {background:#fff;padding-top:30px;margin-top:5px;overflow:hidden}
    .search-entry .search {margin-bottom:20px;overflow:hidden}
    .search-entry input {float:left;width:80%;line-height:25px;text-indent:2px}
    .search-entry .icon-search {width:15%;height:29px;border:none;background:#bc2c23;color:#fff}
    .form-section {background:#fff;margin-top:5px;overflow:hidden}
    .form-section h2 {padding:10px;margin:0;border-bottom:1px solid #e9ebee;font-size:16px}
    .form-section h2:after {content:'\e982';margin-left:5px;font-size:12px;font-weight:normal;color:#bc2c23}
    .form-section .feedback {margin-top:20px}
    .form-section p {width:100%;margin-bottom:10px;overflow:hidden}
    .form-section input {width:80%;border:1px solid #d3d6db;line-height:24px;text-indent:10px}
    .form-section textarea {float:left;width:calc(100% - 30px);padding:5px 10px;border:1px solid #d3d6db;text-indent:0;line-height:16px}
    .form-section .required {color:#bc2c23}
    .form-section .button {float:right;width:80px;height:30px;margin-right:8px;line-height:30px;text-align:center;text-indent:0;background:#bc2c23;color:#fff;border:none;border-radius:3px;cursor:pointer}
    .form-section .note {margin-top:10px;padding-top:5px;border-top:1px solid #e9ebee;font-size:12px;line-height:20px;color:#90949c}
    .form-section .note:before {content:'\e9a5';margin-right:5px;margin-left:2px}
    .form-section .result {width:calc(100% - 30px);padding:2px 10px;margin-bottom:10px;line-height:20px;background:#eee}
    .form-section .result .icon:before {content:'\e9dc';margin-right:4px;color:#90949c}
    .brief-info {text-align:center}
    .brief-info .avatar{width:80px;margin:0 auto}
    .brief-info img{border-radius:50%}
    .brief-info .description {margin-top:20px}
    .block-section {background:#fff;margin-top:5px;padding-top:10px}
    .block-section h2 {border-bottom:1px solid #555}
    .content-section a:after {content:"\e9e2";margin-right:4px}
    .content-section table {width:100%}
    .content-section td {padding:2px 5px;border:1px solid #eee;text-align:center}
    .content-section p {margin:5px 0}
    .contact-info {margin-top:20px;font-size:16px}    
    .pagnaginnav {background:#fff;padding:10px 0;margin-top:5px;text-align:center}
    .pagnaginnav span {padding:3px 10px;display:inline-block}
    .pagnaginnav a {display:inline-block;background:#eee}
    .contactbtn {position:fixed;bottom:0;width:100%;height:40px;line-height:40px;font-size:24px;background:#bc2c23}
    .contactbtn ul {width:calc(100% - 10px);max-width:990px;margin:0 auto;list-style:none;display:flex;display:-webkit-flex;justify-content:space-between;flex-wrap:nowrap}
    .contactbtn li{width:25%;text-align:center;color:#fff}
    .contactbtn li.icon-top{flex-shrink:5}
    .contactbtn a {display:inline-block;width:100%;padding:0 2px;color:#fff}
    .footer {height:30px;font-size:12px;line-height:30px;text-indent:5px;color:#999;background:#1e1e1e}
    .footer .beian {float:right;margin-right:5px}
    @media(max-width:1000px){
         body {background:#f1f1f1}
        .container {width:calc(100% - 20px);padding-right:10px;padding-left:10px}
        .primary-navigation {height:40px}
        .primary-navigation .logo {width:30px;height:30px;margin:5px}
        .primary-menu {display:none}
        .icon-menu {position:relative;float:right;margin-top:10px;display:block;width:25px;height:2px;padding:8px 0;background:#555;background-clip:content-box;cursor:pointer}
        .icon-menu:before {content:'';position:absolute;top:0;right:0;display:block;height:2px;width:24px;background:#555;transform-origin:right top;transition:all .5s}
        .icon-menu:after {content:'';position:absolute;bottom:0;right:0;display:block;height:2px;width:22px;background:#555;transform-origin:right bottom;transition:all .5s}
    }
    </style>
</head>
<body>
<div id="top"></div>
<div class="wrap primary-navigation">
<div class="container">
        <a href="<?php dminfo('mobile_home');?>" class="logo"><amp-img layout="responsive" width="40" height="40" src="<?php dminfo('template_url')?>images/amp-logo.png" alt="Camelway Machinery"></amp-img></a>
         <ul class="primary-menu" id="primary-menu">
            <li><a href="<?php dminfo('mobile_home');?>">Home</a></li>
            <li><a href="<?php the_mobile_category_link(1)?>"><?php the_category_name(1)?></a>
            <i class="arrow"></i>
    <?php
    $posts = get_posts('category=1');
    if(!empty($posts)){ ?>
                <ul class="secondary-menu">
    <?php foreach($posts as $post){ ?>
                    <li><a href="<?php echo $post->get_permalink(true);?>"><?php echo $post->post_subtitle;?></a></li>
    <?php } ?>
                    <li><a href="<?php the_mobile_category_link(2)?>"><?php the_category_name(2)?></a></li>
                    <li><a href="<?php the_mobile_category_link(3)?>"><?php the_category_name(3)?></a></li>
                    <li><a href="<?php the_mobile_category_link(4)?>"><?php the_category_name(4)?></a></li>
                    <li><a href="<?php the_mobile_category_link(5)?>"><?php the_category_name(5)?></a></li>
                </ul>
    <?php } ?>
            </li>
            <li><a href="<?php the_mobile_category_link(6)?>"><?php the_category_name(6)?></a>
            <i class="arrow"></i>
            <?php
    $posts = get_posts('category=6');
    if(!empty($posts)){ ?>
                <ul class="secondary-menu">
    <?php foreach($posts as $post){ ?>
                    <li><a href="<?php echo $post->get_permalink(true);?>"><?php echo $post->post_subtitle;?></a></li>
    <?php } ?>
                    <li><a href="<?php the_mobile_category_link(7)?>">Stone Crushers</a></li>
                </ul>
    <?php } ?>
            </li>
            <li><a href="<?php the_mobile_category_link(10)?>"><?php the_category_name(10)?></a></li>
            <li><a href="<?php the_mobile_category_link(11)?>"><?php the_category_name(11)?></a></li>
            <li><a href="<?php the_mobile_category_link(12)?>"><?php the_category_name(12)?></a></li>
            <li><a href="<?php the_mobile_permalink(1)?>">Contact US</a></li>
        </ul>
        <i role="button" tabindex="0" class="icon-menu" on="tap:sidemenu.toggle"></i>
    </div>
</div>
<amp-sidebar id="sidemenu" side="right" layout="nodisplay">
    <ul>
        <li><a href="<?php dminfo('mobile_home');?>">Home</a></li>
        <li><a href="<?php the_mobile_category_link(1)?>"><?php the_category_name(1)?></a></li>
        <li><a href="<?php the_mobile_category_link(2)?>"><?php the_category_name(2)?></a></li>
        <li><a href="<?php the_mobile_category_link(3)?>"><?php the_category_name(3)?></a></li>
        <li><a href="<?php the_mobile_category_link(4)?>"><?php the_category_name(4)?></a></li>
        <li><a href="<?php the_mobile_category_link(5)?>"><?php the_category_name(5)?></a></li>
        <li><a href="<?php the_mobile_category_link(6)?>"><?php the_category_name(6)?></a></li>
        <li><a href="<?php the_mobile_category_link(7)?>"><?php the_category_name(7)?></a></li>
        <li><a href="<?php the_mobile_category_link(10)?>"><?php the_category_name(10)?></a></li>
        <li><a href="<?php the_mobile_category_link(11)?>"><?php the_category_name(11)?></a></li>
        <li><a href="<?php the_mobile_category_link(12)?>"><?php the_category_name(12)?></a></li>
        <li><a href="<?php the_mobile_category_link(17)?>"><?php the_category_name(18)?></a></li>
        <li><a href="<?php the_mobile_category_link(18)?>"><?php the_category_name(19)?></a></li>
        <li><a href="<?php the_mobile_permalink(1)?>">Contact US</a></li>
    </ul>
</amp-sidebar>
