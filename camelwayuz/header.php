<!DOCTYPE HTML>
<html lang="<?php echo get_option('site_lang')?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
<title><?php dm_title()?></title>
<?php if(is_home() || is_category() || is_tag() || is_single() || is_page() || is_topic()){ ?>
<meta name="keywords" content="<?php dm_keywords()?>">
<meta name="description" content="<?php dm_description()?>">
<link rel="canonical" href="<?php dm_url()?>">
<link rel="amphtml" href="<?php dm_mobile_url()?>">
<?php } ?>
<link rel="icon" href="<?php dminfo('template_url')?>images/favicon.ico">
<link rel="apple-touch-icon-precompose" href="<?php dminfo('template_url')?>images/touch-icon.png">
<link rel="alternate" type="application/atom+xml" title="RSS Feed" href="<?php dminfo('rss_url')?>">
<?php
if(!is_404()){
multi_language();
the_twitter_card();
the_facebook_ogp('ИП ООО «CAMELWAY CHINA»', 'https://www.facebook.com/camelway/');
the_google_schema('ИП ООО «CAMELWAY CHINA»', 'ИП ООО «CAMELWAY CHINA»');
}
load_style();
echo get_option('gloabaljs');
?>
<script>
    function conversion(){<?php echo get_option('conversionjs');?>}
    var camelwaydatalayer = (function(){
        var data;
        if(!window.localStorage.getItem('camelwaydata')){
            data = {'ratings': Array(), 'entrypage': window.location.href};
            window.localStorage.setItem('camelwaydata', JSON.stringify(data));
        }else{
            data = JSON.parse(window.localStorage.getItem('camelwaydata'));
        }
        function getscore(post_id){
            if(data.ratings.length == 0){
                return false;
            }
            for(var i in data.ratings){
                if(data.ratings[i].post_id == post_id)
                    return data.ratings[i].score;
            }
            return false;
        }
        function getscoremessage(post_id){
            if(data.ratings.length == 0){
                return false;
            }
            for(var i in data.ratings){
                if(data.ratings[i].post_id == post_id)
                    return data.ratings[i].message;
            }
            return false;
        }
        function getmetaid(post_id){
            if(data.ratings.length == 0){
                return false;
            }
            for(var i in data.ratings){
                if(data.ratings[i].post_id == post_id)
                    return data.ratings[i].meta_id;
            }
            return false;
        }
        function setscore(id, score, message, meta_id){
            var rate = {'post_id':id,'meta_id':meta_id,'score':score,'message':message};
            var index = data.ratings.length;
            for(var i in data.ratings){
                if(data.ratings[i].post_id == id && data.ratings[i].meta_id == meta_id){
                    index = i;
                    break;
                }
            }
            data.ratings[index] = rate;
            window.localStorage.setItem('camelwaydata', JSON.stringify(data));
        }
        return {
            'initpage': data.entrypage,
            'getscore': getscore,
            'getscoremessage': getscoremessage,
            'getmetaid': getmetaid,
            'setscore': setscore,
        }
    })();
    var supportwebp = (function(){var elem = document.createElement('canvas');if (!!(elem.getContext && elem.getContext('2d'))) {return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;}return false;})();
    function share_init(wrap){
        var wrap = document.querySelector(wrap);
        if(!wrap) return;
        var aw = window.screen.availWidth;
        var ah = window.screen.availHeight;
        var width,height,top,left;
        if(aw>1200){
            width = 800;
        }else if(aw>800){
            width = 600;
        }else{
            width = aw;
        }
        if(ah>800){
            height = 500;
        }else{
            height = ah;
        }
        top = ah/2 - height/2;
        left = aw/2 - width/2;
        wrap.addEventListener('click', function(e){
            var target = e.target || window.event.srcElement;
            var href = target.getAttribute('href');
            if(href){
                window.open(href, '_blank', 'width='+width+',height='+height+',left='+left+',top='+top+',location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');
            }
            e.preventDefault();
            return false;
        }, false);
    }
    function async_request(args){
        var url = args.url;
        var method = args.method || 'GET';
        var data = args.data || '';
        var callback = args.callback || '';
        var encodeddata = '';
        for(var i in data){
            encodeddata += encodeURIComponent(i)+"="+encodeURIComponent(data[i])+"&";
        }
        if(method.toLowerCase() == 'get' && url.indexOf('?') >=0 ){
            url = url + '&' + encodeddata.substr(0, encodeddata.length-1);
        }else if(method.toLowerCase() == 'get' && url.indexOf('?') ==-1 ){
            url = url + '?' + encodeddata.substr(0, encodeddata.length-1);
        }
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        if(method.toLowerCase() == 'post'){
            xhr.send(encodeddata.substr(0, encodeddata.length-1));
        }else{
            xhr.send();
        }
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                if(callback)
                    callback(xhr.responseText);
            }
        }
    }
    function async_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var company =  obj.company ? obj.company.value.trim() : '';
        var content = obj.content.innnerText || obj.content.value;
        var post_id = obj.post_ID ? obj.post_ID.value : 0;
        if(company !='' )
            content += "\r\nCompany: "+company;
        if(content !='')
            content += "\n\nLanding Page: " + camelwaydatalayer.initpage;

        var ajaxurl = obj.action+"?format=json";
        obj.submit.setAttribute('disabled', true);
        async_request({
            'method': "POST",
            'url': ajaxurl,
            'data': {'user_name':user_name,'user_mobile':user_mobile,'user_email':user_email,'content':content,'post_ID':post_id},
            'callback': function(data){
                obj.submit.removeAttribute('disabled');
                var result = JSON.parse(data);
                if(result.message && obj.querySelector('.result'))
                    obj.querySelector('.result').innerHTML = result.message;
                if(result.code == 200){
                    conversion();
                    obj.content.value = '';
                }
            }
        });
        return false;
    }
    function loadposts(obj){
        var offset  = obj.getAttribute('data-offset');
        var category  = obj.getAttribute('data-category') || 0;
        var search  = obj.getAttribute('data-search') || 0;
        var tag  = obj.getAttribute('data-tag') || 0;
        var url = "<?php dminfo('ajax_url')?>?action=loadposts";
        if(obj.classList.contains('loading'))
            return;
        obj.classList.add('loading');
        if(offset > 0){
            url += '&offset='+offset;
        }
        if(category != 0){
            url += '&cat='+category;
        }
        if(search != 0){
            url += '&s='+encodeURIComponent(search);
        }
        if(tag != 0){
            url += '&tag='+encodeURIComponent(tag);
        }
        async_request({
            'method': "GET",
            'url': url,
            'callback': function(data){
                 var result = JSON.parse(data);
                 var total = result.total;
                 var offset = result.offset;
                 var count = result.count;
                 obj.setAttribute('data-offset', offset + count);
                 var html = '';
                 for(var i in result.items){
                     var item = result.items[i];
                     var post_title = item['post_title'];
                     var permalink = item['permalink'];
                     var post_date = item['post_date'];
                     var post_excerpt = item['post_excerpt'].substr(0, 320)+'...';
                     var post_subtitle = item['post_subtitle'];
                     var post_thumbnail = item['post_thumbnail'];
                     var post_thumbnail_srcset = item['post_thumbnail_srcset'];
                     var author = item['author'];
                     var viewed = item['viewed'];
                     if(category == 8){
                         html += '<li><a href="'+permalink+'"><img src="'+post_thumbnail+'" alt="'+post_subtitle+'"></a><h3><a href="'+permalink+'">'+post_subtitle+'</a></h3>';
                     }else{
                         if(post_thumbnail){
                             html += '<li><div class="thumbnail"><a href="'+permalink+'"><img src="'+post_thumbnail+'" srcset="'+post_thumbnail_srcset+'" alt="'+post_subtitle+'" width="240" height="140"></a></div><div class="info"><h3><a href="'+permalink+'">'+post_subtitle+'</a></h3><div class="pubinfo"><span class="pubdate">'+post_date+'</span><span class="viewed">'+viewed+'</span></div><p>'+post_excerpt+'</p></div></li>';
                         }else{
                             html += '<li><div class="info"><h3><a href="'+permalink+'">'+post_subtitle+'</a></h3><div class="pubinfo"><span class="pubdate">'+post_date+'</span><span class="viewed">'+viewed+'</span></div><p>'+post_excerpt+'</p></div></li>';
                         }
                     }
                 }
                 obj.previousElementSibling.innerHTML += html;
                 obj.classList.remove('loading');
                 if(offset + count >= total){
                    obj.parentNode.removeChild(obj);
                    return;
                 }
            }
        });
    }
    function refreshposts(obj){
        var type = obj.getAttribute('data-loadtype') || 0;
        var processing = obj.hasAttribute('data-loading');
        var container = obj.parentNode.nextElementSibling || false;
        var offset = obj.hasAttribute('data-offset') ? obj.getAttribute('data-offset') : 0;
        if(type == 0 || container == false || processing == true ) {return false;}
        obj.setAttribute('data-loading', true);
        var template = '';
        var url = "<?php dminfo('ajax_url')?>?action=loadposts";
        if(type == 1){
            template = '<li><a href="{{permalink}}"><img src="{{post_thumbnail}}" srcset="{{post_thumbnail_srcset}}" alt="{{post_subtitle}}" width="300" height="175"></a><h3>{{post_subtitle}}</h3></li>'; 
            url += '&cat=1,2,3,4,5,6,7&count=6&orderby=rand';
        }else if(type == 2){
            template = '<li><a href="{{permalink}}"><img src="{{post_thumbnail}}" srcset="{{post_thumbnail_srcset}}" alt="{{post_subtitle}}" width="{{post_thumbnail_width}}" height="{{post_thumbnail_height}}"></a><h4>{{post_subtitle}}</h4></li>';
            url += '&cat=8&count=2';
        }else if(type == 3){
            url += '&cat=9&count=5';
            template = '<li><a href="{{permalink}}">{{post_subtitle}}</a><div class="pubinfo"><span class="pubdate">{{post_date}}</span><span class="viewed">{{post_viewed}}</span></div></li>';
        }
        url += '&offset='+offset;
        async_request({
            'method': 'GET',
            'url': url,
            'callback': function(data){
                var result = JSON.parse(data);
                var html = '';
                for(var i in result.items){
                    var item = result.items[i];
                    html += template.replace(/{{permalink}}/g, item['permalink']).replace(/{{post_thumbnail}}/g, item['post_thumbnail']).replace(/{{post_thumbnail_srcset}}/g, item['post_thumbnail_srcset']).replace(/{{post_subtitle}}/g, item['post_subtitle']).replace(/{{post_thumbnail_width}}/g, item['post_thumbnail_width']).replace(/{{post_thumbnail_height}}/g, item['post_thumbnail_height']).replace(/{{post_date}}/g, item['post_date']).replace(/{{post_viewed}}/g, item['viewed']);
                }
                if(obj.hasAttribute('data-offset')){
                    obj.setAttribute('data-offset', result['offset'] + result['count']);
                }
                container.innerHTML = html; 
                obj.removeAttribute('data-loading');
            }
        });
    }
    function toggleClass(target, classname){
        if(arguments.length == 2){
            var target = document.querySelector(arguments[0]);
            target.classList.toggle(arguments[1]);
        }else if(arguments.length == 1){
            var target = window.event.target;
            target.classList.toggle(arguments[0]);
        }
        window.event.preventDefault();
    }
    function current_time(){
        var now = new Date(); 
        var hour = now.getHours();
        hour = hour < 10 ? '0' + hour : hour;
        var minute = now.getMinutes();
        minute = minute < 10 ? '0' + minute : minute;
        var second = now.getSeconds();
        second = second < 10 ? '0' + second : second;
        var s =  hour >= 12 ? 'PM'  : 'AM';
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var date = now.getDate();
        return hour + ':' + minute + ':' + second + ' ' + s + ' ' + month + '/' + date + ', ' + year;
    }
