<div class="company">
    <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
    <em>ИП ООО «CAMELWAY CHINA»</em>
    <p>ИП ООО «CAMELWAY CHINA» продает бетонные заводы, бетономешалки, оборудование для производства бетонных шлакоблоков и различные строительные машины в Узбекистане и прилегающих районах. Наша компания находится в Ташкенте. Пожалуйста, свяжитесь с нами для получения информации о бетонном заводе и коммерческое предложение.</p>
</div>
<div class="sideproduct">
    <h4>КАТАЛОГ ОБОРУДОВАНИЯ</h4>
    <ul class="pitem">
<?php
$ps = get_categories(array('exclude'=>array(8,9)));
foreach($ps as $p){
?>
        <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->cat_name;?></a>
            <ul>
<?php
    $products = new DM_Query('cat='.$p->cat_ID);
    while($products->have_posts()){
        $products->the_post();
?>
                <li><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></li>
<?php } dm_reset_postdata();?>
            </ul>
        </li>
<?php } ?>
    </ul>
</div>
<div class="gallery">
    <h2>галерея</h2>
    <ul class="images">
<?php
$img = new DM_Query('cat=8&posts_per_page=2&no_found_rows&has_thumbail=1&orderby=rand');
while($img->have_posts()){
    $img->the_post();
    $imgs = get_post_images('gallery');
?>
    <li><a href="<?php the_permalink()?>"><img src="<?php echo $imgs[1]->url;?>" alt="<?php the_title();?>"></a></li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>
<div class="posts">
    <h2>Сообщений</h2>
    <ul class="post">
<?php
$img = new DM_Query('cat=9&posts_per_page=5&no_found_rows=1');
while($img->have_posts()){
    $img->the_post();
?>
    <li><a href="<?php the_permalink()?>"><?php the_title();?></a></li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>
