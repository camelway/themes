<?php get_header(); 
if(in_category(array(1,2,3,4,5,6,7,8,9))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'product');
}

elseif(in_category(array(10))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'application');
}

elseif(in_category(array(11))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'case');
}

elseif(in_category(array(12))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'news');
}

elseif(in_category(array(13))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'service');
}

elseif(in_category(array(14))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'faq');
}

elseif(in_category(array(15))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'faq');
}

elseif(in_category(array(16))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'about');
}

elseif(in_category(array(17,18))){
    get_template_part('inc/breadcrumb');
    get_template_part('inc/single', 'view');
}

get_footer();
?>
