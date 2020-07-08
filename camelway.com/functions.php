<?php
/*
 * camelway功能文件
 */

/*
 * 获取并显示当前页面的面包屑导航
 * 参考: https://schema.org/BreadcrumbList
 */
function the_breadcrumblist($sep = "&gt;"){
    $category = get_category();

    $homeurl = get_dminfo('home'); 
    $home = <<<bread
<ol itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="$homeurl" itemprop="item"><span itemprop="name">Home</span></a>
                <meta itemprop="position" content="%d">
            </li>
bread;

    $html = '';
    $position = array(1);
    if(!empty($category)){
        $i = 2;
        do{
            $catlink = $category->get_permalink();
            $catname = $category->cat_name;
            $html = <<<bread
$sep
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="$catlink" itemprop="item"><span itemprop="name">$catname</span></a>
                <meta itemprop="position" content="%d">
            </li>
$html
bread;
            $position[] = $i;
            $i++;
        }while(($category = $category->get_parent()) != false);
    }

    if(is_single() || is_page() || is_topic()){
        $name = get_the_subtitle();
        $link = get_the_permalink();
    }elseif(is_search()){
        $name = get_search_query();
    }elseif(is_author()){
        $name = get_the_author();
    }elseif(is_tag()){
        $name = get_tag_title();
    }

    if(isset($name)){

    $html .= <<<bread
$sep
            <li>
                <em>$name</em>
            </li>
bread;
    }

    $html = $home.$html."        </ol>\n";
    $html = vsprintf($html, $position);
    echo $html.' ';
    return $html;
}

/*
 * 显示切换语言功能
 */
function the_languageselector(){
    $tips = "Change Language";
    if(is_single() || is_topic() || is_page()){
        $zh = get_the_post_data('chinese_url');
        $en = get_the_post_data('english_url');
        $fr = get_the_post_data('french_url');
        $es = get_the_post_data('spanish_url');
        $ru = get_the_post_data('russian_url');
        $ar = get_the_post_data('arabic_url');
    }

    $html = "";

    if(!empty($zh))
        $html .= "<li><a href=\"$zh\" hreflang=\"zh\">简体中文</a>";
    if(!empty($en))
        $html .= "<li><a href=\"$en\" hreflang=\"en\">English</a>";
    if(!empty($fr))
        $html .= "<li><a href=\"$fr\" hreflang=\"fr\">Français</a>";
    if(!empty($es))
        $html .= "<li><a href=\"$es\" hreflang=\"es\">Español</a>";
    if(!empty($ru))
        $html .= "<li><a href=\"$ru\" hreflang=\"ru\">Русский</a>";
    if(!empty($ar))
        $html .= "<li><a href=\"$ar\" hreflang=\"ar\">العربية</a>";

    if(empty($html))
        return '';

    $html = <<<Language
<div class="show-item">$tips</div>
            <ul class="language">
                $html
            </ul>

Language;
    echo $html;
    return $html;
}

/*
 * 显示文章的keywords
 */
function the_schema_keywords(){
    if(!(is_single() || is_topic() || is_page()))
        return NULL;

    $tags = get_the_tags();
    if(empty($tags))
        return NULL;

    $html = __('<span class="tags">Tags</span>');

    foreach($tags as $tag){
        $html .= sprintf('<a href="%s"><span itemprop="keywords">%s</span></a>', $tag->get_permalink(), $tag->name);
    }
    $html = rtrim($html, ',');
    echo $html;
    return $html;
}

/*
 * 显示文章的所有图片
 */
function the_schema_images(){
    $images = array();
    $content = get_the_content();
    preg_match_all('/<img[\s\S].*?src=["\']([^\s"\']*)["\']/iS', $content, $match);
    if(!empty($match[1]))
        $images = $match[1];
    if(have_thumbnail())
        array_push($images, get_the_thumbnail());
    if(empty($images))
        $images[0] = 'https://data.camelway.net/static/images/camelway-500x500.png';
    foreach($images as $image){
        echo '<meta itemprop="image" content="'.$image.'">';
    }
    echo "\r\n";
    return $images;
}

/*
 * 获取文章的item
 */
