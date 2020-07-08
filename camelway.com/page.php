<?php get_header();?>
<div class="wrap secondary-banner"<?php the_secondary_banner();?>)">
    <div class="container">
        <h2 class="compact-title"><?php the_subtitle()?></h2>
    </div>
</div>

<div class="container bread-language-nav">
    <div class="breadcrumb">
        <?php the_breadcrumblist('&gt;')?>
    </div>
    <div class="languageselector">
        <?php the_languageselector()?>
    </div>
</div>

<?php
if(get_the_ID() ==1)
    get_template_part('inc/page', 'contact');
else
    get_template_part('inc/page', 'common');


get_footer();