(function(){
    document.addEventListener('DOMContentLoaded', function(){
        var menubtn = document.querySelector('.menu-btn');
        var slidernav = document.querySelector('.slidernav');
        var ajax_url = "<?php dminfo('ajax_url')?>";
        var timeinfo = document.querySelector('.time-info');
        setInterval(function(){
            timeinfo.innerText = current_time();
        }, 200);
        menubtn.addEventListener('click', function(){
            var wrap = document.createElement('div');
            wrap.className = 'wrap-layer';
            document.body.appendChild(wrap);
            slidernav.classList.toggle('sliderout');
            wrap.addEventListener('click', function(){
                slidernav.classList.toggle('sliderout');
                setTimeout(function(){
                    document.body.removeChild(wrap);
                }, 350);
            });
        
        });
<?php if(is_single()){ ?>
        var post_id = <?php the_ID();?>;
        //记录访问
        async_request({
            'method': 'GET',
            'url': ajax_url,
            'data': {'action':'viewed', 'id': post_id},
        });
        //评分功能
        var ratingbox = document.querySelector('.stars');
        var spans = ratingbox.querySelectorAll('span');
        var origin_score = camelwaydatalayer.getscore(post_id);
        if(origin_score > 0 && origin_score < 6){
            spans.forEach(function(c,i,o){
                if(c.getAttribute('data-score') <= origin_score){
                    c.classList.add('checked');
                }
            });
            document.querySelector('.rate .tips').innerText = camelwaydatalayer.getscoremessage(post_id);
        }
        ratingbox.addEventListener('mouseover', function(e){
            var ev = e || e.event;
            var target = ev.target || ev.srcElement;
            if(target.nodeName !== 'SPAN') return;
            var index = Array.from(spans).indexOf(target);
            spans.forEach(function(c,i,o){
                if(i<=index){
                    spans[i].className = 'checked';
                }else{
                    spans[i].className = '';
                }
            });
            ratingbox.nextElementSibling.innerText = target.getAttribute('data-tips');
        });
        ratingbox.addEventListener('mouseleave', function(){
           spans.forEach(function(c,i,o){
                if(c.getAttribute('data-score') <= origin_score){
                    c.classList.add('checked');
                }
            });
            document.querySelector('.rate .tips').innerText = camelwaydatalayer.getscoremessage(post_id) || '';
        });
        ratingbox.addEventListener('click', function(e){
            var ev = e || e.event;
            var target = ev.target || ev.srcElement;
            if(target.nodeName !== 'SPAN') return;
            var score = target.getAttribute('data-score');
            ratingbox.classList.add('rating');
            async_request({
                'method': 'POST',
                'url': ajax_url,
                'data': {'action':'rating','id': post_id,'score':score,'meta_id':camelwaydatalayer.getmetaid(post_id)},
                'callback': function(data){
                    var result = JSON.parse(data);
                    if(result.code == 200){
                        origin_score = score;
                        camelwaydatalayer.setscore(post_id, score, result.message, result.meta_id);
                        ratingbox.nextElementSibling.innerText = result.message;
                        ratingbox.classList.remove('rating');
                    }
                }
            });
        });
        //分享功能
        share_init('.share'); 
<?php } 
if(is_single() && in_category(array(1,2,3,4,5,6,7))){ ?>
        //图库放大
        function showImage(index, target){
            var images = Array.from(gallery.querySelectorAll('a')).map(function(item){return item.getAttribute('href');});
            var index = index % images.length;
            var img = images[index];
            if(!supportwebp && img.match(/.webp$/)){
               img = ajax_url+'?action=modifyimg&f='+encodeURI(img)+'&type=jpg';
            }
            //loading style
            target.src =  "<?php dminfo('template_url')?>images/loading.gif";
            target.width = 50;
            target.height = 50;
            //image style
            var imgobj = new Image();
            imgobj.src = img;
            imgobj.onload = function(){
                target.src = img;
                target.width = imgobj.width;
                target.height = imgobj.height;
            };
        }
        var gallery = document.querySelector('.gallery');
        gallery.addEventListener('click', function(e){
            var el = e.target || window.event.srcElement;
            if(el.tagName == 'A'){ el = el.querySelector('img');}
            var container = document.createElement('div');
            var close = document.createElement('div');
            container.className = 'wrap-layer gallery-container';
            close.className = 'close';
            var images = gallery.querySelectorAll('a');
            var index = Array.from(gallery.querySelectorAll('img')).indexOf(el);
            var html = '<div class="gallery-window"><span class="prev"></span><div class="pic"><img src=""></div><span class="next"></span></div>';
            container.innerHTML = html;
            showImage(index, container.querySelector('img'));

            container.addEventListener('click', function(e){
                var ev = e || window.event;
                var el = e.target || window.event.srcElement;
                if(el.classList.contains('close')){
                    document.body.classList.remove('overflowhidden');
                    document.body.removeChild(container);
                }else if(el.classList.contains('next') || ev.screenX > document.body.offsetWidth / 2){
                    index++;
                    showImage(index, container.querySelector('img'));
                }else if(el.classList.contains('prev')|| ev.screenX < document.body.offsetWidth / 2){
                    index--;
                    showImage(index, container.querySelector('img'));
                }
            });
            container.appendChild(close);
            document.body.appendChild(container);
            document.body.classList.add('overflowhidden');
            e.preventDefault();
            return false;
        });
<?php } ?>
        //webp图片不支持图片转换
        if(!supportwebp){
            window.addEventListener('error', function(e){
                var el = e.target || window.event.srcElement;
                if(el.src && el.src.indexOf(window.location.host) > 0){
                    if(el.src.match(/^[^\?]+\/dm-ajax\.php\?action=modifyimg\&f=.*/) && !el.src.match(/type\=jpg/)){
                        el.src =  el.src + '&type=jpg';
                    }
                    else if(el.src.match(/^[^\?]+\.webp/)){
                        el.src = ajax_url+'?action=modifyimg&f='+encodeURIComponent(el.src);
                    }
                }
            }, true);
            var images = document.querySelectorAll('img');
            for(var i in images){
                var imagesrc = images[i].currentSrc || images[i].src;
                if(imagesrc && imagesrc.indexOf(window.location.host) > 0){
                    images[i].setAttribute('srcset', '');
                    if(imagesrc.match(/^[^\?]+\.webp/)){
                        images[i].src  = ajax_url+'?action=modifyimg&f='+encodeURIComponent(imagesrc);
                    }else if(imagesrc.match(/^[^\?]+\.php\?action=/)){
                        images[i].src  = imagesrc + '&type=jpg';
                    }
                }
            }
        }
    }, false);
})();
</script>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="top-navs">
            <div class="time-info"><?php echo date('H:i:s A n/j, Y')?></div>
            <div class="languages">
                <div class="line">
                    <a href="https://www.camelway.uz/">Русский</a>
                </div>
                <span class="language-select" onclick="toggleClass('.language-items', 'sliderdown')">O'zbek</span>
                <ul class="language-items">
                    <li><a href="https://www.camelway.co.za">English</a></li>
                    <li><a href="https://www.camelway.ru">Русский</a></li>
                    <li><a href="https://www.camelway.co">Español</a></li>
                    <li><a href="https://www.camelway.fr">Français</a></li>
                    <li><a href="https://www.camelway.id">Indonesia</a></li>
                    <li><a href="https://www.camelway.com.cn">中文</a></li>
                </ul>
            </div>
            <div class="social-links">
                <a href="https://www.facebook.com/camelway/" target="_blank" rel="nofollow" class="facebook">&#xe91f;</a>
                <a href="https://www.facebook.com/camelway/" target="_blank" rel="nofollow" class="pinterst">&#xe91e;</a>
                <a href="https://www.facebook.com/camelway/" target="_blank" rel="nofollow" class="youtube">&#xe920;</a>
                <a href="https://www.facebook.com/camelway/" target="_blank" rel="nofollow" class="linked">&#xe927;</a>
            </div>
        </div>
        <div class="head">
            <a href="<?php dminfo('home_url')?>" class="go-home"><img src="<?php dminfo('template_url')?>images/camelway-logo.png" alt="ИП CAMELWAY CHINA" width="275" height="50" class="logo"></a>
            <form action="<?php dminfo('home_url')?>" class="search">
                <input type="text" name="s" placeholder="Katalogdan qidirish..." required>
                <input type="submit" value="&#xe915;">
            </form>
            <a href="tel:<?php echo str_replace(array(' ', '(', ')', '-'), '', get_option('site_mobile'))?>" class="call" role="button"><?php echo get_option('site_mobile')?></a>
            <span class="menu-btn" role="button"></span>
        </div>
        <div class="menu">
            <ul class="navs">
                <li><a href="<?php the_category_link(1)?>">Mahsulotlar</a>
                    <ul>
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
                        <li><a href="<?php echo $cat->get_permalink()?>"><?php echo $cat->cat_name?></a>
                            <ul>
