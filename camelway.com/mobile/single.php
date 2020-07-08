<?php
get_header();

if(in_category(array(1,2,3,4,5,6,7,8,9)))
    get_template_part('single','product');

elseif(in_category(10))
    get_template_part('single','application');
elseif(in_category(11))
    get_template_part('single','case');
else
    get_template_part('single','common');

get_footer();
