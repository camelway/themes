<?php
if(is_category(7))
    get_template_part('category','gallery');
elseif(is_category(6))
    get_template_part('category','news');
else
    get_template_part('category','product');
