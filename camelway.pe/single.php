<?php
if(in_category(7))
    get_template_part('single','gallery');
elseif(in_category(6))
    get_template_part('single','news');
else
    get_template_part('single', 'product');
