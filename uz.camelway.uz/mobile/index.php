<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">HURMATLILI HAMKORLAR! BIZ SIZGA HAR QANDAY TURDAGI BETON ZAVODLARI BO'YICHA KERAKLI TAVSIYALARNI BERISHGA TAYYORMIZ, ARIZA QOLDIRING AV BIZNING MUTAHASISILARIMIZ QISQA MUDDATDA SIZ BILAN BOG’LANADILAR.</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Biz turli-tuman beton qorishtirgichlarni, shu jumladan ikki o'qLI beton qorishtirgichlarni, gravitatsiyaviy beton qorishtirgichlarni, majburiy beton aralashtirgichlarni va nasosli beton aralashtirgichlarni sotamiz.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway armaturani qayta ishlash uchun keng turdagi uskunalarni, shu jumladan, bukishga mo'jallangan dastgohlar, armaturani kesish dastgohlari, armaturaga shakil berish uchun dastgohlar, armaturani ulash uskunalari va oldingi bo'rttiruvchi dastgohlar va boshqalarni taklif etadi.</p>
        </a>
        <a href="<?php the_category_link(6);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Yo'l mashinalari tarkibiga yo'l g'ildiragi, yo'l o’lchash mashinasi, yo'l yotqizish moslamasi va yoriq hosil qilish uchun mashinasi va boshqalar kiradi. Asosan yo'llar, shahar yo'llari va aeroport yo'l qoplamalarini qurish uchun ishlatiladi.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Uskunalar katalogi</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(8,9)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink(1);?>"><amp-img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>" width="525" height="308" layout="responsive"></amp-img></a>
            </div>
            <div class="description">
                <h2><a href="<?php echo $c->get_permalink(1)?>"><?php echo $c->cat_name;?></a></h2>
                <p><a href="<?php echo $c->get_permalink(1);?>"><?php echo dm_trim_words($c->cat_description, 450);?></a></p>
            </div>
        </li>
<?php }
?>
    </ul>
</div>
<?php get_template_part('form');?>
<?php get_footer();?>
