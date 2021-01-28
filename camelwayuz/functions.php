<?php
require_once(dirname(__FILE__).'/auxiliary-functions.php');

//面包屑导航
function breadcrumb_nav(){
    $html = '';
    $category = get_category();
    while(!empty($category)){
        $catlink = $category->get_permalink();
        $catname = $category->cat_name;
        $html = sprintf(' <a href="%s">%s</a> &gt; ', $catlink, $catname).$html;
        $category = $category->get_parent();
    }
    
    if(is_single() || is_page() || is_topic()){
        $html .= sprintf('<a href="%s">%s</a>', get_the_permalink(), get_the_subtitle());
    }
    echo sprintf('<a href="%s">Bosh Sahifa</a> &gt; %s', home_url(1), $html);
}

//google schema
function the_google_schema($websitename, $orgname){
    $language = get_option('site_lang');
    $breadcrumb = array();
    if(is_single() || is_category()){
        $category = get_category();
        $tmp = array();
        while(!empty($category)){
            $link = $category->get_permalink();
            $name = $category->cat_name;
            $category = $category->get_parent();
            $tmp[] = array('name'=>$name, '@id'=>$link);
        }
        $tmp = array_reverse($tmp);
        $items = array();
        $items[] = array('@type'=>'ListItem', 'position'=>1, 'item'=>array('@id'=>home_url(1), 'name'=>'Home'));
        foreach($tmp as $key=>$item){
            $position = $key + 2;
            $items[] = array('@type'=>'ListItem', 'position'=>$position, 'item'=>array('@id'=>$item['@id'], 'name'=>$item['name']));
        
        }
        $breadcrumb = array('@type'=>'BreadcrumbList', 'itemListElement'=>$items);
    }

    $schema[] = array(
        '@type'=>'Organization',
        'name'=>$orgname,
        'url'=>home_url(1),
        'logo'=>array(
            '@type'=>'ImageObject',
            'url'=>get_dminfo('template_url').'media/touch-icon.png',
            'width'=>114,
            'height'=>114,
        ),
    );

    $schema[] = array(
        '@type'=>'Website',
        '@id'=>home_url(1).'#website',
        'url'=>home_url(1), 'name'=>$websitename,
        'potentialAction'=>array(
            '@type'=>'SearchAction',
            'target'=>home_url(1).'?s={search_term_string}',
            'query-input'=>'required name=search_term_string'
        )
    );

    $schema[] = array(
        '@type'=>'WebPage',
        '@id'=>dm_url(false)."#webpage",
        'url'=>dm_url(false),
        'inLanguage'=>$language,
        'name'=>dm_title('', false),
        'datePublished'=>get_the_time('c'),
        'dateModified'=>get_the_modified_time('c'),
        'description'=>dm_description(255, false),
        'isPartOf'=>array(
            '@id'=>home_url(1).'#website'
        ),
        'primaryImageOfPage'=>get_primaryimage(),
        'breadcrumb'=>$breadcrumb
    );

    if(is_single() && in_category(array(1,2,3,4,5,6,7))){
        $ratingdata = get_rating();
        $schema[] = array(
            '@type'=>'Product',
            'name'=>get_the_subtitle(),
            'image'=>get_images(),
            'description'=>get_the_excerpt(),
            'sku'=>md5(get_the_title()),
            'mpn'=>sprintf('%u', crc32(get_the_subtitle())),
            'brand'=>array('@type'=>'Brand', 'name'=>'Camelway'),
            'offers'=>array(
                '@type'=>'AggregateOffer',
                'url'=>get_the_permalink().'#feedback',
                'priceCurrency'=>'USD',
                'availability'=>get_the_data('availability'),
                'itemCondition'=>get_the_data('condition'),
                'lowPrice'=>get_the_data('lowprice'),
                'highPrice'=>get_the_data('highprice'),
                'seller'=>array(
                    '@type'=>'Organization',
                    'name'=>$orgname
                ),
            ),
            'aggregateRating'=>array(
                '@type'=>'AggregateRating',
                'ratingValue'=>$ratingdata['score'],
                'reviewCount'=>$ratingdata['count'],
            )
        );
    }
    elseif(is_single() && in_category(array(8,9))){
        $post = get_the_ID();
        $ratingdata = get_rating();
        $schema[] = array(
            '@type'=>'BlogPosting',
            'headline'=>get_the_title(),
            'alternativeHeadline'=>get_the_subtitle(),
            'datePublished'=>get_the_time('c'),
            'dateModified'=>get_the_modified_time('c'),
            'image'=>get_images(),
            'keywords'=>array_map(function($tag){return $tag->name;}, get_the_tags()),
            'mainEntityOfPage'=>get_the_permalink().'#main',
            'description'=>dm_description(255, false),
            'author'=>get_the_author(),
            'publisher'=>$schema[0],
            'aggregateRating'=>array(
                '@type'=>'AggregateRating',
                'ratingValue'=>$ratingdata['score'],
                'reviewCount'=>$ratingdata['count'],
            )
        );
    }
    echo '<script type="application/ld+json">{"@context":"https://schema.org","@graph":['.trim(_arr2jsonld($schema), ',').']}</script>';
}

