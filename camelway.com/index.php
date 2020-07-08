<?php get_header(); ?>
<div class="wrap primary-banner">
    <div style="background-image:url(<?php dminfo('template_url')?>images/banner-1.jpg);">
        <div class="container">
            <div class="slider-text">
                <h2>Ready Mix Concrete Plant</h2>
                <p>Camelway offer Complete Solution and Equipments for Ready Mix Concrete Company.</p>
                <a href="https://www.camelway.com/application/ready-mixed-concrete-batching-plant.html">Learn More</a>
            </div>
        </div>
    </div>

    <div style="background-image:url(<?php dminfo('template_url')?>images/banner-3.jpg);">
        <div class="container">
            <div class="slider-text">
                <h2>Stone Crushing Plant</h2>
                <p>Camelway Offer a full range of solutions and equipment for mining, quarrying and construction waste recycling</p>
                <a href="https://www.camelway.com/crush-plant/">Learn More</a>
            </div>
        </div>
    </div>

    <div style="background-image:url(<?php dminfo('template_url')?>images/banner-4.jpg);">
        <div class="container">
            <div class="slider-text">
                <h2>Temporary Concrete Batching Plant</h2>
                <p>Concrete Mixing Plant designed specifically for temporary works.</p>
                <a href="https://www.camelway.com/batch-plant/temporary-concrete-batching-plant.html">Learn More</a>
            </div>
        </div>
    </div>

    <div style="background-image:url(<?php dminfo('template_url')?>images/banner-2.jpg);">
        <div class="container">
            <div class="slider-text">
                <h2>Camelway Machinery</h2>
                <p>R&D, production and export center of concrete and gravel aggregate equipment</p>
                <a href="https://www.camelway.com/about/">Learn More</a>
            </div>
        </div>
    </div>

</div>
<div class="container home-section">
    <h1>Henan Camelway Machinery Manufacture Co., Ltd.</h1>
    <div class="company-media">
        <video src="//data.camelway.net/static/video/en-camelway.mp4" poster="<?php dminfo('template_url')?>images/company.jpg" controls="controls">Your browser does not support video playback</video>
    </div>
    <div class="company-description">
        <p>Henan Camelway Machinery Manufacture Co., Ltd., formerly known as "XINGYANG County Zhongyuan Construction Machinery Factory", was established in 1983. Over 30 years' development, Camelway has grown into a well-known solutions providers of concrete production and aggregate production. Camelway HZS series batching plants and WBZ series continuous mixing plants not only participated in witnessing China development of infrastructure construction, but exported to overseas. At the same time, our equipment is trusted by many foreign construction contractors. With excellent product quality and after-sales service, Camelway's products and services quickly cover more than 100 countries and regions around the world. We look forward to working with you in your next project.</p>
        <a href="/about/" class="more">Learn More</a>
        <form action="/index.php" method="get">
            <input class="regular-text" type="text" name="s" autocomplete=off placeholder="Search">
            <input class="icon button index-search-btn" type="submit" value="&#xe90e;">
        </form>
        <p class="business"><strong>Main business:</strong> <a href="https://www.camelway.com/batch-plant/">Concrete Batching Plant</a> <a href="https://www.camelway.com/batch-plant/continuous-mixing-plant.html">Continuous Mixing Plant</a> <a href="https://www.camelway.com/crush-plant/">Stone Crushing Plant</a> <a href="https://www.camelway.com/crush-plant/mobile-crushing-plant.html">Mobile Crushing Plant</a> <a href="https://www.camelway.com/crush-plant/manufactured-sand-plant.html">Manufactured Sand Plant</a>
    </div>
    <div class="clearfix"></div>
</div>

<div class="wrap bg-tile">
    <div class="container home-section product">
        <h1>Camelway Products</h1>
        <div class="batch-plant">
            <a href="<?php the_category_link(1)?>"><h2>Batching Plant</h2></a>
<p>Camelway offer a wide range of Batching Plants and Mixing Plants along with mixers, Cement silos, etc. <a href="<?php the_category_link(1)?>" class="more">View More</a></p>
            <a href="<?php the_category_link(1)?>" class="p-thumbnail"><img src="<?php dminfo('template_url')?>images/batch-plant.jpg" alt="Batching Plant"></a>
            <ul class="app-item">
