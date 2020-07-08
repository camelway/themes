<div class="company">
    <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
    <em>Camelway Philippines</em>
    <p>Camelway Machinery focuses on designing, developing and manufacturing construction machinery. In the past 37 years, we have provided customers with high-quality construction machinery. Camelway can provide customers with concrete batching plant price, concrete mixer price, crusher price and other equipment prices free of charge. We are the top concrete equipment manufacturer. We have set up offices in the Philippines, Uzbekistan and other countries.</p>
    <em>About this site</em>
    <p>You can learn about the concrete batching plant configuration from this website,Concrete batching plant prices, how to pay, and manufacturer qualification certificates for the products provided.
    </p>
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
    <li><a href="<?php the_permalink();?>"><img src="<?php the_thumbnail();?>" alt="<?php the_title();?>"></a></li>
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
    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
<?php
}
dm_reset_postdata();
?>
    </ul>
</div>