//生成网站内容
function content_struct_filter($content){
    $navs = array();
    $content = preg_replace_callback('/<h(\d)([^>]*)>(.*?)<\/h\1>/is', function($matches) use(&$navs){
        $level = $matches[1];
        $attributes = $matches[2];
        $title = strip_tags($matches[3]);
        $id = sanitize_name($title);
        $index = $level - 2;
        $last = empty($navs) ? false : end($navs);
        $lastindex = empty($navs) ? 0 : count($navs) - 1;
        if($last == false || $last['index'] == $index)
            $navs[] = array('index'=>$index, 'anchor'=>$id, 'title'=>$title);
        else
            $navs[$lastindex]['children'][] = array('index'=>$index, 'anchor'=>$id, 'title'=>$title);
        return sprintf('<h%d%s id="%s">%s</h%d>', $level, $attributes, $id, $matches[3], $level);
    }, $content);

    if(is_single() && in_category(array(8,9)) && !empty($navs)){
        $html = _arr2nav($navs);
        if(!empty($html)){
            $content = sprintf('<div class="content-navigation" role="navigation"><h2>Mundarija</h2>%s</div>%s', $html, $content);
        }
    }
    return $content;
}
//根据数组生成内容导航
function _arr2nav($navs){
    $html = '';
    foreach($navs as $nav){
        $title = $nav['title'];
    $anchor = $nav['anchor'];
        if(empty($nav['children']))
            $html .= sprintf('<li><a href="#%s">%s</a></li>', $anchor, $title);
    else
            $html .= sprintf('<li><a href="#%s">%s</a>%s</li>', $anchor, $title, _arr2nav($nav['children']));
    }
    return sprintf('<ul>%s</ul>', $html);
}

//增加头部多语言
function multi_language(){
    $langheaders = array();
    if(is_home()){
        $langheaders['uz'] = get_dminfo('url');
        $langheaders['en'] = "https://www.camelway.co.za/";
        $langheaders['es'] = "https://www.camelway.co/";
        $langheaders['fr']= "https://www.camelway.fr/";
        $langheaders['ru'] = "https://www.camelway.ru/";
        $langheaders['id'] = "https://www.camelway.id/";
        $langheaders['zh-cn'] = "https://www.camelway.com.cn/";
    }
    elseif(is_single() && in_category(array(1,2,3,4,5,6,7))){
        $langheaders['uz'] = dm_url(false);
        $langheaders['en'] = get_the_data('lang_en');
        $langheaders['es'] = get_the_data('lang_es');
        $langheaders['fr'] =get_the_data('lang_fr');
        $langheaders['ru'] = get_the_data('lang_ru');
        $langheaders['id'] = get_the_data('lang_id');
        $langheaders['zh-cn'] = get_the_data('lang_zh');
    }

    $headers = '';
    if(!empty($langheaders)){
        foreach($langheaders as $lang=>$url){
            $headers .= sprintf('<link rel="alternate" hreflang="%s" href="%s">'."\n", $lang, $url);
        }
    }
    echo $headers;
}

