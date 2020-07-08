<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>Camelway Philippines</em>
        <p>Henan Camelway Machinery Manufacture Co., Ltd is a top concrete batching plant manufacturer with a history of 37 years. It has set up offices in the Philippines, Uzbekistan and other countries. We have rich production experience and irresistible product prices.</p>
    </div>

    <div class="banner">
        <ul class="images">
            <li><a href="<?php the_category_link(1);?>"><img src="<?php dminfo('template_url')?>images/banner1.jpg" alt="<?php the_category_name(1);?>"></a></li>
            <li><a href="<?php the_category_link(2);?>"><img src="<?php dminfo('template_url')?>images/banner2.jpg" alt="<?php the_category_name(5);?>"></a></li>
            <li><a href="<?php the_category_link(5);?>"><img src="<?php dminfo('template_url')?>images/banner3.jpg" alt="<?php the_category_name(6);?>"></a></li>
            <li><a href="<?php the_category_link(6);?>"><img src="<?php dminfo('template_url')?>images/banner4.jpg" alt="<?php the_category_name(6);?>"></a></li>
        </ul>
        </ul>
        <ul class="text">
            <li>Camelway Machinery produces various types of concrete batching plants, such as: Small concrete batching plant, HZS concrete batching plant, Mobile Concrete Batching Plant,Experienced and cheap price,Because we are cocnrete batching plant manufacturer.</li>
            <li>Camelway Machinery provides all types of concrete mixers used in the construction industry, such as JS concrete mixer, JZC Concrete Mixer, Drum Concrete mixer, high-quality,  perfect after-sales service.</li>
            <li>Rebar equipment, Rebar cutting machine, Rebar bending machine, Rebar straightening and cutting machine, Improve construction efficiency!</li>
            <li>The high production capacity and Cheap cost of stone crushers and crushers bring sustainable profits to quarry owners.</li>
        </ul>
    </div>
</div>

<div class="container index-product-showroom">
    <h1>Equipment Catalog</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink();?>"><img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>"></a>
            </div>
            <div class="description">
                <h2><a href="<?php echo $c->get_permalink()?>"><?php echo $c->cat_name;?></a></h2>
                <p><?php echo dm_trim_words($c->cat_description, 450);?></p>
                <a href="<?php echo $c->get_permalink()?>" class="more">Learn More</a>
                <a href="<?php echo $c->get_permalink()?>#feedback" class="inquiry">Get Quote</a>
            </div>
        </li>
<?php }
?>
    </ul>

</div>

<div class="container full-feedback">
<div class="feedback" id="feedback">
     <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Request a Fast &amp; Free Quote</p>
        <p class="slogan">Get a Quote Directly from the Manufacturer.</p>
        <p class="description">Specialists of the sales department of Camelway Machinery will answer all your questions from Monday to Sunday from 08:00 to 20:00.</p>
        <p><input type="text" name="user_name" placeholder="Your Name:" required></p>
        <p><input type="text" name="user_mobile" placeholder="Phone Number:" required></p>
        <p><input type="text" name="user_email" placeholder="Email:"></p>
        <p><input type="text" name="content" placeholder="Your Detail Request, Product, capacity, place of delivery, etc." required></p>
        <p><input type="submit" value="Submit"></p>
    </form>
</div>
    <?php //get_template_part('map');?>
    <div class="clearfix"></div>
</div>

<div class="index-footer">
    <div class="container">
        <div class="foot-logo">
            <img src="<?php dminfo('template_url')?>/images/foot-logo.png" alt="camelway">
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y')?> Camelway Machinery | <a href="https://www.camelway.sn/centrale-a-beton/">Centrale à béton</a> | <a href="https://www.camelway.pe/planta-de-hormigon/">Planta de hormigón</a> | <a href="https://www.camelway.uz/byetohhiye-zavodi/">бетонный завод</a> | <a href="https://www.camelway.co.za/concrete-batching-plant/">Batching Plant Africa</a> | <a href="https://www.camelway.lk/">Concrete plant</a> | </p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>jquery-3.4.1.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-9"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-75819314-9');
    gtag('config', 'AW-701339815');

   !function(f,b,e,v,n,t,s){
        if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)
    }(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '418256865395733');
    fbq('track', 'PageView');

    $(function(){
        var banner_imgs = $('.banner .images li');
        var banner_txts = $('.banner .text li');
        var index = 0;
        function play(index){
            banner_imgs.eq(index).siblings().fadeOut(300, function(){
                 banner_imgs.eq(index).fadeIn(10);
            });
            banner_txts.eq(index).siblings().fadeOut(200, function(){
                banner_txts.eq(index).fadeIn(20);
            });
            setTimeout(function(){
                index++;
                if(index==banner_imgs.length)
                    index = 0;
                play(index);
            }, 5000);
        }
        play(index);
    });
    if (!String.prototype.trim) {
      String.prototype.trim = function () {
        return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
      };
    }
    function getCookie(name){
            if(document.cookie.length == 0 )
                return false;
            var start = document.cookie.indexOf(name+"=");
            if(start == -1)
                return false;
            var last = document.cookie.substr(start + name.length +1 );
            var end = last.indexOf(';');
            return unescape(last.substr(0, end));
        }
    function setCookie(name, value, expires){
        var cdate = new Date();
        cdate.setTime(cdate.getTime() + expires*1000);
        if(window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)){
            var domain = window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)[0];
        }else{
            var domain = window.location.hostname;
        }
        document.cookie = name+"="+escape(value)+";expires="+cdate.toUTCString()+";domain="+domain+";path=/";
    }
   if(getCookie('camelwayinitpage') == false){
        setCookie('camelwayinitpage', window.location.href, 604800);
    }
    function get_landing_page(){
       return getCookie('camelwayinitpage') || window.location.href;
    }
    function ajax_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var content = obj.content.innnerText || obj.content.value;
        if(content !=''){
            content += "\n\n Landing Page: "+get_landing_page();
        }
        var ajaxurl = obj.action+"?format=json";
        var data = "user_name="+encodeURIComponent(user_name)+"&user_mobile="+encodeURIComponent(user_mobile)+"&user_email="+encodeURIComponent(user_email)+"&content="+encodeURIComponent(content);
        var xhr = new XMLHttpRequest();
        xhr.open("POST",ajaxurl,true);
        xhr.send(data);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var data = JSON.parse(xhr.responseText);
                if(data.error_code == 200){
                    // google conversion
                    gtag('event', 'conversion', {'send_to': 'AW-663867645/ER-nCJPG9cUBEP2hx7wC'});
                    //facebook conversion
                    fbq('track', 'Lead');
                }
               alert(data.error_message);
            }
        }
        return false;
    }
    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(',');
    var whatsapps = ['8615617971467'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid+"?text="+escape('Please send me detail info and quote of this machine');
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="<?php dminfo('template_url')?>images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp US</span>';
    wabox.addEventListener('click', function(){
        window.open(walink);
        gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-9', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>