function get_the_items($category = array(0), $include = array(), $count = 4, $orderby = 'rand'){
    if(!is_array($category))
        $category = array($category);
    
    if(empty($category) && empty($include))
        $posts = get_posts(array('numberposts'=>$count, 'orderby'=>$orderby));
    elseif(empty($category))
        $posts = get_posts(array('numberposts'=>$count, 'orderby'=>$orderby, 'include'=>$include));
    elseif(empty($include))
        $posts = get_posts(array('numberposts'=>$count, 'orderby'=>$orderby, 'category__in'=>$category));
    else
        $posts = get_posts(array('numberposts'=>$count, 'orderby'=>$orderby, 'category__in'=>$category, 'include'=>$include));

    $html = '';
    foreach($posts as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $excerpt = dm_trim_words($post->post_excerpt, 106);
        $thumbnail = $post->post_thumbnail;
        if(empty($thumbnail))
            continue;
        $html .= <<<ITEMSHTML

    <li>
        <a href="$permalink"><img src="$thumbnail" alt="$subtitle"></a>
        <div class="item-content">
            <h3><a href="$permalink">$subtitle</a></h3>
            <p>$excerpt</p>
            <a href="$permalink" class="more">More</a>
        </div>
    </li> 
ITEMSHTML;
    }
        return $html;
}

/*
 * 获取文章列表
 */
function the_vertical_items($category = array(), $count = 4, $orderby = 'rand'){
    $html = get_the_items($category, array(), $count, $orderby);
    $html = "<ul class=\"item-list-vertical\">$html</ul>";
    echo $html;
    return $html;
}

/*
 * 获取文章列表
 */
function the_horizontal_items($category = array(), $count = 2, $orderby = 'rand'){
    $html = get_the_items($category, array(), $count, $orderby);
    $html = "<ul class=\"item-list-horizontal\">$html</ul>";
    echo $html;
    return $html;
}

/*
 * 获取最新新闻
 */
function the_common_lists_with_date($category = array(0), $count = 5, $order = 'DESC'){
    if(!is_array($category))
        $category = array($category);
    $posts = get_posts(array('numberposts'=>$count, 'order'=>$order, 'category__in'=>$category));
    $html = '';
    foreach($posts as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $excerpt = dm_trim_words($post->post_excerpt, 120);
        $thumbnail = $post->post_thumbnail;
        $yearmonth = date('Y-m', strtotime($post->post_date));
        $day = date('d', strtotime($post->post_date));

        $html .= <<<ITEMSHTML
    <li>
        <div class="item-pubdate">
            <span class="ym">$yearmonth</span>
            <span class="day">$day</span>
        </div>
        <div class="item-excerpt">
            <h3><a href="$permalink">$subtitle</a></h3>
            <p>$excerpt</p>
            <a class="more" href="$permalink">More</a>
        </div>
    </li> 
ITEMSHTML;
    }
    $html = "<ul class=\"item-list-common\">$html</ul>";
    echo $html;
    return $html;
}

/*
 * 获取相关文章列表
 */
function the_related_items($type = 'vertical', $count = 4){
    $relateds = get_the_post_data('related_product');
    $post_ids = array_filter(explode(",", $relateds), 'strlen');
    shuffle($post_ids);

    if(count($post_ids) == 0)
        $html = get_the_items(array(), array(), $count);
    elseif(count($post_ids) > $count)
        $post_ids = array_slice($post_ids, 0, $count);

    $html = get_the_items(array(), $post_ids, $count);
    
    if($type == 'vertical')
        $html = "<ul class=\"item-list-vertical\">$html</ul>";
    elseif($type == 'horizontal')
        $html = "<ul class=\"item-list-horizontal\">$html</ul>";

    echo $html;
    return $html;
}

/*
 * 获取页面的secondary banner
 */
function the_secondary_banner(){
    if(is_category()){
        $banner = get_category_thumbnail();
        if(empty($banner))
            $banner = get_dminfo('template_url').'images/banner-category-'.get_category_ID().'.jpg';
    }elseif(is_single()){
        $post = get_post();
        $post_banner =  get_the_post_data('banner');
        $category_banner = get_category_thumbnail($post->post_category);
        $banner = !empty($post_banner) ? $post_banner : (!empty($category_banner) ? $category_banner : '');
    }elseif(is_page()){
        $post = get_post();
        $banner = get_dminfo('template_url').'images/'.$post->post_name.'.jpg';
    }else{
        $banner = '';
    }

    if(!empty($banner))
        echo ' style="background-image:url(\''.$banner.'\')"';
    return $banner;
}

/*
 * 上一篇和下一篇链接生产
 */
function camelway_post_pagination(){
    $p = get_previous_post_link();
    $n =  get_next_post_link();
    if(!empty($p))
        echo "<span>Previous: $p</span>";
    else
        echo "<span>Previous: No more</span>";
    if(!empty($n))
        echo "<span>Next: $n</span>";
    else
        echo "<span>Next: No more</span>";
}

/*
 * 增加标题
 */
