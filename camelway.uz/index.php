<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>ИП ООО «CAMELWAY CHINA»</em>
        <p>ИП ООО «CAMELWAY CHINA» продает бетонные заводы, бетономешалки, оборудование для производства бетонных шлакоблоков и различные строительные машины в Узбекистане и прилегающих районах. Наша компания находится в Ташкенте.</p>
    </div>

    <div class="banner">
        <ul class="images">
            <li><a href="<?php the_category_link(1);?>"><img src="<?php dminfo('template_url')?>/images/banner1.jpg" alt="<?php the_category_name(1);?>"></a></li>
            <li><a href="<?php the_category_link(2);?>"><img src="<?php dminfo('template_url')?>/images/banner2.jpg" alt="<?php the_category_name(2);?>"></a></li>
            <li><a href="<?php the_category_link(5);?>"><img src="<?php dminfo('template_url')?>/images/banner3.jpg" alt="<?php the_category_name(5);?>"></a></li>
            <li><a href="<?php the_category_link(6);?>"><img src="<?php dminfo('template_url')?>/images/banner4.jpg" alt="<?php the_category_name(6);?>"></a></li>
        </ul>
        </ul>
        <ul class="text">
            <li>УВАЖАЕМЫЕ ПАРТНЁРЫ! МЫ ГОТОВЫ ПРОКОНСУЛЬТИРОВАТЬ ВАС ПО ЛЮБОМУ ТИПУ КОМПЛЕКТУЮЩИХ ДЛЯ БЕТОННЫХ ЗАВОДОВ, ОСТАВЛЯЙТЕ ЗАЯВКУ И НАШИ СПЕЦИАЛИСТЫ ПЕРЕЗВОНЯТ ВАМ В КРАТЧАЙШИЕ СРОКИ!</li>
            <li>Мы продаем различные бетономешалки, в том числе двухвальные бетоносмесители, гравитационные бетоносмесители, бетоносмесители с принудительной укладкой, бетоносмесители и бетоносмесители с насосами.</li>
            <li>Camelway предлагает широкий спектр оборудования для обработки арматуры, включая станки  для гибки арматуры, станки для резки арматуры,станки  для формовки арматуры,станки для соединения арматуры и станки для поднапряжения арматуры и т. д.</li>
            <li>Дорожные машины включит дорожный каток, дорожную разметочную машину , бетоноукладчик, и машину для нарезания щелей и т д . Главным образом использован для того чтобы построить дороги, дороги города и поверхность дороги аэропорта и так далее</li>
        </ul>
    </div>
</div>

<div class="container index-product-showroom">
    <h1>Горячие продукты</h1>
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
                <p><?php echo dm_trim_words($c->cat_description, 300);?></p>
                <a href="<?php echo $c->get_permalink()?>" class="more">Узнавай больше</a>
                <a href="<?php echo $c->get_permalink()?>#feedback" class="inquiry">Запрос цены</a>
            </div>
        </li>
<?php } 
?>
    </ul>

</div>

<div class="container full-feedback">
<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Мы находимся в Ташкенте, Мы производители</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 06:00 до 20:00 (время Ташкентское).</p>
        <p><input type="text" name="user_name" placeholder="Твое имя" required></p>
        <p><input type="text" name="user_mobile" placeholder="Ваш номер телефона"></p>
        <p><input type="text" name="content" placeholder="Введите детали вашего запроса" required></p>
        <p><input type="submit" value="Запросить предложение"></p>
        <input type="hidden" name="lang" value="ru">
    </form>
    <p>ООО «CAMELWAY »  находится в Ташкенте и специализируется на предоставлении высококачественных строительных машин и оборудования для пользователей в Узбекистане, добро пожаловать на консультацию!</p>
</div>
    <?php get_template_part('map');?> 
    <div class="clearfix"></div>
</div> 

<div class="index-footer">
    <div class="container">
        <div class="foot-logo">
            <img src="<?php dminfo('template_url')?>/images/foot-logo.png" alt="camelway">
        </div>
        <div class="copyright">
            <p><a href="https://uz.camelway.uz" hreflang="uz">O'zbek tilidagi versiyasi</a> &copy; <?php echo date('Y')?> ИП ООО «CAMELWAY CHINA» <a href="https://www.camelway.co.za/concrete-batching-plant/">Concrete Batching Plant</a> | <a href="https://www.camelway.sn/centrale-a-beton/">Centrale à béton</a> | <a href="https://www.camelway.pe/planta-de-hormigon/">Planta de hormigón</a> | <a href="https://www.camelway.ph/concrete-batching-plant/">Batching Plant Philippines</a> | <a href="https://www.camelway.ru/">Camelway Россия</a></p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>jquery-3.4.1.min.js"></script>
<script>
//banner play
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
//core function
(function(){
    if(!supportwebp){
        var images = document.querySelectorAll('img');
        for(var i in images){
            var originsrc = images[i].src;
            if(originsrc && originsrc.substr(-5) == '.webp' && ( originsrc.substr(0, 24) == 'https://www.camelway.uz/' || originsrc.substr(0,1) == '/')){
                images[i].src = '<?php dminfo('ajax_url')?>?action=webp2jpg&f='+encodeURIComponent(originsrc);
            }
        }
    }

    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(', ');
    var singlemobile = document.querySelector('.contact .telegram');
    if(singlemobile)
    document.querySelector('.top-contact .mobile').innerHTML = singlemobile.innerHTML;
    var singleemail = document.querySelector('.contact .email');
    if(singleemail)
    document.querySelector('.top-contact .email').innerHTML = singleemail.innerHTML; 
})();
</script>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
<noscript><div><img src="https://mc.yandex.ru/watch/56097448" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=473483456591431&ev=PageView&noscript=1"/></noscript>
</body>
</html>