//加载指定文章
function load_posts(){
    $offset = !empty($_REQUEST['offset']) ? intval($_REQUEST['offset']): 0;
    $cat = !empty($_REQUEST['cat']) ? $_REQUEST['cat'] : 0 ;
    $tag = !empty($_REQUEST['tag']) ? intval($_REQUEST['tag']) : 0 ;
    $search = !empty($_REQUEST['s']) ? strval($_REQUEST['s']) : '' ;
    $count = !empty($_REQUEST['count']) && intval($_REQUEST['count']) > 0 && intval($_REQUEST['count']) <= 30 ? intval($_REQUEST['count']) : 10;
    $orderby = !empty($_REQUEST['orderby']) ? $_REQUEST['orderby'] : '';

    $args = array('offset'=>$offset, 'posts_per_page'=>$count);
    $nexturltemplate = get_dminfo('ajax_url').'?action=loadposts&offset=%d&count=%d&cat=%s&tag=%d&s=%s&roderby=%s';
    if(!empty($cat)){
        $cat_in = explode(',', $cat);
        $cat_in = array_map('intval', $cat_in);
        $args['category__in'] = $cat_in;
    }
    if($tag > 0 )
        $args['tag_id'] = $tag;
    if(!empty($search))
        $args['s'] = $search;
    if(!empty($orderby))
        $args['orderby'] = $orderby;

    $query = new DM_Query();
    $posts = $query->query($args);
    $found_posts = $query->found_posts;

    $ps = array();
    header('content-type:application/json');
    $ps['total'] = $found_posts;
    $ps['offset'] = $offset;
    $ps['count'] = count($posts);
    foreach($posts as $key=>$post){
            $ps['items'][$key]['post_title'] = $post->post_title;
            $ps['items'][$key]['post_subtitle'] = $post->post_subtitle;
            $ps['items'][$key]['post_excerpt'] = dm_trim_words($post->post_excerpt, 600, '...');

            $post_primaryimage = get_primaryimage($post);
            if(!empty($post_primaryimage)){
                list($w, $h) = get_image_size($post_primaryimage);
                $ps['items'][$key]['post_primaryimage'] = $post_primaryimage;
                $ps['items'][$key]['post_primaryimage_fallback'] = get_dminfo('ajax_url')."?action=modifyimg&f=".urlencode($post_primaryimage).'&type=jpg';
                $ps['items'][$key]['post_primaryimage_width'] = $w;
                $ps['items'][$key]['post_primaryimage_height'] = $h;
                $ps['items'][$key]['post_primaryimage_srcset'] = get_srcset($post_primaryimage);
            }

            $post_thumbnail = $post->post_thumbnail;
            if(!empty($post_thumbnail)){
                list($w, $h) = get_image_size($post_thumbnail);
                $ps['items'][$key]['post_thumbnail'] = $post_thumbnail;
                $ps['items'][$key]['post_thumbnail_fallback'] = get_dminfo('ajax_url')."?action=modifyimg&f=".urlencode($post_thumbnail).'&type=jpg';
                $ps['items'][$key]['post_thumbnail_width'] = $w;
                $ps['items'][$key]['post_thumbnail_height'] = $h;
                $ps['items'][$key]['post_thumbnail_srcset'] = get_srcset($post_thumbnail);
            }
            $ps['items'][$key]['post_date'] = date('Y-m-d', strtotime($post->post_date));
            $ps['items'][$key]['post_datetext'] = date('M j, Y', strtotime($post->post_date));
            $ps['items'][$key]['permalink'] = $post->get_permalink();
            $ps['items'][$key]['viewed'] = intval($post->get_meta('viewed', true));
            $ps['items'][$key]['mobile_permalink'] = $post->get_permalink(1);
            $ps['items'][$key]['author'] = get_the_author($post);
            $ps['items'][$key]['author_avatar'] = get_the_author_meta('avatar', $post->post_author);
    }
    if($offset +  count($posts) < $found_posts){
        $ps['next'] = sprintf($nexturltemplate, $offset +  count($posts), $count, $cat, $tag, esc_url($search), $orderby);
    }
    $origin = @$_SERVER['HTTP_ORIGIN'];
    header('Access-Control-Allow-Origin:'.$origin);
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Expose-Headers:AMP-Access-Control-Allow-Source-Origin');
    header('AMP-Access-Control-Allow-Source-Origin:'.$origin);
    header("Cache-Control:no-cache");
    echo json_encode($ps);
}

