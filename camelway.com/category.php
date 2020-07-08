<?php get_header(); 
if(is_category(array(1,6))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'product');
}

elseif(is_category(array(2,3,4,5,7,8,9))){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'product-list');
}

elseif(is_category(10)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'application');
}

elseif(is_category(11)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'case');
}

elseif(is_category(12)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'news');
}

elseif(is_category(13)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'support');
}

elseif(is_category(14)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'faq');
}

elseif(is_category(15)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'parts');
}

elseif(is_category(16)){
    get_template_part('inc/banner', 'secondary');
    get_template_part('inc/breadcrumb');
    get_template_part('inc/category', 'about');
}

elseif(is_category(17)){
    get_template_part('inc/category', 'wiki');
}
elseif(is_category(18)){
    get_template_part('inc/category', 'view');
}

get_footer();
?>
