<?php
if(is_category(array(1,2,3,4,5,6,7,10)))
    get_template_part('category', 'product');
elseif(is_category(8))
    get_template_part('category', 'gallery');
elseif(is_category(9))
    get_template_part('category', 'blog');
