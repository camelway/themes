<?php get_header();

if(is_category(array(1,6)))
    get_template_part('category', 'product');

elseif(is_category(array(2,3,4,5,7,8,9)))
    get_template_part('category', 'list');

elseif(is_category(15))
    get_template_part('category', 'about');
else
    get_template_part('category', 'common');

get_footer();
