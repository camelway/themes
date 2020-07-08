<?php
if(is_category(8))
    get_template_part('category','gallery');
elseif(is_category(9))
    get_template_part('category','news');
else
    get_template_part('category','product');
