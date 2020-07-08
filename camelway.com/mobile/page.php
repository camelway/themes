<?php get_header();?>
<div class="container single-entry">
    <h1><?php the_subtitle()?></h1>
    <div class="pub-meta">
        <div class="author_avatar">
            <amp-img layout="responsive" width="30" height="30" src="<?php the_author_meta('avatar')?>"></amp-img>
        </div>
        <div class="pub-detail">
            <span class="author"><a href="<?php the_mobile_author_posts_link()?>" rel="nofllow"><?php the_author();?></a></span>
            <span class="pubdate"><?php the_time('Y-m-d H:i')?></span>
        </div>
        <div class="facebooklike"><amp-facebook-like width="90" height="20" layout="fixed" data-layout="button_count" data-href="https://www.facebook.com/camelway/"></div>
    </div>
    <div class="content-section">
        <?php the_content();?>
    </div>
</div>

<?php get_template_part('form'); ?>

<?php
get_footer();
