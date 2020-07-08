<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
        <em>ИП ООО «CAMELWAY CHINA»</em>
        <p>"CAMELWAY CHINA" chetel korxonasi MChJ O'zbekistonda va uning atrofidagi hududlarda beton zavodlari, beton qorishtirgichlar, beton bloklari ishlab chiqarish uskunalari va turli xil qurilish mashinalarini sotadi. Bizning kompaniyamiz Toshkentda joylashgan.</p>
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
            <li>HURMATLILI HAMKORLAR! BIZ SIZGA HAR QANDAY TURDAGI BETON ZAVODLARI BO'YICHA KERAKLI TAVSIYALARNI BERISHGA TAYYORMIZ, ARIZA QOLDIRING AV BIZNING MUTAHASISILARIMIZ QISQA MUDDATDA SIZ BILAN BOG’LANADILAR.</li>
            <li>Biz turli-tuman beton qorishtirgichlarni, shu jumladan ikki o'qLI beton qorishtirgichlarni, gravitatsiyaviy beton qorishtirgichlarni, majburiy beton aralashtirgichlarni va nasosli beton aralashtirgichlarni sotamiz.</li>
            <li>Camelway armaturani qayta ishlash uchun keng turdagi uskunalarni, shu jumladan, bukishga mo'jallangan dastgohlar, armaturani kesish dastgohlari, armaturaga shakil berish uchun dastgohlar, armaturani ulash uskunalari va oldingi bo'rttiruvchi dastgohlar va boshqalarni taklif etadi.</li>
            <li>Yo'l mashinalari tarkibiga yo'l g'ildiragi, yo'l o’lchash mashinasi, yo'l yotqizish moslamasi va yoriq hosil qilish uchun mashinasi va boshqalar kiradi. Asosan yo'llar, shahar yo'llari va aeroport yo'l qoplamalarini qurish uchun ishlatiladi.</li>
        </ul>
    </div>
</div>

<div class="container index-product-showroom">
    <h1>Uskunalar katalogi</h1>
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
                <a href="<?php echo $c->get_permalink()?>" class="more">Ko'proq</a>
                <a href="<?php echo $c->get_permalink()?>#feedback" class="inquiry">Iqtibos oling</a>
            </div>
        </li>
<?php } 
?>
    </ul>

</div>

<div class="container full-feedback">
<div class="feedback" id="feedback">
     <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Bepul baholash</p>
        <p class="slogan">Biz Toshkentda joylashganmiz, biz ishlab chiqaruvchilarmiz.</p>
        <p class="description">Camelway fabrikasi savdo bo'limining mutaxassislari sizning barcha savollaringizga dushanbadan yakshanbagacha soat 06:00 dan 20:00 gacha (Toshkent vaqti bilan) javob berishadi.</p>
        <p><input type="text" name="user_name" placeholder="Ism (talab qilinadi):" required></p>
        <p><input type="text" name="user_mobile" placeholder="Telefon: (talab qilinadi)" required></p>
        <p><input type="text" name="user_email" placeholder="Elektron pochta:"></p>
        <p><input type="text" name="content" placeholder="Sizning so'rovingiz tafsilotlarini kiriting (talab qilinadi)" required></p>
        <p><input type="submit" value="Taklifni so'rang"></p>
    </form>
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
            <p>&copy; <?php echo date('Y')?> ИП ООО «CAMELWAY CHINA» <a href="https://www.camelway.uz/" hreflang="ru">Русская версия</a></p>
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