//Google表单接口
function add_lead(){
    $raw = file_get_contents('php://input');
    $obj = json_decode($raw);
    $name = '';
    $email = '';
    $phone = '';
    $company = '';
    $product = '';
    $is_test = $obj->is_test;
    $campaign_id = $obj->campaign_id;
    foreach($obj->user_column_data as $data){
             if($data->column_id == 'FULL_NAME')
                $name .= $data->string_value.' ';
            if($data->column_id == 'FIRST_NAME')
                $name .= $data->string_value.' ';
             if($data->column_id == 'LAST_NAME')
                $name .= $data->string_value;
             if($data->column_id == 'PHONE_NUMBER')
                $phone .= $data->string_value;
             if($data->column_id == 'COMPANY_NAME')
                $company .= $data->string_value;
             if($data->column_id == 'WORK_EMAIL')
                $email .= $data->string_value;
              if($data->column_id == 'PRODUCT')
                $product .= $data->string_value;
    }
    $feedback = array('user_name'=>$name, 'user_email'=>$email, 'user_mobile'=>$phone, 'content'=>sprintf("Company: %s\nProduct: %s", $company, $product), 'user_referer'=>'Lead Webhook');
    return dm_insert_feedback($feedback, false);
}

//记录评分，可以更改评分
function record_rating(){
    global $dmdb;
    $id = intval($_REQUEST['id']);
    $score = intval($_REQUEST['score']);
    $meta_id = @intval($_REQUEST['meta_id']);

    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    if($id > 0 && $score >= 1 && $score <= 5){
        if($meta_id > 0 ){
            $dmdb->query("update $dmdb->postmeta set meta_value = $score where post_id = $id and meta_id = $meta_id and meta_key = 'product_rating'");
        }else{
            $meta_id = add_post_meta($id, 'product_rating', $score);
        }
        switch($score){
            case 1:
                $message = 'Thanks for review';
                break;
            case 2:
                $message = 'Thanks for review';
                break;
            case 3:
                $message = 'Thanks for review';
                break;
            case 4:
                $message = 'Thanks for review';
                break;
            case 5:
                $message = 'Thanks for review';
                break;
        }
        echo json_encode(array('code'=>'200', 'message'=>$message, 'meta_id'=>$meta_id));
        die;
    }
    echo json_encode(array('code'=>'403', 'message'=>'Unauthorized access'));
}

//在页面上展示评分
function the_ratingValue(){
    $rating = get_rating();
    if($rating['score'] == 0)
        $score = 5.0;
    else
        $score = $rating['score'];
    if($score < 1.5)
        $txt = 'Poor';
    elseif($score < 2.5)
        $txt = 'Fair';
    elseif($score < 3.5)
        $txt = 'Neutral';
    elseif($score <=4.25)
        $txt = 'Good';
    elseif($score <=5)
        $txt = 'Excellent';

    printf('<em>%.1f</em>%s', $score, $txt);
}

//记录访问量
function record_viewed(){
    $id = intval($_REQUEST['id']);
    $viewed = intval(get_post_meta($id, 'viewed')) + 1;
    update_post_meta($id, 'viewed', $viewed);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $viewed;
}

//更改查询
function modify_query($query){
    /*
    if($query->is_search && $query->is_main_query()){
        $query->set('category__not_in', array(1,2,3,4,5,6,7));
    }
    if($query->is_home && $query->is_main_query()){
        $query->set('category__in', array(9));
        $query->set('posts_per_page', 6);
    }
    */
    if($query->is_mobile && $query->is_main_query && ($query->is_search && $query->is_tag)){
        $query->set('posts_per_page', 1);
    }
}

//AMP表单增加头部
function feedback_amp_response($response){
    $origin = @$_SERVER['HTTP_ORIGIN'];
    header('Access-Control-Allow-Origin:'.$origin);
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Expose-Headers:AMP-Access-Control-Allow-Source-Origin');
    header('AMP-Access-Control-Allow-Source-Origin:'.$origin);
    header('Content-Type:application:json');
    echo json_encode($response);
}

