<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php dm_title()?></title>
<?php if(!is_404()){ ?>
<meta name="keywords" content="<?php dm_keywords();?>">
<meta name="description" content="<?php dm_description();?>">
<link rel="dns-prefetch" href="//data.camelway.net">
<link rel="amphtml" href="<?php dm_mobile_url();?>">
<link rel="canonical" href="<?php dm_url();?>">
<?php } ?>
<link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
<link rel="apple-touch-icon-precompose" href="//data.camelway.net/static/images/camelway-114x114.png">
<link rel="stylesheet" type="text/css" href="<?php dminfo('stylesheet_url')?>?v=20200708">
<link rel="alternate" type="application/atom+xml" title="Camelway RSS" href="<?php dminfo('atom_url')?>">
<?php multi_language()?>
<meta property="og:locale" content="en">
<?php if(is_home()){ ?>
<meta property="og:type" content="website">
<?php } elseif(is_category() || is_author() || is_search()){ ?>
<meta property="og:type" content="object">
<?php } elseif(is_single()) { ?>
<meta property="og:type" content="article">
<?php } if(!is_404()){ ?>
<meta property="og:site_name" content="Camelway Africa">
<meta property="og:title" content="<?php dm_title();?>">
<meta property="og:description" content="<?php dm_description();?>">
<meta property="og:url" content="<?php dm_url();?>">
<meta property="article:publisher" content="https://www.facebook.com/camelway/">
<?php } if(is_single()){ ?>
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
<script type="application/ld+json">{"@context":"https://schema.org/","@type":"Product","name":"<?php the_subtitle()?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"description":"<?php dm_description(200, '...');?>","sku":"p-<?php the_ID()?>","mpn":"<?php echo the_category_slug().'-'.get_the_ID();?>","brand":{"@type":"Brand","name":"Camelway"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"<?php the_ratingValue();?>","reviewCount":"<?php the_reviewCount();?>","bestRating":"5","worstRating":"1"},"offers":{"@type":"AggregateOffer","url":"<?php the_permalink()?>#feedback","priceCurrency":"USD","availability":"https://schema.org/PreOrder","itemCondition":"http://schema.org/NewCondition","lowPrice":"<?php the_post_data('lowprice')?>","highPrice":"<?php the_post_data('highprice')?>","seller":{"@type":"Organization","name":"Camelway Africa"}}}</script>
<?php }elseif(is_single() && in_category(array(8,9))){?>
<script type="application/ld+json">{"@context": "http://schema.org","@type": "BlogPosting","headline": "<?php the_title()?>","alternativeHeadline":"<?php the_subtitle()?>","datePublished": "<?php the_time('Y-m-d');?>","dateModified": "<?php the_modified_time('Y-m-d');?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"keywords":[<?php echo trim(get_the_tag_list('"','", "','"'),',')?>],"mainEntityOfPage":"<?php the_permalink();?>","description":"<?php dm_description(200, '...');?>","author": "<?php the_author()?>","publisher":{"@type": "Organization","name": "Camelway Africa","url": "https://www.camelway.co.za","logo": {"@type": "ImageObject","url": "https://data.camelway.net/static/images/camelway-114x114.png","width":"114","height":"114"}}}</script>
<?php } ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-75819314-9');
    gtag('config', 'AW-918898170');

    !function(f,b,e,v,n,t,s){
        if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)
    }(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '418256865395733');
    fbq('track', 'PageView');
</script>
<script>
    var supportwebp = (function supportwebp(){var elem = document.createElement('canvas');if (!!(elem.getContext && elem.getContext('2d'))) {return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;}return false;})();
    var templateurl = "<?php dminfo('template_url')?>";
    if(!String.prototype.trim){
      String.prototype.trim = function(){
        return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
      };
    }
    function share_init(wrap){
        var wrap = document.querySelector(wrap);
        if(!wrap) return;
        var aw = window.screen.availWidth;
        var ah = window.screen.availHeight;
        var width,height,top,left;
        if(aw>1200)
            width = 800;
        else if(aw>800)
            width = 600;
        else
            width = aw;
        if(ah>800)
            height = 500;
        else
            height = ah;
        top = ah/2 - height/2;
        left = aw/2 - width/2;
        wrap.addEventListener('click', function(e){
            var target = e.target || window.event.srcElement;
            var href = target.getAttribute('_href');
            if(href){
                window.open(href, '_blank', 'width='+width+',height='+height+',left='+left+',top='+top+',location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');
            }
        },false);
    }
    function getCookie(name){
        if(document.cookie.length == 0 )
            return false;
        var start = document.cookie.indexOf(name+"=");
        if(start == -1)
            return false;
        var last = document.cookie.substr(start + name.length +1 );
        var end = last.indexOf(';');
        return unescape(last.substr(0, end));
    }
    function setCookie(name, value, expires){
        var cdate = new Date();
        cdate.setTime(cdate.getTime() + expires*1000);
        var domain = window.location.hostname;
        document.cookie = name+"="+escape(value)+";expires="+cdate.toUTCString()+";domain="+domain+";path=/";
    }
    if(getCookie('camelwayinitpage') == false){
        setCookie('camelwayinitpage', window.location.href, 604800);
    }
    function get_landing_page(){
       return getCookie('camelwayinitpage') || window.location.href;
    }
    function ajax_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var content = obj.content.innnerText || obj.content.value;
        if(content !=''){
            content += "\n\nLanding Page: "+get_landing_page();
        }
        var ajaxurl = obj.action+"?format=json";
        var data = "user_name="+encodeURIComponent(user_name)+"&user_mobile="+encodeURIComponent(user_mobile)+"&user_email="+encodeURIComponent(user_email)+"&content="+encodeURIComponent(content);
        var xhr = new XMLHttpRequest();
        xhr.open("POST",ajaxurl,true);
        xhr.send(data);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var data = JSON.parse(xhr.responseText);
                if(data.error_code == 200){
                    //google conversion
                    gtag('event', 'conversion', {'send_to': 'AW-918898170/qNZgCIL0kXQQ-ouVtgM'});
                    //facebook conversion
                    fbq('track', 'Lead');
                }
               alert(data.error_message);
            }
        }
        return false;
    }
</script>
</head>
<body>
<div class="container top">
    <div class="s-logo">
        <img src="<?php dminfo('template_url')?>images/logo.png" alt="Camelway Machinery">
    </div>
    <div class="introduce">
        <p>Camelway desin and manufacture concrete machinery since 1983. <a href="<?php the_permalink(1);?>">More &gt;&gt;</a></p>
    </div>
</div>
<div class="container head">
    <a href="<?php dminfo('home');?>" class="logo"><img src="<?php dminfo('template_url')?>images/logo.png" alt="Camelway"></a>
    <div class="top-contact">
        <p class="mobile">+8617839193601,+8615617584955</p>
        <p class="email">sales@camelway.co.za, vip@camelway.com</p>
    </div>
</div>
<div class="container menu">
    <ul>
        <li><a href="<?php dminfo('home')?>">Home</a></li>
        <li><a href="<?php the_permalink(1);?>">ABout Us</a></li>
        <li><a href="<?php the_permalink(2);?>">Contact Us</a></li>
        <li><a href="<?php the_category_link(8);?>"><?php the_category_name(8)?></a></li>
        <li><a href="<?php the_category_link(9);?>"><?php the_category_name(9)?></a></li>
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