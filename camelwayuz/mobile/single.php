<?php get_header();
if(in_category(array(1,2,3,4,5,6,7)))
    get_template_part('single', 'product');
elseif(in_category(8))
    get_template_part('single', 'gallery');
elseif(in_category(9))
    get_template_part('single', 'blog');

get_footer();
