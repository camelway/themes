<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>Camelway Africa</em>
        <p>Henan Camelway Machinery Manufacture Co., Ltd is a company based in China, Committed to Manufacturing and Supplying better construction machinery for customers Worldwide. Now, We have started doing business on the African continent...</p>
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
            <li>Camelway Machinery Design and Manufacture Concrete Batching Plant with all components, like concrete mixer, aggregate batchers, cement silos, screw conveyor, etc.</li>
            <li>Camelway Machinery offers all types of concrete mixers for construction industry. High quality, competitive price, help your business success.</li>
            <li>Rebar equipment, Rebar cutting machine, Rebar bending machine, Rebar straightening adn cutting machine, Improve construction efficiency!</li>
            <li>Stone Crushing Plant and Crusher, high capacity, low cost, make more profit for quarry owners.</li>
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
             <a href="<?php echo $c->get_permalink();?>"><img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308"></a>
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
            <p>&copy; <?php echo date('Y')?> Camelway Machinery <a href="https://www.camelway.sn/centrale-a-beton/">Centrale à béton</a> | <a href="https://www.camelway.pe/planta-de-hormigon/">Planta de hormigón</a> | <a href="https://www.camelway.uz/byetohhiye-zavodi/">бетонный завод</a> | <a href="https://www.camelway.ph/concrete-batching-plant/">Batching Plant Philippines</a></p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>jquery-3.4.1.min.js"></script>
<script>
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
    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(',');
    var whatsapps = ['8615617584955','8617839193601'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid+"?text="+escape('Please send me detail info and quote of this machine');
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="<?php dminfo('template_url')?>images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp Us</span>';
    wabox.addEventListener('click', function(){
        window.open(walink); 
        gtag('event', 'conversion', {'send_to': 'AW-918898170/BVb5CJaW0c0BEPqLlbYD'});
        gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-9', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>