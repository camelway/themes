<div class="company">
    <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway Sudamérica<">
    <em>Camelway Sudamérica</em>
    <p>Camelway Machinery se centra en el diseño, desarrollo y fabricación de máquinas de construcción, durante los últimos 30 años, hemos proporcionado a nuestros clientes maquinaria de construcción de alta calidad. La gama de productos de Camelway incluye máquinas de hormigón (mezcladoras de hormigón, plantas de procesamiento por lotes, bombas de hormigón, etc.), máquinas de agregados (trituradoras, cribas, alimentadores, etc.) y así sucesivamente, puede obtener nuestro catálogo de productos en este sitio web. Nuestra oficina en los países de América del Sur se han establecido, por favor no dude en contactar con nosotros.</p>
</div>
<div class="sideproduct">
    <h4>Catálogo de productos</h4>
    <ul class="pitem">
<?php
$ps = get_categories(array('exclude'=>array(6,7)));
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
    <h2>Galeria</h2>
    <ul class="images">
<?php
$img = new DM_Query('cat=7&posts_per_page=2&no_found_rows&has_thumbail=1&orderby=rand');
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
    <h2>Publicaciones</h2>
    <ul class="post">
<?php
$img = new DM_Query('cat=6&posts_per_page=5&no_found_rows=1&orderby=rand');
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
