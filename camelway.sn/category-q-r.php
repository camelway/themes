<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,user-scalable=yes">
<meta http-equiv="content-language" content="fr">
<title><?php dm_title()?> |	Centrale à béton et Bétonnière Questions & Réponses </title>
<meta name="keywords" content="<?php dm_keywords();?>">
<meta name="description" content="<?php dm_description();?>">
<link rel="canonical" href="<?php dm_url();?>">
<link rel="amphtml" href="<?php dm_mobile_url();?>">
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/style.css">
 <link rel="icon" href="<?php dminfo('template_url')?>images/favicon.ico">
</head>
<?php
get_header();
?>
<div id="featured-title" class="clearfix featured-title-left">
<div id="featured-title-inner" class="container clearfix">
<div class="featured-title-inner-wrap">
<div class="featured-title-heading-wrap">
<h1 class="featured-title-heading"><?php the_category_name();?></h1>
</div>
<div id="breadcrumbs">
<div class="breadcrumbs-inner">
<div class="breadcrumb-trail">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li>

<a href="/">
<span>Accueil</span></a>
<meta>
</li>
»
<li>
<span><?php the_category();?></span>
<meta>
</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
<img src="<?php dminfo('template_url')?>banner/header_news.jpg" alt="HTML5 Icon" style=" width: 100%; ">
<center>
Répondez à toutes vos questions sur la centrale à béton et la bétonnière</center>
<div id="main-content" class="site-main clearfix">
<div id="content-wrap">
<div id="site-content" class="site-content clearfix">
<div id="inner-content" class="inner-content-wrap">
<div class="page-content">
<section class="wprt-section">
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="timeline">
<div class="timeline-movement">
<?php
while(have_posts()){
    the_post();
?>
<div class="col-sm-6  timeline-item">
<div class="row">
<div class="col-sm-11">
<div class="timeline-panel credits">
<ul class="timeline-panel-ul">
<li><span class="importo"><a href="<?php the_permalink();?>"><?php the_title()?></a></span></li>
<li><img src="<?php the_thumbnail()?>" alt="<?php echo $imgs[0]->title;?>" class="img-responsive"></li>
<li><span class="causale"><?php echo dm_trim_words(get_the_excerpt(), 400);?></span> </li>
<li><h5 class="wprt-button light"> <i class="fa fa-clock-o"></i> <?php the_time('Y-m-d');?> </h5></li>
</ul>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div></div>
            <div class="col-md-12">                <div id="Product Info" class="tabcontent" style="display: block;">
                    <h2 style="background-color: #fb8b37;color: #fff;padding:5px 20px;">
                        Demander un Devis
                    </h2>
                    <p>
                        <strong>&quot;Un expert du service commercial de Camelway répondra à toutes vos questions du lundi au dimanche de <span style="color: #ff0000;">06:00 à 20:00 (heure de Dakar).</span>&quot;</strong>
                    </p>
                    <form action="https://www.camelway.sn/dm-feedback.php" method="post" onsubmit="return ajax_submit(this);" class="wprt-contact-form-1">
                        <div class="row gutters-15">
                            <span class="wpcf7-form-control-wrap name"><input type="text" placeholder="Nom*" class="wpcf7-form-control-wrap" name="user_name" required=""/></span><span class="wpcf7-form-control-wrap email"><input type="text" placeholder="Téléphone &amp; E-Mail *" class="wpcf7-form-control-wrap" name="user_mobile" required=""/></span><span class="wpcf7-form-control-wrap message"><textarea placeholder="Entrez vos demandes détaillées,par exemple,la capacité,les applications etc. " class="wpcf7-form-control-wrap message" name="content" rows="5" cols="20" required=""></textarea></span>
                            <div class="wrap-submit">
                                <button class="submit wpcf7-form-control wpcf7-submit wprt-button big" type="submit">ENVOYER UN MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div></div>
</div></section></div>
</div>
</div>
</div>
</div>
</div>
<?php
get_footer();
?>

<script async="" src="<?php dminfo('template_url')?>js/local-ga.js"></script><script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','/local-ga.js','ga');
ga('create', 'UA-25334580-1', 'auto');
 ga('send', 'pageview');
</script>
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/shortcodes.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700|Droid+Serif&subset=latin&display=swap');
</style>
<link rel="stylesheet" href="<?php dminfo('template_url')?>css/flag-icon.css">
<script src="<?php dminfo('template_url')?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php dminfo('template_url')?>js/animsition.js"></script>
<script src="<?php dminfo('template_url')?>js/bootstrap.min.js" type="text/javascript" defer="defer"></script>
<script src="<?php dminfo('template_url')?>js/plugins.js" type="text/javascript" defer="defer"></script>
<script src="<?php dminfo('template_url')?>js/main.js" type="text/javascript" defer="defer"></script>

</body></html>
