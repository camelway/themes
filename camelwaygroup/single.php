<?php
if(in_category(array(1,2,3,4,5,6,7,8,9)))
    get_template_part('single', 'product');
else
    get_template_part('single', 'blog');
