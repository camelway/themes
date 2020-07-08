<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,user-scalable=yes">
<meta http-equiv="content-language" content="fr">
<title><?php dm_title()?> | Centrale à Béton &amp; Usines  de Concassage et de Criblage </title>
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
<h1 class="featured-title-heading"><?php dm_title()?></h1>
</div>
<div id="breadcrumbs">
<div class="breadcrumbs-inner">
<div class="breadcrumb-trail">
<nav aria-label="breadcrumb">
<ol>
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
»
<li>
<span><?php dm_title()?></span>
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

<div id="main-content" class="site-main clearfix">
<div id="content-wrap">
<div id="site-content" class="site-content clearfix">
<div id="inner-content" class="inner-content-wrap">
<div class="page-content">
<section class="wprt-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                  <?php the_category_name()?>
                </h1>
            </div>
            <div class="row">
<?php while(have_posts()){
    the_post();
?>
                <div class="col-lg-4">
                    <div class="dez-box">
                        <div class="dez-media">
                            <a href="<?php the_permalink();?>" title="<?php the_title();?>"> <img src="<?php the_thumbnail()?>" title="<?php the_title();?>" alt="<?php the_subtitle();?>"/></a>
                        </div>
                        <div class="btn">
                            <div class="p-lr20">
                                <h2 class="m-a0">
                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_subtitle();?></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <section class="wprt-section">
        <div class="container">
            <div class="col-md-12">
              <?php the_category_content();?>
            </div>
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
        </div>
    </section>
</div>

<?php
get_footer();
?>
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php dminfo('template_url')?>css/shortcodes.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700|Droid+Serif&subset=latin&display=swap');
</style>
<link rel="stylesheet" href="<?php dminfo('template_url')?>css/flag-icon.css">
<script src="<?php dminfo('template_url')?>js/jquery.min.js"></script>
<script src="<?php dminfo('template_url')?>js/bootstrap.min.js" type="text/javascript" defer="defer"></script>
<script src="<?php dminfo('template_url')?>js/plugins.js" type="text/javascript" defer="defer"></script>
<script src="<?php dminfo('template_url')?>js/main.js" type="text/javascript" defer="defer"></script>
</div></div></div></body></html>