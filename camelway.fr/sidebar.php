<div class="company">
    <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway China">
    <em>Camelway Africa</em>
    <p>Camelway est un fabricant des matériels de construction,qui fabrique la centrale à béton,la centrale d'enrobage,les concasseurs divers,la machine de brique,la bétonnière avec pompe à béton etc. nous visons à fournir des meilleurs produits et service à nos clients en Afrique,aider nos clients à diminuer le coût d'investissement et assurer la sécurité et le bénéfice. nous avons plusieurs centres de vente et service en Afrique,si vous avez besoin des matériels de construction,contactez-nous!</p>
</div>
<div class="sideproduct">
    <h4>Catalogue de Produits</h4>
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
    <h2>Calerie de Produits</h2>
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
    <h2>Nouvelles et Articles</h2>
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
