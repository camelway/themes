<?php
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


function add_title($title){
    if(!is_home())
        return $title.' - '.'Camelway Machinery';
    return $title;
}

function product_subtitle_replace($content){
  if(!is_single())
    return $content;
  $title =  get_the_subtitle();
  return str_replace('%subtitle%', $title, $content);
}
function show_2_mobile($mobile){
    $mobile_arr = explode(",", $mobile);
    shuffle($mobile_arr);
    $lmobile = array_splice($mobile_arr, 0, 2);
    return implode(', ', $lmobile);
}

function webp2jpg(){
    $image = ABSPATH.str_replace('https://www.camelway.co.in/', '', $_REQUEST['f']);
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
        return array('http://www.camelway.co.in/dm-content/themes/hi-domai/images/camelway-china.jpg', 600, 388);
    }
    elseif(is_single() || is_category() || is_search()){
        if(have_posts()){
            $content =  get_the_content();
        }else{
            return array('http://www.camelway.co.in/dm-content/themes/hi-domai/images/camelway-china.jpg', 600, 388);
        }
        preg_match_all('/<img[\s\S].*?src=["\']([^\s"\']*)["\']/iS', $content, $match);
        if(has_thumbnail()){
            $url = get_the_thumbnail();
        }elseif(in_category(8) && !empty($images = get_post_images('gallery'))){
            $url = $images[1]->url;
        }elseif(!empty($match[1])){
            $url = $match[1][0];
        }
    }elseif(is_author()){
        $url = get_the_author_meta('avatar');
    }
    if(substr($url, 0 , 27) == 'https://www.camelway.co.in/'){
        $url = str_replace('https://www.camelway.co.in/', '', $url);
    }
    $path = ABSPATH.$url;
    if(empty($url) || !file_exists($path)){
        return false;
    }
    list($w, $h) = getimagesize($path);
    return array('https://www.camelway.co.in/'.$url, $w, $h);
}

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
           elseif(strpos($imgsrc, 'https://www.camelway.co.in/') === 0){
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
       return "<amp-img$returned>".webpfallback($attrs['src'], $attrs['alt'], $attrs['width'], $attrs['height'])."</amp-img>";
        //return "<amp-img$returned></amp-img>";
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
        return "<amp-iframe $returned></amp-iframe>";
    }, $mipcontent);
    return $mipcontent;
}

function amp_response($response){
    $origin = $_SERVER['HTTP_ORIGIN'];
    header('Access-Control-Allow-Origin:'.$origin);
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Expose-Headers:AMP-Access-Control-Allow-Source-Origin');
    header('AMP-Access-Control-Allow-Source-Origin:'.$origin);
    header('Content-Type:application:json');
    echo json_encode($response);
}

function webpfallback($imgsrc, $alt = '', $width = 600, $height = 350){
    if(substr($imgsrc, -4) != 'webp')
        return '';
    if(substr($imgsrc, 0, 4) != 'http')
        $imgsrc = 'https://'.$_SERVER['HTTP_HOST'].$imgsrc;
    $imgsrc = get_dminfo('ajax_url').'?action=webp2jpg&f='.urlencode($imgsrc);
    return sprintf('<amp-img alt="%s" fallback src="%s" layout="responsive" width="%d" height="%d"></amp-img>', $alt, $imgsrc, $width, $height);
}

function the_ratingValue(){
    $id = get_the_ID();
    $metas = get_the_meta('product_rating', $id, false);
    $metas = array_filter($metas, function($rating){$rating = intval($rating);if($rating > 5 || $rating < 0) return false; return true;});
    if(empty($id) || empty($metas)){
        echo 5;
        return;
    }
    $total = array_sum($metas);
    $count = count($metas);
    echo sprintf("%.2f",$total/$count);
}
function the_reviewCount(){
    $id = get_the_ID();
    $metas = get_the_meta('product_rating', $id, false);
    $metas = array_filter($metas, function($rating){$rating = intval($rating);if($rating > 5 || $rating < 0) return false; return true;});
    if(empty($id) || empty($metas)){
        echo 1;
        return;
    }
    echo count($metas);
}

function rating_product(){
    $pid = intval($_GET['id']);
    $rating = intval($_GET['rating']);

    if($rating > 5 || $rating < 1) return 0;
    if(isset($_COOKIE['ratingtime']) && time() - $_COOKIE['ratingtime'] < 60 ) return 0;
    setcookie('ratingtime', time(), time() + 3600, '/');
    echo add_post_meta($pid, 'product_rating', $rating);
}
function hide_no_thumbnail($query){
    if($query->is_category){
        $query->set('has_thumbnail', 1);
    }
    return $query;
}

add_filter('dm_title' ,'add_title');
add_filter('the_tips', 'product_subtitle_replace');
add_filter('the_mobile', 'show_2_mobile');
add_action('ajax_webp2jpg', 'webp2jpg');
add_action('ajax_admin_webp2jpg', 'webp2jpg');
add_action('ajax_ratingproduct', 'rating_product');
add_action('ajax_admin_ratingproduct', 'rating_product');
add_filter('pre_get_posts', 'hide_no_thumbnail');
add_filter('the_content', 'amp_filter');
add_action('flush_feedback_result', 'amp_response');