<?php 
    $posts = get_posts(array('category__in'=>$cat->cat_ID));
    foreach($posts as $post){
?>
                                <li><a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a></li>
<?php } ?>
                            </ul>
                        </li>
<?php } ?>
                    </ul>
                </li>
                <li><a href="<?php dminfo('home_url')?>">Bosh Sahifa</a></li>
                <li><a href="<?php the_category_link(8)?>">Galereya</a></li>
                <li><a href="<?php the_category_link(9)?>">Blog</a></li>
                <li><a href="<?php the_permalink(1)?>">Biz haqimizda</a></li>
                <li><a href="<?php the_permalink(2)?>">Biz bilan bog`laning</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="wrap divider"></div>
<div class="slidernav">
    <ul>
        <li><a href="<?php dminfo('home_url')?>">Bosh Sahifa</a></li> 
<?php
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
?>
        <li class="products"><a href="<?php echo $cat->get_permalink()?>"><?php echo $cat->cat_name?><span><?php echo count_category_posts($cat->cat_ID)?></span></a>
<?php } ?>
        <li><a href="<?php the_category_link(8)?>">Galereya</a></li>
        <li><a href="<?php the_category_link(9)?>">Blog</a></li>
        <li><a href="<?php the_permalink(1)?>">Biz haqimizda</a></li>
        <li><a href="<?php the_permalink(2)?>">Biz bilan bog`laning</a></li>
    </ul>
</div>