<?php
$i=0;
$posts = get_posts(array('include'=>array('52','53','54','56'), 'order'=>'DESC'));
foreach($posts as $post){
?>
                <li <?php if($i==0){ ?>class="focus"<?php } ?>>
                    <a href="<?php echo $post->get_permalink();?>"><strong><?php echo $post->post_subtitle;?></strong></a>
                    <em><?php echo $post->post_tips;?></em>
                </li>
<?php $i++; } ?>
            </ul>
            <ul class="p-item">
<?php
$posts = get_posts('category__in=1,2,3,4,5&numberposts=3&orderby=rand');
foreach($posts as $post){
?>
                <li>
                    <a href="<?php echo $post->get_permalink();?>"><img src="<?php echo $post->post_thumbnail;?>" alt="<?php echo $post->post_subtitle;?>"></a>
                    <h3><a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a></h3>
                </li>
<?php } ?>
            </ul>
        </div>

        <div class="crush-plant">
            <h2>Crushing Plant</h2>
            <p>Camelway Crushing and Screening Technology serves all industries involved in reduction of rock and minerals. <a href="<?php the_category_link(6)?>" class="more">View More</a></p>
            <a href="<?php the_category_link(6)?>" class="p-thumbnail"><img src="<?php dminfo('template_url')?>images/crush-screen-plant.jpg" alt="Crushing Plant"></a>
            <ul class="app-item">
<?php
$i=0;
$posts = get_posts(array('include'=>array('58','59','60','61'), 'order'=>'DESC'));
foreach($posts as $post){
?>
                <li <?php if($i==0){ ?>class="focus"<?php } ?>>
                    <a href="<?php echo $post->get_permalink();?>"><strong><?php echo $post->post_subtitle;?></strong></a>
                    <em><?php echo $post->post_tips;?></em>
                </li>
<?php $i++; } ?>
            </ul>
            <ul class="p-item">
<?php
$posts = get_posts('category__in=6,7,8,9&numberposts=3&orderby=rand');
foreach($posts as $post){
?>
                <li>
                    <a href="<?php echo $post->get_permalink();?>"><img src="<?php echo $post->post_thumbnail;?>" alt="<?php echo $post->post_subtitle;?>"></a>
                    <h3><a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a></h3>
                </li>
<?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="container home-section case">
    <h1>Camelway Cases</h1>
    <?php the_vertical_items(11,4);?>
</div>

<div class="container home-section topic-news">
    <div class="topic">
        <h1 class="align-left">Special Report</h1>
        <ul class="item-list-vertical">
<?php
$posts = get_posts(array('numberposts'=>2, 'has_thumbnail'=>1));
 foreach($posts as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $excerpt = dm_trim_words($post->post_excerpt, 100);
        $thumbnail = $post->post_thumbnail;
?>
            <li>
            <a href="<?php echo $permalink ?>"><img src="<?php echo $thumbnail ?>" alt="<?php echo $subtitle ?>"></a>
                <div class="item-content">
                    <h3><a href="<?php echo $permalink ?>"><?php echo $subtitle ?></a></h3>
                    <p><?php echo $excerpt ?></p>
                    <a href="<?php echo $permalink; ?>" class="more">View Detail</a>
                </div>
            </li>
<?php
 }
?>
        </ul>
    </div>

    <div class="news">
        <h1 class="align-left">News</h1>
        <ul>
<?php
$headlines = get_posts('category=12&numberposts=1&has_thumbnail=1');
foreach($headlines as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $excerpt = dm_trim_words($post->post_excerpt, 120);
        $thumbnail = $post->post_thumbnail;
        $id = $post->ID;
?>
            <li class="headline">
                <div class="news_excerpt">
                    <a href="<?php echo $permalink;?>"><h3><?php echo $subtitle;?></h3></a>
                    <p><?php echo $excerpt;?></p>
                    <a href="<?php echo $permalink;?>" class="more">View Detail</a>
                </div>
                <a href="<?php echo $permalink;?>"><img src="<?php echo $thumbnail;?>" alt="<?php echo $subtitle;?>"></a>
            </li>
<?php
}
$headlines = get_posts("category=12&numberposts=5&exclude=$post->ID");
 foreach($headlines as $post){
        $permalink = $post->get_permalink();
        $subtitle = $post->post_subtitle;
        $date = date("Y-m-d", strtotime($post->post_date));
?>
    <li class="news-item"><a href="<?php echo $permalink ?>"><?php echo $subtitle;?></a> <span><?php echo $date;?></span></li>
<?php
}
?>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
