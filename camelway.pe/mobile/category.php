<?php
if(is_category(array(1,2,3,4,5)))
    get_template_part('category', 'product');
elseif(is_category(7))
    get_template_part('category', 'gallery');
elseif(is_category(6))
    get_template_part('category', 'blog');
