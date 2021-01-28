<?php
//load css
function load_style(){
    $style = file_get_contents(dirname(__FILE__).'/style.css');
    if(is_home())
        $style .= file_get_contents(dirname(__FILE__).'/css/index.css');
    elseif(is_category())
        $style .= file_get_contents(dirname(__FILE__).'/css/category.css');
    elseif(is_single())
        $style .= file_get_contents(dirname(__FILE__).'/css/single.css');
    elseif(is_page())
        $style .= file_get_contents(dirname(__FILE__).'/css/page.css');
    elseif(is_tag())
        $style .= file_get_contents(dirname(__FILE__).'/css/tag.css');
    elseif(is_search())
        $style .= file_get_contents(dirname(__FILE__).'/css/search.css');
    //comment
    $style = preg_replace('/\/\*.*?\*\//is', '', $style);
    //newline
    $style = preg_replace('/[\s\t\r\n]+/iu', ' ', $style);
    //css
    $style = str_replace(array(' : ', ' :', ': '), ':', $style);
    $style = str_replace(array(' : ', ' :', ': '), ':', $style);
    $style = str_replace(array(' ; ', ' ;', '; '), ';', $style);
    $style = str_replace(array(' , ', ' ,', ', '), ',', $style);
    $style = str_replace(array(' } ', '} ', ' }'), '}', $style);
    $style = str_replace(array(' { ', '{ ', ' {'), '{', $style);
    $style = str_replace(';}', '}', $style);
    //resource
    $style = str_replace('{{template_url}}', get_dminfo('template_url'), trim($style));
    echo "<style>$style\r\n</style>\r\n";
}

