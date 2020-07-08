<?php get_header();?>
<div class="wrap primary-banner">
    <amp-carousel width="754" height="273" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_category_link(1);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner1.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">УВАЖАЕМЫЕ ПАРТНЁРЫ! МЫ ГОТОВЫ ПРОКОНСУЛЬТИРОВАТЬ ВАС ПО ЛЮБОМУ ТИПУ КОМПЛЕКТУЮЩИХ ДЛЯ БЕТОННЫХ ЗАВОДОВ, ОСТАВЛЯЙТЕ ЗАЯВКУ И НАШИ СПЕЦИАЛИСТЫ ПЕРЕЗВОНЯТ ВАМ В КРАТЧАЙШИЕ СРОКИ!</p>
        </a>
        <a href="<?php the_category_link(2);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner2.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Мы продаем различные бетономешалки, в том числе двухвальные бетоносмесители, гравитационные бетоносмесители, бетоносмесители с принудительной укладкой, бетоносмесители и бетоносмесители с насосами.</p>
        </a>
        <a href="<?php the_category_link(5);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner3.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway предлагает широкий спектр оборудования для обработки арматуры, включая станки для гибки арматуры, станки для резки арматуры,станки для формовки арматуры,станки для соединения арматуры и станки для поднапряжения арматуры и т. д.</p>
        </a>
        <a href="<?php the_category_link(6);?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner4.jpg" width="754" height="273" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Дорожные машины включит дорожный каток, дорожную разметочную машину , бетоноукладчик, и машину для нарезания щелей и т д . Главным образом использован для того чтобы построить дороги, дороги города и поверхность дороги аэропорта и так далее.</p>
        </a>
    </amp-carousel>
</div>
<div class="wrap plist">
    <h1>Каталог оборудования</h1>
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
