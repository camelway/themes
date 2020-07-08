<?php get_header(); ?>
<div class="wrap primary-banner">
    <amp-carousel width="1920" height="600" layout="responsive" type="slides" autoplay delay="5000" loop>
        <a href="<?php the_mobile_permalink(52)?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner-1.jpg" width="1920" height="600" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway offer Complete Solution and Equipments for Ready Mix Concrete Company.</p>
        </a>
        <a href="<?php the_mobile_category_link(6)?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner-3.jpg" width="1920" height="600" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Offer a full range of solutions and equipment for mining, quarrying and construction waste recycling.</p>
        </a>
        <a href="<?php the_mobile_permalink(4)?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner-4.jpg" width="1920" height="600" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Temporary Concrete Batching Plant: Concrete Mixing Plant designed specifically for temporary works.</p>
        </a>
        <a href="<?php the_mobile_category_link(16)?>">
            <amp-img src="<?php dminfo('template_url')?>images/banner-2.jpg" width="1920" height="600" layout="responsive"></amp-img>
            <p class="amp-carousle-subtitle">Camelway Machinery R&D, production and export center of concrete and gravel aggregate equipment.</p>
        </a>
    </amp-carousel>
</div>
<div class="container home-section">
    <h1>Henan Camelway Machinery Manufacture Co., Ltd.</h1>
    <p>Henan Camelway Machinery Manufacture Co., Ltd., formerly known as "XINGYANG County Zhongyuan Construction Machinery Factory", was established in 1983. Over 30 years' development, Camelway has grown into a well-known solutions providers of concrete production and aggregate production. Camelway HZS series batching plants and WBZ series continuous mixing plants not only participated in witnessing China development of infrastructure construction, but exported to overseas. At the same time, our equipment is trusted by many foreign construction contractors. With excellent product quality and after-sales service, Camelway's products and services quickly cover more than 100 countries and regions around the world. We look forward to working with you in your next project.</p>
</div>

<div class="container home-section">
    <a href="<?php the_mobile_category_link(1);?>"><h2>Batching Plant<span class="icon-more">&#xe9df;</span></h2></a>
        <p>Camelway offer a wide range of Batching Plants and Mixing Plants along with mixers, Cement silos, etc.</p>
        <a href="<?php the_mobile_category_link(1);?>"><amp-img layout="responsive" width="500" height="330" src="<?php dminfo('template_url')?>images/batch-plant.jpg"></amp-img></a>
            <ul class="scroller">
<?php
$posts = get_posts('category__in=1,2,3,4,5&numberposts=30&orderby=rand');
foreach($posts as $post){
?>
                    <li>
                        <a href="<?php echo $post->get_permalink(true);?>"><amp-img layout="responsive" width="600" height="400" src="<?php echo $post->post_thumbnail;?>" alt="<?php echo $post->post_subtitle;?>"></amp-img></a>
                        <h3><a href="<?php echo $post->get_permalink(true);?>"><?php echo $post->post_subtitle;?></a></h3>
                    </li>
<?php } ?>
            </ul>
</div>

<div class="container home-section">
    <a href="<?php the_mobile_category_link(6);?>"><h2>Crushing Plant<span class="icon-more">&#xe9df;</span></h2></a>
        <p>Camelway Crushing and Screening Technology serves all industries involved in reduction of rock and minerals.</p>
        <a href="<?php the_mobile_category_link(6);?>"><amp-img layout="responsive" width="500" height="330" src="<?php dminfo('template_url')?>images/crush-screen-plant.jpg"></amp-img></a>
        <ul class="scroller">
<?php
$posts = get_posts('category__in=6,7,8,9&numberposts=30&orderby=rand');
foreach($posts as $post){
?>
                    <li>
                        <a href="<?php echo $post->get_permalink(true);?>"><amp-img layout="responsive" width="600" height="400" src="<?php echo $post->post_thumbnail;?>" alt="<?php echo $post->post_subtitle;?>"></amp-img></a>
                        <h3><a href="<?php echo $post->get_permalink(true);?>"><?php echo $post->post_subtitle;?></a></h3>
                    </li>
<?php } ?>
            </ul>
</div>

<div class="container home-section">
    <a href="<?php the_mobile_category_link(11);?>"><h2>Global Case<span class="icon-more">&#xe9df;</span></h2></a>
    <ul class="cols-1">
<?php
$posts = get_posts(array('category'=>11, 'numberposts'=>3, 'has_thumbnail'=>1 ,'orderby'=>'rand'));
foreach($posts as $post){
?>
                <li>
                    <div class="left"><a href="<?php echo $post->get_permalink(true);?>"><amp-img layout="responsive" width="640" height="400" src="<?php echo $post->post_thumbnail;?>" alt="<?php echo $post->post_subtitle;?>"></amp-img></a></div>
                    <h4 class="right"><a href="<?php echo $post->get_permalink(true);?>"><?php echo $post->post_title;?></a></h4>
                </li>
<?php } ?>
    </ul>
</div>

<div class="container home-section">
    <a href="<?php the_mobile_category_link(12);?>"><h2>Latest Posts<span class="icon-more">&#xe9df;</span></h2></a>
    <ul class="cols-1">
<?php
    while(have_posts()){
        the_post();
?>
    <li>
        <a href="<?php the_mobile_permalink();?>"><h3><?php the_title();?></h3></a>
        <a href="<?php the_mobile_permalink();?>"><p><?php echo dm_trim_words(get_the_excerpt(), 180);?></p></a>
    </li>
<?php } ?>
    </ul>
</div>

<?php
get_footer();
