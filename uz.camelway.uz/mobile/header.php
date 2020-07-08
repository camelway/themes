<!DOCTYPE HTML>
<html amp lang="uz">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
    <title><?php dm_title();?></title>
<?php if(is_home() || is_single() || is_category() || is_page()){ ?>
    <meta name="keywords" content="<?php dm_keywords();?>">
    <meta name="description" content="<?php dm_description(220);?>">
<?php } if(!is_404()) {?>
    <link rel="canonical" href="<?php dm_url();?>">
<?php } ?>
    <link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
    <link rel="apple-touch-icon-precompose" href="//data.camelway.net/static/images/camelway-114x114.png">
    <meta property="og:locale" content="uz">
<?php if(is_home()){ ?>
    <meta property="og:type" content="website">
<?php } elseif(is_category() || is_author() || is_search()){ ?>
    <meta property="og:type" content="object">
<?php } elseif(is_single()) { ?>
    <meta property="og:type" content="article">
<?php } ?>
    <meta property="og:site_name" content="ИП ООО «CAMELWAY CHINA»">
    <meta property="og:title" content="<?php dm_title();?>">
    <meta property="og:description" content="<?php dm_description(200);?>">
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
<?php } if(is_home()){?>
    <script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?php echo home_url(1)?>#organization","name":"ИП ООО «CAMELWAY CHINA»","url":"<?php echo home_url(1)?>","sameAs":["https://es.camelway.com/","https://www.facebook.com/camelway/"],"logo":{"@type":"ImageObject","@id":"<?php echo home_url(1)?>#logo","inLanguage":"uz","url":"https://data.camelway.net/static/images/camelway-500x500.png","width":500,"height":500,"caption":"ИП ООО «CAMELWAY CHINA» Logo"},"image":{"@id":"<?php echo home_url(1)?>#logo"}},{"@type":"WebSite","@id":"<?php echo home_url(1)?>#website","url":"<?php echo home_url(1)?>","name":"ИП ООО «CAMELWAY CHINA»","inLanguage":"uz","description":"<?php dm_description();?>","publisher":{"@id":"<?php echo home_url(1)?>#organization"},"potentialAction":[{"@type":"SearchAction","target":"<?php echo home_url(1)?>?s={search_term_string}","query-input":"required name=search_term_string"}]},{"@type":"WebPage","@id":"<?php echo home_url(1)?>#webpage","url":"<?php echo home_url(1)?>","name":"ИП ООО «CAMELWAY CHINA» | Beton zavodi | Asfalt zavodi | Tosh maydalash zavodi | Blok ishlab chiqarish zavodi | Beton qorgich | Beton nasosi | Rebar uskunalari","isPartOf":{"@id":"<?php echo home_url(1)?>#website"},"inLanguage":"uz","about":{"@id":"<?php echo home_url(1)?>#organization"},"datePublished":"<?php the_time('Y-m-d h:i:sP', 1);?>","dateModified":"<?php the_modified_time('Y-m-d h:i:sP')?>","description":"<?php dm_description();?>","potentialAction":[{"@type":"ReadAction","target":["<?php echo home_url(1)?>"]}]}]}</script>
<?php }elseif(is_category()){?>
    <script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?php echo home_url(1)?>#organization","name":"ИП ООО «CAMELWAY CHINA»","url":"<?php echo home_url(1)?>","sameAs":["https://es.camelway.com/","https://www.facebook.com/camelway/"],"logo":{"@type":"ImageObject","@id":"<?php echo home_url(1)?>#logo","inLanguage":"uz","url":"https://data.camelway.net/static/images/camelway-500x500.png","width":500,"height":500,"caption":"ИП ООО «CAMELWAY CHINA» Logo"},"image":{"@id":"<?php echo home_url(1)?>#logo"}},{"@type":"WebSite","@id":"<?php echo home_url(1)?>#website","url":"<?php echo home_url(1)?>","name":"ИП ООО «CAMELWAY CHINA»","inLanguage":"uz","description":""CAMELWAY CHINA" chetel korxonasi MChJ O'zbekistonda va uning atrofidagi hududlarda beton zavodlari, beton qorishtirgichlar, beton bloklari ishlab chiqarish uskunalari va turli xil qurilish mashinalarini sotadi.","publisher":{"@id":"<?php echo home_url(1)?>#organization"},"potentialAction":[{"@type":"SearchAction","target":"<?php echo home_url(1)?>?s={search_term_string}","query-input":"required name=search_term_string"}]},{"@type":"CollectionPage","@id":"<?php the_category_link()?>#webpage","url":"<?php  the_category_link()?>","name":"<?php the_category_name()?>","isPartOf":{"@id":"<?php echo home_url(1)?>#website"},"inLanguage":"uz","description":"<?php dm_description(180)?>..."}]}</script>
<?php }elseif(is_single() && in_category(array(1,2,3,4,5,6,7))) { ?>
    <script type="application/ld+json">{"@context":"https://schema.org/","@type":"Product","name":"<?php the_subtitle()?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"description":"<?php echo dm_trim_words(get_the_excerpt(), 200);?>","sku":"p-<?php the_ID()?>","mpn":"<?php echo the_category_slug().'-'.get_the_ID();?>","brand":{"@type":"Brand","name":"Camelway"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"<?php the_ratingValue();?>","reviewCount":"<?php the_reviewCount();?>","bestRating":"5","worstRating":"1"},"offers":{"@type":"AggregateOffer","url":"<?php the_permalink()?>#feedback","priceCurrency":"USD","availability":"https://schema.org/PreOrder","itemCondition":"http://schema.org/NewCondition","lowPrice":"<?php the_post_data('lowprice')?>","highPrice":"<?php the_post_data('highprice')?>","seller":{"@type":"Organization","name":"ИП ООО «CAMELWAY CHINA»"}}}</script>
<?php }elseif(is_single() && in_category(array(8,9))){?>
    <script type="application/ld+json">{"@context": "http://schema.org","@type": "BlogPosting","headline": "<?php the_title()?>","alternativeHeadline":"<?php the_subtitle()?>","datePublished": "<?php the_time('Y-m-d');?>","dateModified": "<?php the_modified_time('Y-m-d');?>","image":[<?php $images = get_post_images('gallery'); $tmp = '"'.get_the_thumbnail().'",';foreach($images as $image){ $tmp .= sprintf('"%s",', $image->url);} echo trim($tmp, ',')?>],"keywords":[<?php echo trim(get_the_tag_list('"','", "','"'),',')?>],"mainEntityOfPage":"<?php the_permalink();?>","description":"<?php echo dm_trim_words(get_the_excerpt(), 160)?>","author": "<?php the_author()?>","publisher":{"@type": "Organization","name": "ИП ООО «CAMELWAY CHINA»","url": "https://uz.camelway.uz","logo": {"@type": "ImageObject","url": "https://data.camelway.net/static/images/camelway-114x114.png","width":"114","height":"114"}}}</script>
<?php } ?>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
    :root {
    --favoritesicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTcgMThsNS0yLjcxTDE3IDE4VjZIN3YxMnonIGZpbGw9JyNGRkYnIGZpbGwtcnVsZT0nZXZlbm9kZCcvPjwvc3ZnPg==);
    --facebookicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTEzLjQyMyAyMHYtNy4yOThoMi40NjRsLjM2OS0yLjg0NWgtMi44MzJWOC4wNDJjMC0uODI0LjIzLTEuMzg1IDEuNDE3LTEuMzg1aDEuNTE1VjQuMTExQTIwLjI1NSAyMC4yNTUgMCAwMDE0LjE0OCA0Yy0yLjE4MyAwLTMuNjc4IDEuMzI2LTMuNjc4IDMuNzZ2Mi4wOTdIOHYyLjg0NWgyLjQ3VjIwaDIuOTUzeicgZmlsbD0nI0ZGRicgZmlsbC1ydWxlPSdldmVub2RkJy8+PC9zdmc+);
    --linkedicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTQuMjQ2IDguOTU0aDMuNDF2MTAuMjgxaC0zLjQxem0xLjcyNS00LjkzNWMtMS4xNjcgMC0xLjkyOS43NjktMS45MjkgMS43NzYgMCAuOTg3Ljc0IDEuNzc3IDEuODg0IDEuNzc3aC4wMjJjMS4xOSAwIDEuOTMtLjc5IDEuOTMtMS43NzctLjAyMy0xLjAwNy0uNzQtMS43NzYtMS45MDctMS43NzZ6bTEwLjA1MiA0LjcxNWMtMS44MSAwLTIuNjIuOTk3LTMuMDczIDEuNjk4VjguOTc2SDkuNTRjLjA0NS45NjUgMCAxMC4yODEgMCAxMC4yODFoMy40MXYtNS43NDJjMC0uMzA3LjAyMi0uNjE0LjExMi0uODM0LjI0Ni0uNjEzLjgwNy0xLjI1IDEuNzUtMS4yNSAxLjIzMyAwIDEuNzI3Ljk0NCAxLjcyNyAyLjMyNXY1LjUwMWgzLjQxdi01Ljg5NmMwLTMuMTU4LTEuNjgzLTQuNjI3LTMuOTI2LTQuNjI3eicgZmlsbD0nI0ZGRicgZmlsbC1ydWxlPSdldmVub2RkJy8+PC9zdmc+);
    --twittericon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTIwIDcuNTM5YTYuNTYgNi41NiAwIDAxLTEuODg1LjUxNyAzLjI5NCAzLjI5NCAwIDAwMS40NDMtMS44MTYgNi41NzUgNi41NzUgMCAwMS0yLjA4NS43OTYgMy4yODMgMy4yODMgMCAwMC01LjU5MyAyLjk5NEE5LjMyIDkuMzIgMCAwMTUuMTE0IDYuNmEzLjI4IDMuMjggMCAwMDEuMDE2IDQuMzgyIDMuMjc0IDMuMjc0IDAgMDEtMS40ODctLjQxdi4wNDFhMy4yODUgMy4yODUgMCAwMDIuNjMzIDMuMjE4IDMuMzA1IDMuMzA1IDAgMDEtMS40ODIuMDU2IDMuMjg2IDMuMjg2IDAgMDAzLjA2NiAyLjI4QTYuNTg1IDYuNTg1IDAgMDE0IDE3LjUyNCA5LjI5MSA5LjI5MSAwIDAwOS4wMzIgMTljNi4wMzggMCA5LjM0LTUgOS4zNC05LjMzNyAwLS4xNDMtLjAwNC0uMjg1LS4wMS0uNDI1QTYuNjcyIDYuNjcyIDAgMDAyMCA3LjUzOHonIGZpbGw9JyNGRkYnIGZpbGwtcnVsZT0nZXZlbm9kZCcvPjwvc3ZnPg==);
    --skypeicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTE5LjUzNyAxMy42OThjLjExNS0uNTIuMTc2LTEuMDYuMTc2LTEuNjE0IDAtNC4xNTUtMy40MTUtNy41MjQtNy42My03LjUyNC0uNDQ0IDAtLjg4LjAzOC0xLjMwNC4xMUE0LjQ0NCA0LjQ0NCAwIDAwOC40MjUgNEM1Ljk4MSA0IDQgNS45NTQgNCA4LjM2NGMwIC44MDUuMjIyIDEuNTYuNjA4IDIuMjA3YTcuNDI4IDcuNDI4IDAgMDAtLjE1NSAxLjUxM2MwIDQuMTU2IDMuNDE2IDcuNCA3LjYzIDcuNC40NzcgMCAuOTQ0LS4wNDQgMS4zOTctLjEyNi42MjMuMzMgMS4zMzUuNjQyIDIuMDkyLjY0MiAyLjQ0NCAwIDQuNDI1LTEuOTUzIDQuNDI1LTQuMzY0YTQuMyA0LjMgMCAwMC0uNDYtMS45Mzh6bS0zLjk3NCAxLjQ1N2MtLjI5NC40MTgtLjcyNS43NDctMS4yOTMuOTg0LS41NjcuMjM4LTEuMjM5LjM1Ni0yLjAxNi4zNTYtLjkzMyAwLTEuNzAyLS4xNjItMi4zMDgtLjQ4NmEyLjk4NiAyLjk4NiAwIDAxLTEuMDQ3LS45MzRjLS4yNjgtLjM5LS40MDMtLjc2OC0uNDAzLTEuMTM3IDAtLjIxMy4wOC0uMzk1LjI0Mi0uNTQ3YS44NTUuODU1IDAgMDEuNjE1LS4yMjkuNzYuNzYgMCAwMS41MTIuMTc4Yy4xNC4xMTkuMjYuMjk0LjM1OC41MjcuMTIuMjc4LjI1LjUxLjM5LjY5NS4xMzkuMTg1LjMzNi4zNC41ODkuNDYuMjU0LjEyLjU4Ny4xOCAxIC4xOC41NjYgMCAxLjAyNy0uMTIgMS4zODItLjM2NC4zNTQtLjI0My41MzItLjU0Ny41MzItLjkxYS45MTkuOTE5IDAgMDAtLjI4Ny0uNzAyIDEuODggMS44OCAwIDAwLS43NDEtLjQxMiAxMy4yMSAxMy4yMSAwIDAwLTEuMjE2LS4zMDNjLS42NzgtLjE0Ni0xLjI0Ny0uMzE4LTEuNzAzLS41MTMtLjQ1OC0uMTk2LS44MjItLjQ2My0xLjA5LS44LS4yNjktLjM0LS40MDMtLjc1OS0uNDAzLTEuMjYgMC0uNDguMTQyLS45MDQuNDI2LTEuMjc1LjI4My0uMzcyLjY5My0uNjU4IDEuMjMtLjg1OC41MzctLjIgMS4xNy0uMjk5IDEuODk1LS4yOTkuNTggMCAxLjA4Mi4wNjYgMS41MDUuMTk4LjQyMy4xMzMuNzc0LjMwOSAxLjA1My41MjguMjguMjIuNDg0LjQ1LjYxMi42OTEuMTMuMjQuMTk0LjQ3Ny4xOTQuNzA1IDAgLjIxLS4wOC40LS4yNDEuNTY3YS44LjggMCAwMS0uNjAzLjI1MmMtLjIyIDAtLjM4Ni0uMDUtLjUtLjE1MS0uMTE0LS4xMDEtLjIzNy0uMjY2LS4zNy0uNDk1YTIuMjcgMi4yNyAwIDAwLS42MTgtLjc2OGMtLjI0MS0uMTg0LS42MjctLjI3Ni0xLjE2LS4yNzYtLjQ5NCAwLS44OTMuMS0xLjE5Ni4zLS4zMDMuMTk5LS40NTUuNDQtLjQ1NS43MiAwIC4xNzMuMDUzLjMyNC4xNTUuNDUuMTAzLjEyOC4yNDUuMjM1LjQyNi4zMjYuMTguMDkxLjM2My4xNjIuNTQ3LjIxNC4xODUuMDUyLjQ5LjEyNi45MTYuMjI1YTE1LjQ3IDE1LjQ3IDAgMDExLjQ0Ni4zOGMuNDMyLjEzOC44LjMwNyAxLjEwMy41MDMuMzAyLjE5OC41NC40NS43MDkuNzUyLjE3LjMwMi4yNTUuNjczLjI1NSAxLjExMSAwIC41MjUtLjE0OC45OTgtLjQ0MiAxLjQxN3onIGZpbGw9JyNGRkYnIGZpbGwtcnVsZT0nZXZlbm9kZCcvPjwvc3ZnPg==);
    --vibericon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PGcgZmlsbD0nI0ZGRicgZmlsbC1ydWxlPSdldmVub2RkJz48cGF0aCBkPSdNMTguNDM0IDE1LjU3NGMtLjQ4NC0uMzkxLTEuMDAyLS43NDMtMS41MTEtMS4xMDItMS4wMTYtLjcxOC0xLjk0NS0uNzczLTIuNzAzLjM4LS40MjYuNjQ4LTEuMDIxLjY3Ny0xLjY0NC4zOTItMS43MTgtLjc4Mi0zLjA0NC0xLjk4OS0zLjgyMS0zLjc0My0uMzQ0LS43NzctLjM0LTEuNDczLjQ2NS0yLjAyMi40MjUtLjI5Ljg1NC0uNjM0LjgyLTEuMjY4LS4wNDUtLjgyOC0yLjA0My0zLjU5My0yLjgzMi0zLjg4NWExLjQyOSAxLjQyOSAwIDAwLS45ODQgMEM0LjM3MyA0Ljk1IDMuNjA2IDYuNDggNC4zNCA4LjI5MmMyLjE5IDUuNDA1IDYuMDQzIDkuMTY3IDExLjM0OSAxMS40NjMuMzAyLjEzLjYzOC4xODMuODA4LjIzIDEuMjA4LjAxMiAyLjYyMy0xLjE1OCAzLjAzMi0yLjMxOC4zOTMtMS4xMTctLjQzOC0xLjU2LTEuMDk2LTIuMDkzek0xMi40ODUgNC44OGMzLjg3OS42IDUuNjY4IDIuNDU0IDYuMTYyIDYuMzguMDQ1LjM2My0uMDkuOTA5LjQyNi45MTkuNTM4LjAxLjQwOC0uNTI4LjQxMy0uODkuMDQ1LTMuNjk5LTMuMTYzLTcuMTI3LTYuODg4LTcuMjUzLS4yODEuMDQtLjg2My0uMTk1LS45LjQzOC0uMDI0LjQyNy40NjYuMzU3Ljc4Ny40MDZ6Jy8+PHBhdGggZD0nTTEzLjI0NCA1Ljk1N2MtLjM3My0uMDQ1LS44NjUtLjIyMi0uOTUzLjI5OS0uMDkuNTQ2LjQ1OC40OS44MTEuNTcgMi4zOTUuNTM4IDMuMjMgMS40MTQgMy42MjQgMy44MDIuMDU3LjM0OS0uMDU3Ljg5LjUzMi44LjQzNi0uMDY2LjI3OC0uNTMuMzE1LS44MDIuMDItMi4yOTMtMS45MzYtNC4zOC00LjMyOS00LjY2OXonLz48cGF0aCBkPSdNMTMuNDY0IDcuODMyYy0uMjQ5LjAwNi0uNDkzLjAzMy0uNTg1LjMtLjEzNy40LjE1Mi40OTYuNDQ2LjU0NC45ODMuMTU4IDEuNS43NCAxLjU5OCAxLjcyNS4wMjcuMjY4LjE5NS40ODQuNDUyLjQ1NC4zNTYtLjA0My4zODktLjM2MS4zNzgtLjY2NC4wMTctMS4xMDYtMS4yMjctMi4zODUtMi4yODktMi4zNTl6Jy8+PC9nPjwvc3ZnPg==);
    --telegramicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTE4LjkyIDYuMDg5TDQuNzQ3IDExLjU1NWMtLjk2Ny4zODgtLjk2Mi45MjgtLjE3NiAxLjE2OGwzLjUzNCAxLjEwNCAxLjM1MyA0LjE0NmMuMTY0LjQ1NC4wODMuNjM0LjU2LjYzNC4zNjggMCAuNTMtLjE2OC43MzYtLjM2OC4xMy0uMTI3LjkwMy0uODggMS43NjctMS43MTlsMy42NzcgMi43MTdjLjY3Ni4zNzMgMS4xNjUuMTggMS4zMzMtLjYyOGwyLjQxNC0xMS4zNzRjLjI0Ny0uOTktLjM3OC0xLjQ0LTEuMDI1LTEuMTQ2ek04LjY2IDEzLjU3M2w3Ljk2Ny01LjAyNmMuMzk4LS4yNDIuNzYzLS4xMTIuNDYzLjE1NGwtNi44MjIgNi4xNTUtLjI2NSAyLjgzMy0xLjM0My00LjExNnonIGZpbGw9JyNGRkYnIGZpbGwtcnVsZT0nZXZlbm9kZCcvPjwvc3ZnPg==);
    --whatsappicon: url(data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PScwIDAgMjQgMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTIwIDExLjc5NGMwIDQuMzA0LTMuNTE3IDcuNzk0LTcuODU1IDcuNzk0YTcuODcgNy44NyAwIDAxLTMuNzk2LS45N0w0IDIwbDEuNDE4LTQuMTgyYTcuNzE0IDcuNzE0IDAgMDEtMS4xMjctNC4wMjRDNC4yOSA3LjQ4OSA3LjgwNyA0IDEyLjE0NSA0UzIwIDcuNDkgMjAgMTEuNzk0em0tNy44NTUtNi41NTNjLTMuNjQxIDAtNi42MDMgMi45NC02LjYwMyA2LjU1M0E2LjQ4IDYuNDggMCAwMDYuOCAxNS42MzZsLS44MjUgMi40MzMgMi41MzctLjgwNmE2LjYgNi42IDAgMDAzLjYzMyAxLjA4NGMzLjY0MiAwIDYuNjA0LTIuOTQgNi42MDQtNi41NTNzLTIuOTYyLTYuNTUzLTYuNjA0LTYuNTUzem0zLjk2NyA4LjM0OGMtLjA0OS0uMDgtLjE3Ny0uMTI4LS4zNy0uMjIzLS4xOTItLjA5NS0xLjEzOS0uNTU4LTEuMzE1LS42MjEtLjE3Ny0uMDY0LS4zMDUtLjA5Ni0uNDM0LjA5NWExMC45MiAxMC45MiAwIDAxLS42MS43NDljLS4xMTIuMTI4LS4yMjQuMTQzLS40MTYuMDQ4LS4xOTMtLjA5Ni0uODEzLS4yOTctMS41NDktLjk0OGE1Ljc2IDUuNzYgMCAwMS0xLjA3LTEuMzIzYy0uMTEzLS4xOTEtLjAxMy0uMjk1LjA4NC0uMzkuMDg2LS4wODYuMTkyLS4yMjMuMjg5LS4zMzQuMDk2LS4xMTIuMTI4LS4xOTEuMTkyLS4zMTlzLjAzMi0uMjM5LS4wMTYtLjMzNWMtLjA0OC0uMDk1LS40MzMtMS4wMzUtLjU5NC0xLjQxOC0uMTYtLjM4Mi0uMzItLjMxOC0uNDMzLS4zMTgtLjExMiAwLS4yNC0uMDE2LS4zNjktLjAxNmEuNzEuNzEgMCAwMC0uNTEzLjIzOWMtLjE3Ny4xOS0uNjc0LjY1My0uNjc0IDEuNTkzcy42OSAxLjg0OC43ODYgMS45NzZjLjA5Ni4xMjcgMS4zMzIgMi4xMTkgMy4yODkgMi44ODQgMS45NTguNzY0IDEuOTU4LjUxIDIuMzEuNDc3LjM1My0uMDMxIDEuMTQtLjQ2MSAxLjMtLjkwOC4xNi0uNDQ2LjE2LS44MjkuMTEzLS45MDh6JyBmaWxsPScjRkZGJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnLz48L3N2Zz4=);
    --searchicon: url(data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iaWNvbiIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCI+PHBhdGggZD0iTTEwMDUuMjY4IDkxNC4zODlMNjk2Ljg0NSA2MDUuOTY2YzQ0Ljc5Mi02Mi43MDggNzEuMDI3LTEzOC44NTQgNzEuMDI3LTIyMi4wMzhDNzY3Ljg3MiAxNzIuMTI4IDU5NS43NDQgMCAzODMuOTQ0IDBTLjAxNiAxNzIuMTI4LjAxNiAzODMuOTI4czE3Mi4xMjggMzgzLjkyOCAzODMuOTI4IDM4My45MjhjODMuMTg0IDAgMTU5LjMzLTI2LjIzNSAyMjIuNjc4LTcxLjAyN2wzMDguNDIyIDMwOC40MjNjMjQuOTU2IDI0Ljk1NSA2NS45MDggMjQuOTU1IDkwLjIyNCAwIDI0LjMxNS0yNC45NTYgMjQuOTU1LTY1LjkwOCAwLTkwLjg2M3pNOTUuOTk4IDM4My45MjhjMC0xNTkuMzMgMTI4LjYxNi0yODcuOTQ2IDI4Ny45NDYtMjg3Ljk0NlM2NzEuODkgMjI0LjU5OCA2NzEuODkgMzgzLjkyOCA1NDMuMjc0IDY3MS44NzQgMzgzLjk0NCA2NzEuODc0IDk1Ljk5OCA1NDMuMjU4IDk1Ljk5OCAzODMuOTI4eiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==);
    --freshicon: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB0PSIxNTg2NDI2MDYzNzQyIiBjbGFzcz0iaWNvbiIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHAtaWQ9IjIxMzYiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PC9zdHlsZT48L2RlZnM+PHBhdGggZD0iTTY3Ni44NjQgNzQ3LjMzMDU2Yy00OS45ODY1NiAzNS4wNzItMTA4LjU0NCA1Mi41MzYzMi0xNjguMzIgNTEuODQtNy45MzYtMC4xMzMxMi0xNS43NDQtMC43MDY1Ni0yMy41NTItMS4yOC0zLjEzODU2LTAuMzIyNTYtNi4zMzg1Ni0wLjgzOTY4LTkuNDcyLTEuMjgtNi4yMDU0NC0wLjc2OC0xMi4xNi0xLjU0MTEyLTE4LjE3Ni0yLjc1OTY4LTMuNjUwNTYtMC42NC03LjM1NzQ0LTEuNjY0LTEwLjg4LTIuNDkzNDQtNS44ODgtMS4yOC0xMS42NDgtMi41Ni0xNy40MDgtNC4yMjQtMi42ODgtMS4wMjQtNS4zMDk0NC0xLjg1MzQ0LTguMDAyNTYtMi45NDQtNi42NTYtMi4wNDgtMTMuMTc4ODgtNC40MTg1Ni0xOS41MTc0NC03LjA0LTEuNDA4LTAuNjQtMi44MTYtMS4xNTItNC4yOTA1Ni0xLjcyNTQ0YTQ2Ny44NCA0NjcuODQgMCAwIDEtMjEuODg4LTEwLjYyNGMtMC4yNTYtMC4xODk0NC0wLjY0LTAuMzIyNTYtMC44OTA4OC0wLjUxMi0yNC4xMzA1Ni0xMy4zMTItNDYuMDgtMjkuNTY4LTY1LjQxMzEyLTQ5LjA5MDU2LTAuMzE3NDQtMC4zMTc0NC0wLjU3MzQ0LTAuNzA2NTYtMC45NTc0NC0xLjAyNGEyNDEuMjEzNDQgMjQxLjIxMzQ0IDAgMCAxLTE3LjE1Mi0xOC44ODI1NmMtMS4wOTA1Ni0xLjM0MTQ0LTIuMTc2LTIuNjgyODgtMy4zMjgtNC4zNTItMzkuMjI5NDQtNDkuMTUyLTYyLjkwOTQ0LTExMS4zNi02Mi45MDk0NC0xNzguOTQ0aDc1LjcwOTQ0TDE3OS4yNjY1NiAzMzAuMzczMTJsLTEyMC45NiAxODEuNTA0SDEzMy44ODhjMCA3OS40ODggMjQuODkzNDQgMTUzLjIxNiA2Ny4wMDU0NCAyMTQuMjcyIDAuNTEyIDAuODk2IDAuODM0NTYgMS44NTM0NCAxLjQwOCAyLjYyNjU2IDQuMzUyIDYuMzMzNDQgOS4yMTYgMTIuMDMyIDEzLjg5MDU2IDE3Ljg1MzQ0IDEuNzkyIDIuMTA5NDQgMy4zMjggNC4yODU0NCA1LjI0OCA2LjcxNzQ0IDYuODQ1NDQgOC4yNTg1NiAxNC4yNjk0NCAxNi4xMjggMjEuNzYgMjMuODY5NDQgMC43NjggMC43NjggMS40MDI4OCAxLjQxMzEyIDIuMDQ4IDIuMTE0NTYgMjUuMzQ0IDI1LjQwNTQ0IDUzLjg4Mjg4IDQ2LjY1ODU2IDg1LjA1MzQ0IDYzLjgwNTQ0bDIuNDkzNDQgMS4zNDY1NmEzNzMuNjU3NiAzNzMuNjU3NiAwIDAgMCAyNy40NTg1NiAxMy4zNzM0NGMyLjM3MDU2IDEuMDI0IDQuNjA4IDIuMDQ4IDYuOTEyIDMuMDEwNTYgOC4wNjQgMy4zODk0NCAxNi4yNTYgNi4yNzIgMjQuNTA5NDQgOS4wODggMy45MDY1NiAxLjM0MTQ0IDcuNzQ2NTYgMi42MjE0NCAxMS43MTQ1NiAzLjkwMTQ0IDcuMjI5NDQgMi4wNDggMTQuNTkyIDMuOTA2NTYgMjIuMDE2IDUuNjM3MTIgNC45OTIgMS4xNTIgOS43MjggMi40MzIgMTQuODQ4IDMuMzI4IDIuMDQ4IDAuNTEyIDMuOTY4IDEuMTUyIDYuMDc3NDQgMS4zNDE0NCA3LjEwNjU2IDEuMjggMTQuMTQ2NTYgMS45MiAyMS4wNTg1NiAyLjc0OTQ0IDIuNTYgMC40NTA1NiA1LjEyIDAuOTAxMTIgNy42MTM0NCAxLjE1NzEyIDEyLjYwNTQ0IDEuMjEzNDQgMjUuMjE2IDEuOTg2NTYgMzcuNzYgMS45ODY1NiA3Ni44IDAgMTUxLjgwOC0yMy40OTA1NiAyMTYuMTkyLTY4LjYwOCAyMC40OC0xNC40MDI1NiAyNS41MzM0NC00Mi43NTIgMTEuMjAyNTYtNjMuMTA5MTItMTQuNTkyLTIwLjU0NjU2LTQyLjgxMzQ0LTI1LjUzMzQ0LTYzLjI5MzQ0LTExLjAwOG0yMTMuMTItMjM1LjQ1MzQ0YzAtNzkuMjk4NTYtMjQuNTc2LTE1Mi45Ni02Ni40OTg1Ni0yMTMuNjk4NTYtMC42NC0xLjAyNC0xLjAyNC0yLjEwOTQ0LTEuNTM2LTMuMDA1NDRhNDM1LjY0MDMyIDQzNS42NDAzMiAwIDAgMC0xNi43MDE0NC0yMS40NDI1NiAyNi44NTQ0IDI2Ljg1NDQgMCAwIDEtMS44NTg1Ni0yLjU2Yy0zOC41MjgtNDYuMzk3NDQtODYuNzIyNTYtODIuNDMyLTE0MS4xODQtMTA1Ljk4NC0xLjU5NzQ0LTAuNjM0ODgtMi45NDQtMS4zNDE0NC00LjU0MTQ0LTEuOTgxNDQtOC43NzA1Ni0zLjU4NC0xNy42NjQtNi43MjI1Ni0yNi43NTcxMi05Ljc5NDU2LTMuMDcyLTEuMDI0LTYuNC0yLjE3MDg4LTkuNi0zLjEzMzQ0LTcuOTM2LTIuNDk4NTYtMTUuNzM4ODgtNC40OC0yMy43NDE0NC02LjMzODU2LTQuNDE4NTYtMC45NTc0NC04Ljk2LTIuMTA5NDQtMTMuMzc4NTYtMy4wMDU0NC0yLjIzNzQ0LTAuMzc4ODgtNC4yMTg4OC0xLjAyNC02LjU4OTQ0LTEuNDc0NTYtNS45NDk0NC0wLjk1NzQ0LTExLjgzNzQ0LTEuNTM2LTE3Ljg1MzQ0LTIuMjM3NDQtNC4xNjI1Ni0wLjUxMi04LjEzMDU2LTEuMTUyLTEyLjM1NDU2LTEuNjAyNTYtMTAuMDQ1NDQtMC45NTc0NC0yMC4wMjk0NC0xLjM0MTQ0LTMwLjAxODU2LTEuNTM2LTEuNzkyIDAtMy41ODQtMC4yNTYtNS40Mzc0NC0wLjI1NmE0Ljg2NCA0Ljg2NCAwIDAgMC0wLjk2MjU2IDAuMTMzMTJDNDM0LjIzNzQ0IDEzNC4wMTYgMzU5LjM1NzQ0IDE1Ny4xODQgMjk1LjEwMTQ0IDIwMi4yNGMtMjAuNDggMTQuMzM2LTI1LjUzMzQ0IDQyLjYyNC0xMS4wNjk0NCA2My4yMzIgMTQuMjY5NDQgMjAuNDEzNDQgNDIuNjg1NDQgMjUuNDcyIDYzLjIzMiAxMS4wMDggNDkuNTk3NDQtMzQuNjg4IDEwNy40NTM0NC01Mi4zNTIgMTY2Ljg0NTQ0LTUxLjc3MzQ0IDguNTE0NTYgMC4wNjE0NCAxNy4wMjQgMC40NDU0NCAyNS4yNzc0NCAxLjI4IDIuNTYgMC4xODk0NCA1LjA1ODU2IDAuNTczNDQgNy42MTg1NiAwLjk1NzQ0IDYuODQ1NDQgMC44OTYgMTMuNjM0NTYgMS43OTIgMjAuMjg1NDQgMy4yIDIuODgyNTYgMC41MTIgNS44ODggMS4yOCA4LjY0MjU2IDEuOTIgNi42NTYgMS40Njk0NCAxMy4wNTYgMy4wMDU0NCAxOS40NTYgNC45OTIgMi4xMTQ1NiAwLjU3MzQ0IDQuMDM0NTYgMS4yOCA2LjAxNiAyLjA0OCA3LjQyNCAyLjM2NTQ0IDE0LjY1ODU2IDQuOTI1NDQgMjEuNTY1NDQgNy44Njk0NCAwLjc2OCAwLjE5NDU2IDEuNDc0NTYgMC43NjggMi4xNzYgMS4wMjRBMjg4LjAwNTEyIDI4OC4wMDUxMiAwIDAgMSA3MzMuNTY4IDMyOS4yMTZhMS40OTUwNCAxLjQ5NTA0IDAgMCAwIDAuNDQ1NDQgMC41NzM0NGM0MC43NzA1NiA0OS42NjQgNjUuMjEzNDQgMTEzLjAyNCA2NS4yOCAxODIuMDgyNTZoLTc1Ljc3NmwxMjEuMjE2IDE4MS41NjU0NCAxMjAuODkzNDQtMTgxLjU2NTQ0aC03NS42NDI4OHoiIHAtaWQ9IjIxMzciIGZpbGw9IiNmZjY1MDEiPjwvcGF0aD48L3N2Zz4=);
}
    body {font-size:14px;font-family:sans-serif,Arial;line-height:1.34em;;color:#333;background:#f1f1f1}
    ul, ol, li,dl,dt,dd {padding:0;margin:0}
    img, video {max-width:100%;max-height:100%;height:auto;border:none;vertical-align:middle}
    a {text-decoration:none;color:inherit}
    h1 {font-size:22px}
    h2 {font-size:18px}
    h3 {font-size:16px}
    h4 {font-size:15px}
    h5 {font-size:14px}
    table {border-collapse:collapse;border-spacing:0}
    .wrap {width:100%;margin:0 auto;box-sizing:border-box}
    .container {width:100%;padding:0 5px;box-sizing:border-box}
    header .head {height:40px;background:#fff}
    header .logo {float:left;width:160px;height:34px;margin:3px auto 2px 10px}
    header .menu {height:30px;font-size:15px;line-height:30px;border-bottom:4px solid #f8c301;text-align:center;background:#041e41;overflow:hidden}
    header .pmenu {float:right;display:block;width:30px;height:2px;margin:10px 10px auto auto;padding:8px 0;border-top:2px solid #f8c301;border-bottom:2px solid #f8c301;background-clip:content-box;background-color:#f8c301;cursor:pointer}
    header .menu a {display:block;text-decoration:none;color:#fff}
    header ul, header li {list-style:none}
    header li {float:left;padding:0 10px}
    #sidebarmenu {background:#fff;padding:10px;line-height:1.5em;box-sizing:border-box}
    #sidebarmenu dt {font-weight:bold;color:#f8c301}
    #sidebarmenu dd {margin-left:10px}
    .primary-banner {margin:0 auto;text-align:center;position:relative}
    .primary-banner .amp-carousle-subtitle {position:absolute;left:0;right:0;bottom:0;font-size:16px;text-align:center;color:#fff}
    .plist h1 {margin:20px 10px}
    .plist .showroom li {width:calc(100% - 20px);margin-bottom:15px;padding:10px;background:#fff;clear:both;overflow:hidden;list-style:none}
    .plist .showroom .thumbnail {float:left;width:40%;margin-right:8px}
    .plist .showroom h2 {margin:0}
    .plist .showroom p {margin:10px 0 0 0}
    .feedback {margin-top:20px;padding-bottom:15px;box-shadow:2px 2px 10px #ccc;background:#fff;overflow:hidden}
    .feedback:target {animation: flyin 0.8s linear}
    .feedback form {margin-left:10px}
    .feedback .headline {margin:20px 0 0 0;font-size:1.6em;line-height:1.8em;color:#000}
    .feedback .slogan {margin-top:5px;font-size:1.4emx;color:#ffcc00}
    .feedback .description {margin-top:5px}
    .feedback p {margin-top:15px}
    .feedback input {width:90%;line-height:24px;padding:3px 0;border:1px solid #999;border-radius:2px;outline:none;text-indent:8px}
    .feedback input[type=submit] {float:right;margin-right:10%;width:auto;color:#000;border:none;padding:4px 15px;font-weight:bold;text-align:center;text-indent:0;background:#ffcc00;cursor:pointer}
    .feedback .result {float:left;width:calc(90% - 85px)}
    .category-entry {margin:10px 0 0 0;padding:10px 5px;background:#fff;overflow:hidden}
    .category-entry .action {width:100%;height:30px;margin-top:15px}
    .category-entry .sharebox {float:left;width:198px}
    .category-entry .rfq {float:right;display:block;padding:0 8px;line-height:25px;border-radius:3px;background:#f8c301;color:#fff}
    .category-entry h1 {float:left;width:100%;margin:15px 0}
    .category-entry .pubdate {margin:5px 0;color:#ffcc00}
    .category-list li {background:#fff;margin-top:10px;padding:10px 5px}
    .category-thumb {margin-top:15px}
    .category-thumb h3 {font-size:14px}
    .category-thumb ul {width:100%;display:flex;flex-wrap:wrap;justify-content:space-between;list-style:none}
    .category-thumb ul li {width:49%;margin-top:10px;padding:5px;box-sizing:border-box;text-align:center;background:#fff}
    .category-blog li {padding:10px;margin-top:10px;overflow:hidden;background:#fff}
    .category-blog li .thumbnail {display:block;width:40%;float:right;margin-left:10px}
    .category-blog li .meta {margin:0;font-size:12px;color:#919191}
    .single-header {margin-top:10px;padding-bottom:10px;background:#fff}
    .single-header h1 {float:left;margin:20px 0;line-height:1.2em}
    .single-header h1.aligncenter {width:100%;text-align:center;margin-bottom:5px}
    .single-header amp-img {width:100%}
    .single-header .contact p {margin:2px 0;padding-left:24px;height:20px;background-size:20px 20px;background-repeat:no-repeat;background-position:left center}
    .single-header .contact .mobile {background-image:url('<?php dminfo("template_url")?>images/telegram-ico.png')}
    .single-header .contact .email {background-image:url('<?php dminfo("template_url")?>images/email-ico.png')}
    .single-header .action {width:100%;height:30px;margin-top:15px}
    .single-header .sharebox {float:left;width:198px}
    .single-header .rfq {float:right;display:block;padding:0 8px;line-height:25px;border-radius:3px;background:#f8c301;color:#fff}
    .single-header .pubmeta {margin:5px 0;text-align:center}
    .single-header .pubmeta span {color:#ffcc00}
    .sharebox a{display:inline-block;width:24px;height:24px;border-radius:2px;cursor:pointer}
    .sharebox .favorites {background-color:#eb1c00;background-image:var(--favoritesicon)}
    .sharebox .facebook {background-color:#3b5998;background-image:var(--facebookicon)}
    .sharebox .linked {background-color:#0083be;background-image:var(--linkedicon)}
    .sharebox .twitter {background-color:#00aced;background-image:var(--twittericon)}
    .sharebox .skype {background-color:#00aff0;background-image:var(--skypeicon)}
    .sharebox .viber {background-color:#7b519d;background-image:var(--vibericon)}
    .sharebox .telegram {background-color:#64a9dc;background-image:var(--telegramicon)}
    .sharebox .whatsapp {background-color:#65bc54;background-image:var(--whatsappicon)}
    .single-image {position:relative;margin:10px 0;background:#fff}
    .single-image .title {position:absolute;bottom:5px;left:0;right:0;color:#fff;text-align:center}
    .single-gallery {display:flex;flex-wrap:nowrap;margin:10px 0;padding:10px 5px;background:#fff;overflow-x:scroll}
    .single-gallery a {min-width:65%;margin-right:1%}
    .single-content {margin-top:10px;padding:10px 5px;background:#fff}
    .single-content table {width:100%;margin-top:10px}
    .single-content table td {padding:5px 8px;border:1px solid #fff;word-break:break-all}
    .single-content table tr:nth-child(2n) {color:#000;background:#ccc}
    .single-content table tr:nth-child(2n+1) {color:#000;background:#eee}
    .single-content table tr:nth-child(1){background:#999}
    .single-content ol {margin-left:1em;list-style:inside decimal}
    .single-content ul {margin-left:2em;list-style:inside disc}
    .single-content li {margin-top:8px;line-height:20px}
    .single-content .tags a {display:inline-block;padding:2px 5px;margin-top:5px;border:1px solid #eee;border-radius:3px;font-size:12px}
    .related h3 {margin-left:10px}
    .related li {padding:10px;margin-top:10px;overflow:hidden;background:#fff}
    .related li .thumbnail {display:block;width:40%;float:right;margin-left:10px}
    .related li .price {margin:0;font-size:12px;color:#919191}
    .post_nav {background:#fff;padding:5px 0;margin-top:10px;text-align:center}
    .pagination {width:100%;margin:15px 0;line-height:30px;text-align:center}
    .pagination span {display:inline-block}
    .pagination a {display:inline-block;padding:2px 10px;background:#fff}
    .pagination>span, .pagination>a {margin-right:10px}
    footer {height:30px;font-size:12px;line-height:30px;background:#000;color:#fff;text-indent:2px}
    footer .links {float:right;margin-right:5px}
    .chat-wa {position:fixed;right:5px;bottom:10px;width:40px;height:40px;border-radius:10px;background:#e0e0ee;box-shadow:0 2px 2px #ccc}
    @media(max-width:600px){
        .plist .showroom .thumbnail {width:100%;float:none}
        .plist .showroom h2 {margin:5px 0;text-align:center}

    }
    @keyframes flyin {
        0% {opacity:0;transform:translate3d(-3000px,0,0)}
        30% {opacity:1;transform:translate3d(25px,0,0)}
        60% {transform:translate3d(-10px,0, 0)}
        90% {transform:translate3d(5px,0,0)}
        100% {opacity:1;transform:none}
    }
    </style>
</head>
<body>
<header class="wrap">
    <div class="head">
        <a href="<?php dminfo('mobile_url')?>" class="logo"><amp-img src="<?php dminfo('template_url')?>images/logo.png" layout="responsive" width="260" height="56"></amp-img></a>
        <span role="button" tabindex="1" class="pmenu" on="tap:sidebarmenu.open"></span>
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php the_mobile_permalink(1)?>">Biz haqimizda</a></li>
            <li><a href="<?php the_mobile_permalink(2)?>">Biz bilan bog`laning</a></li>
            <li><a href="<?php the_mobile_category_link(8)?>"><?php the_category_name(8)?></a></li>
            <li><a href="<?php the_mobile_category_link(9)?>"><?php the_category_name(9)?></a></li>
        </ul>
    </div>
</header>
<amp-sidebar id="sidebarmenu" layout="nodisplay" side="right">
    <dl>
        <dt><a href="<?php the_mobile_category_link(1)?>"><?php the_category_name(1)?></a></dt>
<?php
$m = new DM_Query('cat=1&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(2)?>"><?php the_category_name(2)?></a></dt>
<?php
$m = new DM_Query('cat=2&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(3)?>"><?php the_category_name(3);?></a></dt>
<?php
$m = new DM_Query('cat=3&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(4)?>"><?php the_category_name(4)?></a></dt>
<?php
$m = new DM_Query('cat=4&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(5)?>"><?php the_category_name(5)?></a></dt>
<?php
$m = new DM_Query('cat=5&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(6)?>"><?php the_category_name(6)?></a></dt>
<?php
$m = new DM_Query('cat=6&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
            <dt><a href="<?php the_mobile_category_link(7)?>"><?php the_category_name(7)?></a></dt>
<?php
$m = new DM_Query('cat=7&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
$m->the_post();
?>
            <dd><a href="<?php the_mobile_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
        </dl>
</amp-sidebar>
