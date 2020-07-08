<?php get_header()?>
<div class="container category">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1><?php the_category_name();?></h1>
        <div class="explain">
        <?php the_category_content();?>
        </div>
        <div class="items" itemscope itemtype="http://schema.org/ItemList">
            <meta itemprop="numberOfItems" content="<?php echo found_posts();?>">
            <ul class="showroom">
<?php
$i = 0;
while(have_posts()){
    the_post();
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Product">
                <meta itemprop="mpn" content="<?php echo the_category_slug().'-'.get_the_ID();?>">
                <meta itemprop="brand" content="Camelway">
                <meta itemprop="sku" content="p-<?php the_ID()?>">
                <div class="thumbnail">
                    <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_title()?>" itemprop="image" width="600" height="350"></a>
                </div>
                <div class="description">
                    <h2 itemprop="name"><a href="<?php the_permalink()?>" title="<?php the_subtitle();?>"><?php the_subtitle()?></a></h2>
                    <p itemprop="description"><?php echo dm_trim_words(get_the_excerpt(), 300);?></p>
                    <a href="<?php the_permalink()?>#headline" class="more" itemprop="url">Ko'proq</a>
                    <a href="<?php the_permalink()?>#feedback" class="inquiry">Iqtibos oling</a>
                </div>
                <div itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
                   <link itemprop="url" href="<?php the_permalink()?>#feedback">
                   <meta itemprop="availability" content="https://schema.org/PreOrder">
                   <meta itemprop="itemCondition" content="http://schema.org/NewCondition">
                   <meta itemprop="priceCurrency" content="USD">
                   <meta itemprop="lowPrice" content="<?php the_post_data('lowprice')?>">
                   <meta itemprop="highPrice" content="<?php the_post_data('highprice')?>">
                   <div itemprop="seller" itemscope itemtype="http://schema.org/Organization">
                       <meta itemprop="name" content="Camelway Africa">
                   </div>
                </div>
                <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <meta itemprop="ratingValue" content="<?php the_ratingValue();?>">
                    <meta itemprop="reviewCount" content="<?php the_reviewCount();?>">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="worstRating" content="1">
                </div>
            </li>
<?php } ?>
            </ul>
        </div>
        <?php get_template_part('feedback');?> 
        <?php get_template_part('map');?> 
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