//在线处理图片
function modify_image(){
    $imageurl = substr(parse_url($_REQUEST['f'], PHP_URL_PATH), strlen(dm_get_install_path()));
    $image = ABSPATH.$imageurl;
    if(!file_exists($image)){
        status_header(404);
        die;
    }
    $dmimg = new DM_Image($image);
    if(!$dmimg->is_image){
        status_header(400);
        die;
    }

    $type = empty($_REQUEST['type']) ? 'webp' : strtolower($_REQUEST['type']);
    $width = empty($_REQUEST['width']) ? intval($dmimg->width) : intval($_REQUEST['width']);
    $height = empty($_REQUEST['height']) ?  intval($dmimg->height/($dmimg->width/$width)) : intval($_REQUEST['height']);

    if($width >= $dmimg->width || $height >= $dmimg->height){
        $width = $dmimg->width;
        $height = $dmimg->height;
    }
    $dmimg->crop($width, $height);
    if($type =='jpg' || $type == 'jpeg')
        header('Content-Type:image/jpeg');
    elseif($type == 'png')
        header('Content-Type:image/png');
    elseif($type == 'gif')
        header('Content-Type:image/gif');
    elseif($type == 'webp')
        header('Content-Type:image/webp');

    $originurl = substr($_REQUEST['f'], 0,  4) == 'http' ? $_REQUEST['f'] : home_url(1).substr($_REQUEST['f'], 1);
    header('Cache-Control:public,max-age=8640000');
    header('Last-Modified:'.gmdate('D, d M Y H:i:s T', filemtime($image)));
    header(sprintf('Link: <%s>; rel="canonical"', $originurl));
    $dmimg->image($type);
}

//更改sitemap缓存
function modify_header($headers){
    if(is_sitemap())
        $headers['Cache-Control'] = 'public, max-age=1800';
    return $headers;
}

//增加头部
function modify_title($title){
    if(!is_home())
        return $title .' - ИП ООО «CAMELWAY CHINA»';
    return $title;
}

//更改网站内容
function modify_content($content){
    $content = str_replace('<p><br/></p>', '', $content);
    $content = content_struct_filter($content);
    $content = content_img_srcset($content);
    if(is_mobile())
        $content = amp_filter($content);
    return $content;
}

//更改网站robots
function modify_robots(){
    return "User-agent: SemrushBot
User-agent: SemrushBot-SA
User-agent: MJ12bot
User-agent: AhrefsBot 
User-agent: PetalBot
User-agent: AspiegelBot
User-agent: rogerbot
User-agent: dotbot
User-agent: MauiBot
User-agent: ia_archiver
User-agent: ZoominfoBot
User-agent: SeznamBot
User-agent: BLEXBot
User-agent: HubSpot Crawler
User-agent: SeznamBot
User-agent: megaindex.com
Disallow: /
User-agent: *
Disallow: /dm-include/";
}

//压缩html
function modify_html($content){
    //js
    $content = preg_replace_callback('/(<script[^>]*>)(.*?)<\/script>/is', function($matches){
        $code = preg_replace('/[\s\r\n\t]\/\/[^\r\n]*/i', ' ', $matches[2]);
        $code = preg_replace('/\/\*.*\*\//is', ' ', $code);
        $code = preg_replace('/[\r\n][\s\t]*/i', '', $code);
        $code = preg_replace('/[\s\t]*[\r\n]/i', '', $code);
        return $matches[1].$code.'</script>';
    }, $content);
    //html
    $content = preg_replace('/<!--.*?-->/is', '', $content);
    $content = preg_replace('/(<[^>]*>)[\s\t\r\n]*(?=<[^>]*>)/i', '\1', $content);
    return $content;
}

//给后台增加主题数据管理页面
function add_theme_menu(){
    add_submenu_page('themes', '网站数据管理', '网站数据管理', array('edit_themes'), 'edit-data', 'modify_theme_data');
}

//add_action('pre_get_posts', 'modify_query');

add_action('ajax_rating', 'record_rating');
add_action('ajax_viewed', 'record_viewed');
add_action('ajax_addlead', 'add_lead');

add_filter('dm_headers', 'modify_header');
add_action('ajax_modifyimg', 'modify_image');
add_filter('dm_title', 'modify_title');
add_filter('robots_txt', 'modify_robots');
add_action('the_content', 'modify_content');
add_filter('the_tips', 'product_subtitle_replace');

add_action('ajax_loadposts', 'load_posts');
add_action('flush_feedback_result', 'feedback_amp_response');
add_action('dm_response', 'modify_html');

add_action('admin_menu', 'add_theme_menu');
