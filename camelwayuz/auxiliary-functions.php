<?php
//load css
function load_style(){
    $path = is_mobile() ? dirname(__FILE__).'/mobile/' : dirname(__FILE__).'/';
    $style = file_get_contents($path.'style.css');
    if(is_home())
        $style .= file_get_contents($path.'style/index.css');
    elseif(is_category())
        $style .= file_get_contents($path.'style/category.css');
    elseif(is_single())
        $style .= file_get_contents($path.'style/single.css');
    elseif(is_page())
        $style .= file_get_contents($path.'style/page.css');
    elseif(is_tag())
        $style .= file_get_contents($path.'style/tag.css');
    elseif(is_search())
        $style .= file_get_contents($path.'style/search.css');
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
    if(is_mobile())
        echo "<style amp-custom>$style\n</style>\n";
    else
        echo "<style>$style\n</style>\n";
}

//twitter card
function the_twitter_card($twitter = 'camelway'){
    $image = get_primaryimage();
    printf('<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@%s">
<meta name="twitter:title" content="%s">
<meta name="twitter:description" content="%s">
<meta name="twitter:image" content="%s">
', $twitter, dm_title('-', false), dm_description(255, false), $image);
}

//facebook ogp protocol
function the_facebook_ogp($sitename, $facebookurl){
    $lang = get_option('site_lang');
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
<meta property="article:author" content="%s">
<meta property="article:publisher" content="%s">', dm_url(0), get_the_title(), esc_html(dm_trim_words(get_the_excerpt(), 255)),  get_the_time('Y-m-d H:i:s'), get_the_modified_time('Y-m-d H:i:s'), get_the_author(), $facebookurl);
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
    list($img, $w, $h) = get_primaryimage(NULL, true);
    if($img){
        $ogp .= sprintf('
<meta property="og:image" content="%s">
<meta property="og:image:width" content="%d">
<meta property="og:image:height" content="%d">', $img, $w, $h);
    }
    echo $ogp."\r\n";
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
        $img = isset($images[0]) ? $images[0] : NULL;
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
    if(!empty($post)){
        //缩略图
        if(!empty($post->post_thumbnail)){
            $images[] = $post->post_thumbnail;
        }
        //图库图
        if($post->have_images('gallery')){
            while($post->have_images('gallery')){
                $post->the_image();
                $images[] = $post->atlas->get_current_image_link();
            }
        }
        //内容图
        preg_match_all('/<img.*?src=["\']([^\'"]*)["\'].*?>/i', $post->get_post_content(), $matches);
        $images = array_merge($images, $matches[1]);
    }
    return $images;
}

//获取图片尺寸， 返回宽度和高度
function get_image_size($url){
    $url = urldecode($url);
    if( strpos($url, home_url(1)) === 0 )
        $path = ABSPATH.str_replace(home_url(1), '', $url);
    elseif(substr($url, 0, 1) == '/')
        $path = ABSPATH.substr($url, strlen(dm_get_install_path()));
    else
        $path = $url;
    list($width, $height, $type, $attr) = @getimagesize($path);
    return array('0'=>$width, '1'=>$height, 'width'=>$width, 'height'=>$height);
}

//生成网站图片srcset
function content_img_srcset($content){
    $content = preg_replace_callback('/<img([^>]*)>/i', function($m){
        preg_match_all('/([^=\s]*)=(["\'])(.*?)\2/i', $m[1], $ms);
        $attrs = array_combine($ms[1], $ms[3]);
        $srcset = '';
        if(!empty($attrs['src']) && !isset($attrs['srcset'])){
            $srcset = get_srcset($attrs['src']);
            if($srcset)
                return sprintf('<img srcset="%s"%s', $srcset, $m[1]);
        }
        return $m[0];
    }, $content);
    return $content;
}

//AMP内容过滤器
function amp_filter($content){
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
        if(empty($attrs['width']) || empty($attrs['height'])){
            list($width, $height) = get_image_size($attrs['src']);
            $attrs['width'] = $width;
            $attrs['height'] = $height;
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
    $imgsrc = get_dminfo('ajax_url').'?action=modifyimg&f='.urlencode($imgsrc).'&type=jpg';
    return sprintf('<amp-img alt="%s" fallback src="%s" layout="intrinsic" width="%d" height="%d"></amp-img>', $alt, $imgsrc, $width, $height);
}

//生成图片的srcset
function get_srcset($imgsrc, $ws = array(250, 350, 600, 750, 950)){
    list($width, $height) = get_image_size($imgsrc);
    if($width > 0){
        $srcs = sprintf('%s %dw', $imgsrc, $width);
        foreach($ws as $w){
            if($width > $w)
                $srcs .= sprintf(', '.get_dminfo('ajax_url').'?action=modifyimg&f=%s&width=%d %dw', $imgsrc, $w, $w);
        }
        return $srcs;
    }
    return false;
}

//获取图片的srcset
function the_srcset($imgsrc, $ws = array(200, 400, 600, 800, 1000)){
    $srcs = get_srcset($imgsrc, $ws);
    if($srcs)
        printf('srcset="%s"', $srcs);
}

//获取文章评分数据
function get_rating($post_id = 0){
    if(empty($post_id))
        $post_id = get_the_ID();
    $metas = get_the_meta('product_rating', $post_id, false);
    $metas = array_filter($metas, function($rating){$rating = intval($rating);if($rating > 5 || $rating < 0) return false; return true;});
    $count = count($metas);
    if($count > 0){
        $value = sprintf("%.1f", array_sum($metas)/$count);
        return array('count'=>$count, 'score'=>$value);
    }
    return false;
}

//tip替换
function product_subtitle_replace($content){
	$title =  get_the_subtitle();
	return str_replace('%subtitle%', $title, $content);
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
        <th scope="row"><label for="sitelang">网站语言代码</label></th>
        <td>
            <input type="text" id="sitelang" name="sitelang" value="%s" class="regular-text">
            <p class="description">网站语言代码，如en, es, ru等。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="sitemobile">头部电话号码</label></th>
        <td>
            <input type="text" id="sitemobile" name="sitemobile" value="%s" class="regular-text">
            <p class="description">显示在网站头部的电话号码。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="siteemail">头部邮箱地址</label></th>
        <td>
            <input type="text" id="siteemail" name="siteemail" value="%s" class="regular-text">
            <p class="description">显示在网站头部的邮箱地址。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="floatmobile">浮动电话号码</label></th>
        <td>
            <input type="text" id="floatmobile" name="floatmobile" value="%s" class="regular-text">
            <p class="description">浮动显示的电话号码。</p>
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
        <th scope="row"><label for="floattelegram">浮动telegram</label></th>
        <td>
            <input type="text" id="floattelegram" name="floattelegram" value="%s" class="regular-text">
            <p class="description">浮动显示telegram账号。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="floatemail">浮动邮箱</label></th>
        <td>
            <input type="text" id="floatemail" name="floatemail" value="%s" class="regular-text">
            <p class="description">浮动显示邮箱账号。</p>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="googlega">Google分析ID</label></th>
        <td>
            <input type="text" id="googlega" name="googlega" value="%s" class="regular-text">
            <p class="description">Google分析的代码，用在AMP页面中。</p>
        </td>
    </tr>
     <tr>
        <th scope="row"><label for="facebookpixel">Facebook像素ID</label></th>
        <td>
            <input type="text" id="facebookpixel" name="facebookpixel" value="%s" class="regular-text">
            <p class="description">Facebook像素代码，用在AMP页面中。</p>
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
printf($html, get_option('site_lang'), get_option('site_mobile'), get_option('site_email'), get_option('float_mobile'),  get_option('float_whatsapp'),  get_option('float_telegram'),  get_option('float_email'),  get_option('google_ga'), get_option('facebook_pixel'), esc_html(get_option('gloabaljs')), esc_html(get_option('conversionjs')));
}
