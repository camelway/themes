<?php
if(in_category(8))
    get_template_part('single','gallery');
elseif(in_category(9))
    get_template_part('single','news');
else
    get_template_part('single', 'product');
