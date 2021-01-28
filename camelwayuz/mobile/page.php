<?php get_header();
if(is_page(1))
    get_template_part('page', 'about');
elseif(is_page(2))
    get_template_part('page', 'contact');
else
    get_template_part('page', 'common');

get_footer();
