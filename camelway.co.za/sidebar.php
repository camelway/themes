<div class="company">
    <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
    <em>Camelway Africa</em>
    <p>Camelway Machinery is focus on design, development and manufacture construction machines, over past 30 years, we have provide our customers with high-quality construction machinery. Camelway's product range include concrete machines(concrete mixers, batching plants, concrete pumps, etc), aggregate machines(crushers, screens, feeders, etc) and so on, you can get our product catalog in this website. Our office in African countries have been established, please feel free to contact us.</p>
</div>
<div class="sideproduct">
    <h4>Product Catalog</h4>
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
    <h2>Product Gallery</h2>
    <ul class="images">
<?php
$img = new DM_Query('cat=8&posts_per_page=2&no_found_rows&has_thumbail=1');
while($img->have_posts()){
    $img->the_post();
    $imgs = get_post_images('gallery');
?>
    <li><a href="<?php the_permalink()?>"><img src="<?php echo $imgs[1]->thumbnail;?>" alt="<?php the_title();?>"></a></li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>
<div class="posts">
    <h2>News & Posts</h2>
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
