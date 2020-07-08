    <div class="search-result">
        <div class="resultstats">Total <span itemprop="numberOfItems"><?php echo found_posts();?></span> Records.</div>
            <ul>
<?php
$i = 1;
$paged = empty(get_query_var('paged')) ? 1 : intval(get_query_var('paged'));
$posts_per_page = get_option('posts_per_search');
while(have_posts()){
    the_post();
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Thing">
                <a href="<?php the_permalink()?>" itemprop="url"><h3 itemprop="name"><?php the_title()?></h3></a>
                <div class="detail">
<?php if(has_thumbnail()){ ?>
                    <a href="<?php the_permalink()?>"><img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" itemprop="image"></a>
<?php }?>
                    <p class="excerpt" itemprop="description">
<?php
    $category = get_the_category()[0];    
    if(!empty($category)){
        $catname = $category->cat_name;
        $link = $category->get_permalink();
        echo "<span class='category'>【<a href=\"$link\">$catname</a>】</span>";
    }
?>
                    <?php echo dm_trim_words(get_the_excerpt(), 500);?>
                </p>
                </div>
                <meta itemprop="position" content="<?php echo ($paged - 1) * $posts_per_page + $i?>">
            </li>
<?php
    $i++;
}
?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="posts_pagination">
        <?php the_posts_pagination(3, 'Previous', 'Next'); ?>
        </div>
    </div>
