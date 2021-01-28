<?php
if(get_the_ID() == 1)
    get_template_part('about');
elseif(get_the_ID() == 2)
    get_template_part('contact');
else
     get_template_part('page', 'common');