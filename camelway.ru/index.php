<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>Camelway Россия</em>
        <p>ИП ООО «CAMELWAY» продает бетонные заводы, бетономешалки, оборудование для производства бетонных шлакоблоков и различные строительные машины в Россия и страны СНГ. Пожалуйста, свяжитесь с нами для получения информации о бетонном заводе и коммерческое предложение .</p>
    </div>

    <div class="banner">
        <ul class="images">
            <li><a href="<?php the_category_link(1);?>"><img src="<?php dminfo('template_url')?>images/banner1.jpg" alt="<?php the_category_name(1);?>"></a></li>
            <li><a href="<?php the_category_link(5);?>"><img src="<?php dminfo('template_url')?>images/banner2.jpg" alt="<?php the_category_name(5);?>"></a></li>
            <li><a href="<?php the_category_link(7);?>"><img src="<?php dminfo('template_url')?>images/banner3.jpg" alt="<?php the_category_name(7);?>"></a></li>
            <li><a href="<?php the_category_link(3);?>"><img src="<?php dminfo('template_url')?>images/banner4.jpg" alt="<?php the_category_name(3);?>"></a></li>
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
    <h1>Каталог оборудования</h1>
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
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Получить цитату непосредственно от производителя.</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 08:00 до 20:00.</p>
        <p><input type="text" name="user_name" placeholder="Имя (обязательно):" required></p>
        <p><input type="text" name="user_mobile" placeholder="Телефон: (обязательно)" required></p>
        <p><input type="text" name="user_email" placeholder="Электронное письмо:"></p>
        <p><input type="text" name="content" placeholder="Введите детали вашего запроса (обязательно)" required></p>
        <p><input type="submit" value="Запросить предложение"></p>
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
            <p>&copy; <?php echo date('Y')?> Camelway Machinery <a href="https://www.camelway.uz/">Camelway Узбекистан</a> · <a href="https://www.camelway.co/planta-de-hormigon/">Planta de Hormigón</a> · <a href="https://www.camelway.co/planta-de-asfalto/">Planta de Asfalto</a> · <a href="https://www.camelway.co/planta-de-trituracion/">Planta de Trituración</a> · <a href="https://www.camelway.fr/centrale-a-beton/">Centrale à Béton</a> · <a href="https://www.camelway.fr/centrale-d-enrobage/">Centrale d'enrobage</a> · <a href="https://www.camelway.fr/station-de-concassage/">Station de Concassage</a></p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>chatonline.js"></script>
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
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>