//twitter card
function the_twitter_card($twitter = 'camelway'){
    $card = sprintf('<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@%s">
<meta name="twitter:title" content="%s">
<meta name="twitter:description" content="%s">', $twitter, dm_title('-', false), dm_description(255, false));
    $image = get_primaryimage();
if(!empty($image))
    $card .= sprintf('
<meta name="twitter:image" content="%s">', $image);
    echo $card."\r\n";
}

//facebook ogp protocol
function the_facebook_ogp($lang = 'en', $sitename = 'Camelway Group', $facebookurl = 'https://www.facebook.com/camelway/'){
    $ogp = sprintf('<meta property="og:locale" content="%s">
<meta property="og:site_name" content="%s">', $lang, $sitename);

    if(is_home()){

        $ogp .= sprintf('
<meta property="og:type" content="website">
<meta property="og:title" content="%s">
<meta property="og:description" content="%s">
<meta property="og:url" content="%s">', esc_html(get_option('sitename')), esc_html(get_option('sitedescription')), home_url(1));

    }
    elseif(is_single() || is_page() || is_topic()){

         $ogp .= sprintf('
<meta property="og:url" content="%s">
<meta property="og:title" content="%s">
<meta property="og:description" content="%s">
<meta property="og:type" content="article">
<meta property="article:published_time" content="%s">
<meta property="article:modified_time" content="%s">
<!--<meta property="article:author" content="%s">-->
<meta property="article:publisher" content="%s">', dm_url(0), get_the_title(), esc_html(dm_trim_words(get_the_excerpt(), 255)),  get_the_time('Y-m-d H:i:s'), get_the_modified_time('Y-m-d H:i:s'), get_the_author_meta('facebook'), $facebookurl);

        $tags = get_the_tags();
        if(!empty($tags)){
            foreach($tags as $tag){
                $ogp .= sprintf('
<meta property="article:tag" content="%s">', $tag->name);
            }
        }
    }
    elseif(is_category() || is_tag() || is_search()){
        $ogp .= sprintf('
<meta property="og:url" content="%s">
<meta property="og:title" content="%s">
<meta property="og:description" content="%s">
<meta property="og:type" content="object">', dm_url(0),  dm_title(' - ', false), dm_description(255, 0));
    }

    list($img, $w, $h) = get_primaryimage(get_post(), true);
        $ogp .= sprintf('
<meta property="og:image" content="%s">
<meta property="og:image:width" content="%d">
<meta property="og:image:height" content="%d">', $img, $w, $h);
    echo $ogp."\r\n";
}

//google schema
function the_google_schema($websitename = 'Camelway Group', $orgname = 'Camelway Machinery', $language = 'en-US'){
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
        'url'=>home_url(1), 'name'=>'Camelway Group',
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

    if(is_category(array(1,2,3,4,5,6,7,8,9))){
        $catlink = get_category_link();
        $products = array();
        $i = 1;
        while(have_posts()){
            the_post();
            $ratingdata = get_rating();
            $products[] = array(
                '@type'=>'ListItem',
                'position'=>$i,
                'item'=>array(
                    '@type'=>'Product',
                    'image'=>get_the_thumbnail(),
                    'name'=>get_the_subtitle(),
                    'url'=>$catlink.'#item-'.get_the_ID(),
                    'aggregateRating'=>array(
                        '@type'=>'AggregateRating',
                        'ratingValue'=>$ratingdata['score'],
                        'reviewCount'=>$ratingdata['count'],
                      )
                ),
            );
            $i++;
        }
        if(!empty($products)){
            $schema[] = array(
                '@type'=>'ItemList',
                'numberOfItems'=>found_posts(),
                'itemListElement'=> $products,
            );
        }
    }

    if(is_single() && in_category(array(1,2,3,4,5,6,7,8,9))){
        $ratingdata = get_rating();
        $feedback_query = new DM_Feedback_Query();
        $comments = $feedback_query->query(array('post_id'=>get_the_ID(), 'number'=>20, 'group'=>'comment', 'no_found_rows'=>true, 'status'=>'approved', 'parent'=>0));
        $reviews = array();
        foreach($comments as $comment){
            $feedback_content = preg_replace('/[\r\n]+/iu', ' ', strip_tags($comment->feedback_content));
            $reviews[] = array(
                '@type'=>'review',
                'author'=>array(
                    '@type'=>'Person',
                    'name'=>$comment->feedback_user_name,
                ),
                'datePublished'=>$comment->feedback_date,
                'reviewBody'=>esc_html($feedback_content),
                'reviewRating'=>array(
                    '@type'=>'Rating',
                    'ratingValue'=>$comment->get_meta('score', true),
                    'bestRating'=>5
                )
            );
        }

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
            'review'=>$reviews,
            'aggregateRating'=>array(
                '@type'=>'AggregateRating',
                'ratingValue'=>$ratingdata['score'],
                'reviewCount'=>$ratingdata['count'],
            )
        );
    }
    elseif(is_single() && in_category(10)){
        $post = get_the_ID();
        $feedback_query = new DM_Feedback_Query();
        $comments = $feedback_query->query(array('post_id'=>$post, 'number'=>15, 'group'=>'comment', 'no_found_rows'=>false, 'status'=>'approved'));
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
            'commentCount'=>$feedback_query->found_feedbacks()
        );
    }
    echo '<script type="application/ld+json">{"@context":"https://schema.org","@graph":['.trim(_arr2jsonld($schema), ',').']}</script>';
}
//是否为关联数组
function _is_assoc($var){
     return !empty($var) && is_array($var) && array_diff_key($var, array_keys(array_keys($var)));
}
//结构化数据数组转jsonld
function _arr2jsonld($arraydata){
    $jsonld = '';
    foreach($arraydata as $key=>$value){
        if(empty($value)) continue;
        if(is_int($key)){
            if(is_string($value)){
                $jsonld .= sprintf('"%s",', $value);
            }elseif(is_array($value)){
                $jsonld .= sprintf('{%s},', _arr2jsonld($value));
            }
        }
        elseif(is_string($key)){
            if(is_array($value) && _is_assoc($value)){
                $jsonld .= sprintf('"%s":{%s},', $key, _arr2jsonld($value));
            }elseif(is_array($value) && !_is_assoc($value)){
                $jsonld .= sprintf('"%s":[%s],', $key, _arr2jsonld($value));
            }elseif(!empty($value)){
                $jsonld .= sprintf('"%s":"%s",', $key, $value);
            }
        }

    }
    return rtrim($jsonld, ',');
}

//获取页面主图:
function get_primaryimage($post = NULL, $withsize = false){
    if(is_category())
        $img = get_category_thumbnail();
    elseif(is_home() || is_tag() || is_search() || is_single() || is_page() || is_topic()){
        $img = get_the_thumbnail();
    }
    if(empty($img)){
        $images = get_images($post);
        $img = $images[0];
    }

    if($withsize == false)
        return $img;
    else{
        list($width, $height) = get_image_size($img);
        return array($img, $width, $height);
    }
}

//获取文章图片列表
function get_images($post = NULL){
    $post = get_post($post);
    $images = array();
    //缩略图
    if(!empty($post->post_thumbnail)){
        $images[] = $post->post_thumbnail;
    }
    //图库图
    if(!empty($post) && $post->have_images('gallery')){
        while($post->have_images('gallery')){
            $post->the_image();
            $images[] = $post->atlas->get_current_image_link();
        }
    }
    //内容图
    if(!empty($post))
	preg_match_all('/<img.*?src=["\']([^\'"]*)["\'].*?>/i', $post->get_post_content(), $matches);
    $images = array_merge($images, $matches[1]);
    return $images;
}

//获取图片尺寸， 返回宽度和高度
function get_image_size($url){
    $url = urldecode($url);
    if(strpos($url, home_url(1)) === 0 )
        $path = ABSPATH.str_replace(home_url(1), '', $url);
    elseif(substr($url, 0, 1) == '/')
        $path = ABSPATH.substr($url, strlen(dm_get_install_path()));
    else
        $path = $url;
    list($width, $height, $type, $attr) = @getimagesize($path);
    return array('0'=>$width, '1'=>$height, 'width'=>$width, 'height'=>$height);
}

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
    echo sprintf('<div class="breadcrumb"><a href="%s">Home</a> &gt; %s</div>', home_url(1), $html);
}

//显示时间间隔
function get_interval_time($origin_time){
    $origin = strtotime($origin_time);
    $diff = time() - $origin;
    if($diff < 3600){
        $num = ceil($diff/60);
        $s = $num > 1 ? 's' : '';
        return sprintf('%d minute%s ago', $num, $s);
    }
    elseif($diff < 3600*24){
        $num = ceil($diff/3600);
        $s = $num > 1 ? 's' : '';
        return sprintf('%d hour%s ago', $num, $s);
    }
    elseif($diff < 3600*24*30){
        $num = ceil($diff/(3600*24));
        $s = $num > 1 ? 's' : '';
        return sprintf('%d day%s ago', $num, $s);
    }
    elseif($diff < 3600*24*70){
        $num = round($diff/(3600*24*7));
        $s = $num > 1 ? 's' : '';
        return sprintf('%d week%s ago', $num, $s);
    }
    elseif($diff < 3600*24*365){
        $num = round($diff/(3600*24*30));
        $s = $num > 1 ? 's' : '';
        return sprintf('%d month%s ago', $num, $s);
    }else{
        $num = round($diff/(3600*24*365));
        $s = $num > 1 ? 's' : '';
        return sprintf('%d year%s ago', $num, $s);
    }
}

//根据数字显示可数名词的s
function the_plural($int){
    if(intval($int) > 1)
        echo 's';
}

//搜索默认不搜产品
function modify_search_query($query){
    if($query->is_search && $query->is_main_query()){
        $query->set('category__not_in', array(1,2,3,4,5,6,7,8,9));
    }
}

//加载指定文章
function load_posts(){
    $offset = !empty($_REQUEST['offset']) ? intval($_REQUEST['offset']): 0;
    $cat = !empty($_REQUEST['cat']) ? intval($_REQUEST['cat']): 0 ;
    $tag = !empty($_REQUEST['tag']) ? intval($_REQUEST['tag']): 0 ;
    $search = !empty($_REQUEST['s']) ? strval($_REQUEST['s']): 0 ;
    $count = !empty($_REQUEST['count']) && intval($_REQUEST['count']) > 0 && intval($_REQUEST['count']) <= 30 ? intval($_REQUEST['count']) : 10;

    $args = array('offset'=>$offset, 'posts_per_page'=>$count);
    $nexturltemplate = get_dminfo('ajax_url').'?action=loadposts&offset=%d&count=%d&cat=%d&tag=%d&s=%s';
    if($cat > 0)
        $args['cat'] = $cat;
    if($tag > 0 )
        $args['tag_id'] = $tag;
    if(!empty($search))
        $args['s'] = $search;

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
            $ps['items'][$key]['post_thumbnail'] = $post->post_thumbnail;
            $ps['items'][$key]['post_thumbnail_fallback'] = get_dminfo('ajax_url')."?action=webp2jpg&f=".urlencode($post->post_thumbnail);
            $ps['items'][$key]['post_date'] = $post->post_date;
            $ps['items'][$key]['post_datetext'] = date('M j, Y', strtotime($post->post_date));
            $ps['items'][$key]['permalink'] = $post->get_permalink();
            $ps['items'][$key]['mobile_permalink'] = $post->get_permalink(1);
            $ps['items'][$key]['author'] = get_the_author($post);
            $ps['items'][$key]['author_avatar'] = get_the_author_meta('avatar', $post->post_author);
            if(!empty($tag))
                $ps['items'][$key]['images'] = get_images($post);
            if(!empty($cat))
                $ps['items'][$key]['feedback_number'] = get_feedback_number($post);
    }
    if($offset +  count($posts) < $found_posts){
        $ps['next'] = sprintf($nexturltemplate, $offset +  count($posts), $count, $cat, $tag, esc_url($search));
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


//在线转码webp
function webp2jpg(){
    $imageurl = substr(parse_url($_REQUEST['f'], PHP_URL_PATH), strlen(dm_get_install_path()));
    $image = ABSPATH.$imageurl;
    if(!file_exists($image)){
        status_header(404);
        die;
    }elseif(!function_exists('imagecreatefromwebp') || substr($image, -5) != '.webp'){
        status_header(500);
        die;
    }
    $originurl = substr($_REQUEST['f'], 0,  4) == 'http' ? $_REQUEST['f'] : home_url(1).substr($_REQUEST['f'], 1);
    header('Content-Type:image/jpeg');
    header('Cache-Control:public,max-age=8640000');
    header('Last-Modified:'.gmdate('D, d M Y H:i:s T', filemtime($image)));
    header(sprintf('Link: <%s>; rel="canonical"', $originurl));
    $webp = imagecreatefromwebp($image);
    imagejpeg($webp);
    imagedestroy($webp);
}

//在线裁剪图片
function cropimage(){
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

//AMP内容过滤器
function amp_filter($content){
    if(!is_mobile())
        return $content;
    $mipcontent = preg_replace('/<style.*?<\/style>/iS', '', $content);
    $mipcontent = preg_replace('/<script.*?<\/script>/iS', '', $mipcontent);
    $mipcontent = preg_replace('/<img([^>]*?)\/?>/iS', '<amp-img$1></amp-img>', $mipcontent);
    $mipcontent = str_replace('<iframe', '<amp-iframe layout="fixed-height"', $mipcontent);
    $mipcontent = str_replace('</iframe>', '</amp-iframe>', $mipcontent);
    $mipcontent = str_replace('<video', '<amp-video', $mipcontent);
    $mipcontent = str_replace('</video>', '</amp-video>', $mipcontent);
    $mipcontent = preg_replace('/\s+style="[^"]*"/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+href="javascript[^"]*"/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+href=\'javascript[^\']*\'/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+style=\'[^\']*\'/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+textvalue=\'[^\']*\'/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+textvalue="[^"]*"/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+border=\'[^\']*\'/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+border="[^"]*"/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+vspace=\'[^\']*\'/i', '', $mipcontent);
    $mipcontent = preg_replace('/\s+vspace="[^"]*"/i', '', $mipcontent);
    $mipcontent = preg_replace_callback('/<amp-img\s+([^>]*)><\/amp-img>/iS', function($m){
        preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
        $attrs = array_combine($ms[1], $ms[3]);
        if((empty($attrs['width']) || empty($attrs['height'])) && function_exists('getimagesize')){
            $imgsrc = urldecode($attrs['src']);
            list($w, $h) = get_image_size($imgsrc);
            $attrs['width'] = $w;
            $attrs['height'] = $h;
        }
        if(empty($attrs['alt'])){
            $attrs['alt'] = '';
        }
        if(empty($attrs['layout'])){
            $attrs['layout'] = 'intrinsic';
        }
        $returned = '';
        foreach($attrs as $k=>$v){
            $returned .= " $k=\"$v\"";
        }
        return "<amp-img$returned>".webpfallback($attrs['src'], $attrs['alt'], $attrs['width'], $attrs['height'])."</amp-img>";
    }, $mipcontent);
    $mipcontent = preg_replace_callback('/<amp-video\s+([^>]*)>.*?<\/amp-video>/iS', function($m){
        preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
        $attrs = array_combine($ms[1], $ms[3]);
        if(empty($attrs['width']) || empty($attrs['height'])){
            $attrs['width'] = 600;
            $attrs['height'] = 400;
        }
        if(empty($attrs['layout']))
            $attrs['layout'] = 'intrinsic';
        $returned = '';
        foreach($attrs as $k=>$v){
            if($k == 'prealod') continue;
            $returned .= " $k=\"$v\"";
        }
        return "<amp-video$returned></amp-video>";
    }, $mipcontent);
    $mipcontent = preg_replace_callback('/<amp-iframe\s+([^>]*)>.*?<\/amp-iframe>/iS', function($m){
        preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
        $attrs = array_combine($ms[1], $ms[3]);
        if(empty($attrs['width']) || empty($attrs['height']) || !is_numeric($attrs['width']) || !is_numeric($attrs['height'])){
            $attrs['width'] = 'auto';
            $attrs['height'] = 500;
            $attrs['layout'] = 'fixed-height';
        }
        if(empty($attrs['sandbox']))
            $attrs['sandbox'] = 'allow-scripts allow-same-origin';
        if(empty($attrs['layout']))
            $attrs['layout'] = 'intrinsic';
        $returned = '';
        foreach($attrs as $k=>$v){
            $returned .= " $k=\"$v\"";
        }
        return "<amp-iframe$returned></amp-iframe>";
    }, $mipcontent);
    return $mipcontent;
}

//生成AMP图片替补代码
function webpfallback($imgsrc, $alt, $width, $height){
    if(substr($imgsrc, -4) != 'webp')
        return '';
    if(substr($imgsrc, 0, 4) != 'http')
        $imgsrc = 'https://'.$_SERVER['HTTP_HOST'].$imgsrc;
    $imgsrc = get_dminfo('ajax_url').'?action=webp2jpg&f='.urlencode($imgsrc);
    return sprintf('<amp-img alt="%s" fallback src="%s" layout="intrinsic" width="%d" height="%d"></amp-img>', $alt, $imgsrc, $width, $height);
}

//记载文章访问次数
function record_viewed(){
    $id = intval($_REQUEST['id']);
    $viewed = intval(get_post_meta($id, 'viewed')) + 1;
    update_post_meta($id, 'viewed', $viewed);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $viewed;
}

//显示星评
function show_rating_star($rating){
    $rating = floatval($rating);
    if($rating > 5 || $rating < 0 )
        $rating = 5.0;
    $filledcount = intval($rating);
    $halfcount = $rating - $filledcount > 0 ? 1 : 0;
    echo str_repeat('<span class="star-filled"></span>',$filledcount).str_repeat('<span class="star-half"></span>', $halfcount);
}

//获取产品星评价
function get_rating($id = 0){
    if(empty($id))
        $id = get_the_ID();
    $fquery = new DM_Feedback_Query();
    $coms = $fquery->query(array('post_id'=>$id, 'group'=>'comment', 'feedback_parent'=>0, 'status'=>'approved', 'meta_key'=>'score', 'no_found_rows'=>false, 'parent'=>0));
    $count = $fquery->found_feedbacks();
    $total = 0;
    foreach($coms as $com){
        $total += intval($com->get_meta('score', true));
    }
    if($count > 0)
        return array('count'=>$count, 'score'=>round($total/$count, 2));
    return array('count'=>0, 'score'=>0);
}

//评论评价
function add_comment(){
    header('content-type:application/json');
    $_POST['content'] = strip_tags($_POST['content'], 'p,a,strong');
    $feedback_id = dm_insert_feedback($_POST);
    $lang = isset($_REQUEST['lang']) ? $_REQUEST['lang'] : get_option('dmlang');
    if(is_dm_error($feedback_id)){
        $code = __($feedback_id->get_error_code(), $lang);
        $message = __($feedback_id->get_error_message(), $lang);
    }elseif($feedback_id > 0){
        $code = 200;
        $message = 'Thanks for your message!';
        dm_set_feedback_cookie($feedback_id);
        $score = isset($_REQUEST['score']) ? intval($_REQUEST['score']) : 0;
        if($score > 0 && $score <=5 )
            add_feedback_meta($feedback_id, 'score', $score);
    }
    $result = array('code'=>$code, 'message'=>$message);
    echo json_encode($result);
}

//加载评论
function load_comments(){
    $offset = isset($_REQUEST['offset']) ? intval($_REQUEST['offset']) : 0;;
    $count = isset($_REQUEST['count']) ? intval($_REQUEST['count']) : 10;
    $parent = isset($_REQUEST['parent']) ? intval($_REQUEST['parent']) : 0;
    $post_id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    
    $feedback_query = new DM_Feedback_Query();
    $comments = $feedback_query->query(array('post_id'=>$post_id, 'parent'=>$parent, 'number'=>$count, 'offset'=>$offset, 'group'=>'comment', 'no_found_rows'=>false, 'status'=>'approved'));
    $total = $feedback_query->found_feedbacks();
    $found = count($comments);
    $result = array('total'=>$total,'offset'=>$offset,'count'=>$found,'items'=>array(), 'next'=>'');

    foreach($comments as $i=>$comment){
        $result['items'][$i]['id'] = $comment->feedback_ID;
        $result['items'][$i]['author'] = strlen($comment->feedback_user_name) > 3 ? substr($comment->feedback_user_name, 0, 3).'***' : $comment->feedback_user_name;
        $result['items'][$i]['avatar'] = sprintf('https://www.gravatar.com/avatar/%s.jpg?d=mp', md5($comment->feedback_user_email));
        $result['items'][$i]['content'] = $comment->feedback_content;
        $result['items'][$i]['date'] = get_interval_time($comment->feedback_date);
        $result['items'][$i]['likes'] = intval(get_feedback_meta($comment, 'likes'));
        $result['items'][$i]['score'] = get_feedback_meta($comment, 'score') ? get_feedback_meta($comment, 'score') : NULL;
    }
    if($found + $offset < $total)
        $result['next'] = sprintf('%s?action=%s&offset=%d&count=%d&id=%d&parent=%d', get_dminfo('ajax_url'), 'loadcomments', $offset + $found, $count, $post_id, $parent);
    $origin = @$_SERVER['HTTP_ORIGIN'];
    header('Cache-Control: public,max-age:1800');
    header('Access-Control-Allow-Origin:'.$origin);
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Expose-Headers:AMP-Access-Control-Allow-Source-Origin');
    header('AMP-Access-Control-Allow-Source-Origin:'.$origin);
    header("Cache-Control:no-cache");
    header('Content-Type:application/json');
    echo json_encode($result);
}

//like post
function like_post(){
    $id = intval($_REQUEST['id']);
    $likes = intval(get_post_meta($id, 'likes')) + 1;
    update_post_meta($id, 'likes', $likes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $likes;
}
//unlike post
function unlike_post(){
    $id = intval($_REQUEST['id']);
    $likes = intval(get_post_meta($id, 'likes')) - 1;
    update_post_meta($id, 'likes', $likes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $likes;
}
//dis like
function dislike_post(){
    $id = intval($_REQUEST['id']);
    $dislikes = intval(get_post_meta($id, 'dislikes')) + 1;
    update_post_meta($id, 'dislikes', $dislikes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $dislikes;
}
//undis like
function undislike_post(){
    $id = intval($_REQUEST['id']);
    $dislikes = intval(get_post_meta($id, 'dislikes')) - 1;
    update_post_meta($id, 'dislikes', $dislikes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $dislikes;
}
//like comment
function like_comment(){
    $id = intval($_REQUEST['id']);
    $likes = get_feedback_meta($id, 'likes') + 1;
    update_feedback_meta($id, 'likes', $likes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $likes;
}
//unlik comment
function unlike_comment(){
    $id = intval($_REQUEST['id']);
    $likes = get_feedback_meta($id, 'likes') - 1;
    update_feedback_meta($id, 'likes', $likes);
    header("Cache-Control:no-cache");
    header("X-Robots-Tag:noindex, nofollow");
    echo $likes;
}

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
             if($data->column_id == 'EMAIL')
                $email .= $data->string_value;
              if($data->column_id == 'PRODUCT')
                $product .= $data->string_value;
    }
    $feedback = array('user_name'=>$name, 'user_email'=>$email, 'user_mobile'=>$phone, 'content'=>sprintf("Product: %s\nCompany: %s", $product, $company), 'user_referer'=>'Google Lead Webhook');
    return dm_insert_feedback($feedback, false);
}

//更改sitemap缓存
function modify_sitemap_header($headers){
    if(is_sitemap())
        $headers['Cache-Control'] = 'public, max-age=1800';
    return $headers;
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

//增加头部
function add_title($title){
    if(!is_home())
        return $title .' - Camelway Group';
    return $title;
}

//array
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

//内容导航
function single_content_filter($content){
    $content = str_replace('<p><br/></p>', '', $content);
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
    if(is_single() && in_category(10) && !empty($navs)){
        $html = _arr2nav($navs);
        if(!empty($html)){
            $content = sprintf('<div class="content-navigation" role="navigation"><h2>Contents</h2>%s</div>%s', $html, $content);
        }
    }

    $content = preg_replace_callback('/<img([^>]*)>/i', function($m){
        preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
        $attrs = array_combine($ms[1], $ms[3]);
        $srcset = '';
        if(!empty($attrs['src']) && function_exists('getimagesize')){
            $imgsize = get_image_size($attrs['src']);
            $width = $imgsize[0];      
            if(empty($attrs['srcset']) && $width > 400){
                $srcset .= sprintf('%s?action=cropimage&f=%s&width=400 400w,', get_dminfo('ajax_url'), esc_url($attrs['src']));
            }
            if(empty($attrs['srcset']) && $width > 600){
                $srcset .= sprintf('%s?action=cropimage&f=%s&width=600 600w,', get_dminfo('ajax_url'), esc_url($attrs['src']));
            }
            if(empty($attrs['srcset']) && $width > 800){
               $srcset .= sprintf('%s?action=cropimage&f=%s&width=800 800w,', get_dminfo('ajax_url'), esc_url($attrs['src']));
            }
            if(empty($attrs['srcset']) && $width > 0){
                $srcset .= sprintf('%s %dw', $attrs['src'], $width);
            }
        }
        if(!empty($srcset))
            return sprintf('<img srcset="%s"%s>', $srcset, $m[1]);
        return $m[0];
    }, $content);

    return $content;
}

//压缩html
function compress_html($content){
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
function seo_robots(){
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

//主题数据更新
function modify_theme_data(){
    if(!empty($_POST)){
        add_option('site_lang', $_POST['sitelang']); 
        add_option('site_mobile', $_POST['sitemobile']); 
        add_option('site_email', $_POST['siteemail']); 
        add_option('float_mobile', $_POST['floatmobile']); 
        add_option('float_whatsapp', $_POST['floatwhatsapp']); 
        add_option('float_telegram', $_POST['floattelegram']); 
        add_option('float_email', $_POST['floatemail']); 
        add_option('google_ga', $_POST['googlega']); 
        add_option('facebook_pixel', $_POST['facebookpixel']); 
        add_option('gloabaljs', $_POST['gloabaljs']); 
        add_option('conversionjs', $_POST['conversionjs']); 
        echo '<div class="dm-message dm-message-success">更新成功!</div>';
    }
    $html=<<<HTML
<h1>主题数据</h1>
<form method="post" action="">
<table class="form-table">
    <tr>
        <th scope="row"><label for="sitemobile">网站电话号码</label></th>
        <td>
            <input type="text" id="sitemobile" name="sitemobile" value="%s" class="regular-text">
            <p class="description">显示在网站上的电话号码。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="siteemail">网站邮箱地址</label></th>
        <td>
            <input type="text" id="siteemail" name="siteemail" value="%s" class="regular-text">
            <p class="description">显示在网站上的邮箱地址。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="floatwhatsapp">浮动whatsapp</label></th>
        <td>
            <input type="text" id="floatwhatsapp" name="floatwhatsapp" value="%s" class="regular-text">
            <p class="description">浮动显示whatsapp对话号码。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="googlega">Google统计全局ID</label></th>
        <td>
            <input type="text" id="googlega" name="googlega" value="%s" class="regular-text">
            <p class="description">Google统计全局ID，用于AMP页面。</p>
        </td>
    </tr>
     <tr>
        <th scope="row"><label for="facebookpixel">Facebook像素ID</label></th>
        <td>
            <input type="text" id="facebookpixel" name="facebookpixel" value="%s" class="regular-text">
            <p class="description">Facebook像素ID，用于AMP页面。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="gloabaljs">全局JS代码</label></th>
        <td>
            <textarea id="gloabaljs" name="gloabaljs" class="large-text" rows="20">%s</textarea>
            <p class="description">全局JS代码，可以用来存放各种统计代码。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="conversionjs">转化代码</label></th>
        <td>
            <textarea id="conversionjs" name="conversionjs" class="large-text" rows="5">%s</textarea>
            <p class="description">转化代码，进行转化统计。</p>
        </td>
    </tr>
</table>
    <p class="submit"><input type="submit" value="保存更改" class="button-primary"></p>
</form>
HTML;
printf($html, get_option('site_mobile'), get_option('site_email'), get_option('float_whatsapp'), get_option('googlega'), get_option('facebookpixel'), esc_html(get_option('gloabaljs')), esc_html(get_option('conversionjs')));
}

//给后台增加主题数据管理页面
function add_theme_menu(){
    add_submenu_page('themes', '网站数据管理', '网站数据管理', array('edit_themes'), 'edit-data', 'modify_theme_data');
}
add_action('admin_menu', 'add_theme_menu');

add_action('pre_get_posts', 'modify_search_query');
add_filter('dm_title', 'add_title');
add_filter('dm_headers', 'modify_sitemap_header');
add_action('ajax_webp2jpg', 'webp2jpg');
add_action('ajax_cropimage', 'cropimage');
add_action('ajax_viewed', 'record_viewed');
add_action('ajax_addcomment', 'add_comment');
add_action('ajax_likepost', 'like_post');
add_action('ajax_unlikepost', 'unlike_post');
add_action('ajax_dislikepost', 'dislike_post');
add_action('ajax_undislikepost', 'undislike_post');
add_action('ajax_likecomment', 'like_comment');
add_action('ajax_unlikecomment', 'unlike_comment');
add_action('ajax_loadcomments', 'load_comments');
add_action('ajax_loadposts', 'load_posts');
add_action('ajax_addlead', 'add_lead');
add_action('flush_feedback_result', 'feedback_amp_response');
add_filter('robots_txt', 'seo_robots');

add_action('the_content', 'single_content_filter');
add_action('dm_response', 'compress_html');