<?php
if(is_category(1))
    get_template_part('category', 'mixing-plant');
elseif(is_category(array(2,3,4,5,6,7,8,9)))
    get_template_part('category', 'common');
else
    get_template_part('category', 'blog');
