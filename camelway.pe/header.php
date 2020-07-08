<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php dm_title()?></title>
<?php if(!is_404()){ ?>
<meta name="keywords" content="<?php dm_keywords();?>">
<meta name="description" content="<?php dm_description();?>">
<link rel="amphtml" href="<?php dm_mobile_url();?>">
<link rel="canonical" href="<?php dm_url();?>">
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php dminfo('stylesheet_url')?>?v=2020:2">
<link rel="icon" href="//data.camelway.net/static/images/favicon.camelway.com.ico">
<meta property="og:locale" content="es_ES">
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
<?php if(is_home()){ ?>

<?php } ?>
</head>
<body>
<div class="container top">
    <div class="s-logo">
        <img src="<?php dminfo('template_url')?>images/logo.png" alt="CAMELWAY CHINA">
    </div>
    <div class="introduce">
        <p>Camelway ha estado trabajando en el mercado de plantas de concreto por más de 30 años desde 1983. <a href="<?php the_permalink(41);?>">More &gt;&gt;</a></p>
    </div>
</div>
<div class="container head">
    <a href="<?php dminfo('home');?>" class="logo"><img src="<?php dminfo('template_url')?>images/logo.png" alt="Camelway"></a>
    <div class="top-contact">
        <p class="mobile">+8615036199932 , +8615515808851</p>
        <p class="email">camelway2@gmail.com</p>
    </div>
</div>
<div class="container menu">
    <ul>
        <li><a href="<?php dminfo('home')?>">Inicio </a></li>
        <li><a href="<?php the_permalink(41);?>">Acerca de nosotros </a></li>
        <li style="display:block;"><a href="<?php the_permalink(42);?>">Contáctanos </a></li>
        <li><a href="<?php the_category_link(6);?>">Noticias </a></li>
        <li><a href="<?php the_category_link(7);?>">Galeria </a></li>
        <li class="right"><a href="<?php the_category_link(1);?>">Producto</a>
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
                </dl>




                <dl>
                    <dt><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></dt>
<?php
$m = new DM_Query('cat=2&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>


                <dl>
                    <dt><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></dt>
<?php
$m = new DM_Query('cat=3&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>


                <dl>
                    <dt><a href="<?php the_category_link(4)?>"><?php the_category_name(4);?></a></dt>
<?php
$m = new DM_Query('cat=4&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>
                <dl>
                    <dt><a href="<?php the_category_link(5)?>"><?php the_category_name(5)?></a></dt>
<?php
$m = new DM_Query('cat=5&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>



                <dl>
                    <dt><a href="<?php the_category_link(6)?>"><?php the_category_name(6)?></a></dt>
<?php
$m = new DM_Query('cat=6&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>




                <dl>
                    <dt><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></dt>
<?php
$m = new DM_Query('cat=3&posts_per_page=8&no_found_rows=1');
while($m->have_posts()){
    $m->the_post();
?>
                    <dd><a href="<?php the_permalink()?>" title="<?php the_subtitle()?>"><?php the_subtitle();?></a></dd>
<?php } dm_reset_postdata(); ?>
                </dl>



                <dl>
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