function add_title($title){
    if(is_home())
        return $title;
    return $title .' - Camelway Machinery';
}

//移动版首页内容条目
function pre_get_index_posts($query){
    if($query->is_home() && $query->is_mobile() && $query->is_main_query())
        $query->set('posts_per_page', 5);
}

//amp不能使用的html标签包括img,iframe,video
//内联style
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
           if(substr($imgsrc, '0', 4) != 'http')
               $imgsrc = ABSPATH.$imgsrc;
           elseif(strpos($imgsrc, 'https://www.camelway.com/') === 0){
                $imgsrc = ABSPATH.substr($imgsrc, 24);
           }else
               $imgsrc = esc_url($imgsrc);

           $imgsize = getimagesize($imgsrc);
           $attrs['width'] = $imgsize[0];
           $attrs['height'] = $imgsize[1];
       }
       if(empty($attrs['layout'])){
            $attrs['layout'] = 'responsive';
       }

       $returned = '';
       foreach($attrs as $k=>$v){
           $returned .= " $k=\"$v\"";
       }
        return "<amp-img$returned></amp-img>";
    }, $mipcontent);


    $mipcontent = preg_replace_callback('/<amp-video\s+([^>]*)>.*?<\/amp-video>/iS', function($m){
       preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
       $attrs = array_combine($ms[1], $ms[3]);
       if(empty($attrs['width']) || empty($attrs['height'])){
           $attrs['width'] = 600;
           $attrs['height'] = 400;
       }

       if(empty($attrs['layout']))
            $attrs['layout'] = 'responsive';

       $returned = '';
       foreach($attrs as $k=>$v){
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
            $attrs['layout'] = 'responsive';

       $returned = '';
       foreach($attrs as $k=>$v){
           $returned .= " $k=\"$v\"";
       }
        return "<amp-iframe$returned></amp-iframe>";
    }, $mipcontent);

    return $mipcontent;
}

function modifie_mobile_cache_time($headers){
    if(is_mobile() && !is_user_logged_in()){
        $headers['Cache-Control'] = 'public, max-age = 172800';
        $headers['Expires'] = gmdate('D, d M Y H:i:s T', time() + 172800);
    }
    return $headers;
}

function webp2jpg(){
    $image = ABSPATH.str_replace('https://www.camelway.com/', '', $_REQUEST['f']);
    if(!file_exists($image) || !function_exists('imagecreatefromwebp') || substr($image, -5) != '.webp'){
        status_header(500);
        die;
    }
    header("Content-Type:image/jpeg");
    header("Cache-Control: public,max-age=864000");
    $webp = imagecreatefromwebp($image);
    imagejpeg($webp);
    imagedestroy($webp);
}
function og_image(){
    if(is_home()){
        return array('https://data.camelway.net/static/images/camelway-500x500.png', 500, 500);
    }
    elseif(is_single() || is_page() || is_topic() || is_category() || is_tag() || is_search()){
        $content =  get_the_content();
        preg_match_all('/<img[\s\S].*?src=["\']([^\s"\']*)["\']/iS', $content, $match);
        if(has_thumbnail()){
            $url = get_the_thumbnail();
        }elseif(!empty($match[1])){
            $url = $match[1][0];
        }
    }elseif(is_author()){
        $url = get_the_author_meta('avatar');
    }
    if(substr($url, 0 , 25) == 'https://www.camelway.com/'){
        $url = str_replace('https://www.camelway.com/', '', $url);
    }
    $path = ABSPATH.$url;
    if(empty($url) || !file_exists($path)){
        return false;
    }
    list($w, $h) = getimagesize($path);
    return array('https://www.camelway.com/'.$url, $w, $h);
}


function amp_response($response){
    $origin = $_SERVER['HTTP_ORIGIN'];
    header('Access-Control-Allow-Origin:'. $origin);
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Expose-Headers:AMP-Access-Control-Allow-Source-Origin');
    header('AMP-Access-Control-Allow-Source-Origin:'.$origin);
    header('Content-Type:application:json');
    echo json_encode($response);
}
add_action('flush_feedback_result', 'amp_response');
//add_filter('dm_title', 'add_title');
add_action('pre_get_posts', 'pre_get_index_posts');
add_filter('the_category_content', 'amp_filter');
add_filter('the_content', 'amp_filter');
add_filter('the_additional_content', 'amp_filter');
add_filter('the_author_description', 'amp_filter');
add_filter('dm_headers', 'modifie_mobile_cache_time');
add_action('ajax_webp2jpg', 'webp2jpg');
add_action('ajax_admin_webp2jpg', 'webp2jpg');
