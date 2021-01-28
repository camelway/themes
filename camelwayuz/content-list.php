<ul class="posts-list items">
<?php 
while(have_posts()){
    the_post();
?>
    <li>
<?php if(has_thumbnail()){ ?>
        <div class="thumbnail"><a href="<?php the_permalink();?>"><img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle();?>" width="600" height="350"></a></div>
<?php } ?>
        <div class="info">
            <h3><a href="<?php the_permalink()?>"><?php the_subtitle();?></a></h3>
            <div class="pubinfo">
                <span class="pubdate"><?php the_time('Y-m-d')?></span>
                <span class="viewed"><?php echo intval(get_the_meta('viewed'));?></span>
            </div>
            <p><?php echo dm_trim_words(get_the_excerpt(), 350);?></p>
        </div>
    </li>
<?php }?>
</ul> 
<?php if( is_search() && found_posts() > get_option('posts_per_search')){ ?>
    <span class="loadmore" role="button" data-offset="<?php echo get_option('posts_per_search')?>" data-search="<?php echo get_query_var('s')?>" onclick="loadposts(this)">Load More</span>
<?php } elseif(is_category() && found_posts() > get_option('posts_per_page')){?>
    <span class="loadmore" role="button" data-offset="<?php echo get_option('posts_per_page')?>" data-category="<?php the_category_ID();?>" onclick="loadposts(this)">Load More</span>
<?php } elseif(is_tag() && found_posts() > get_option('posts_per_page')){?>
    <span class="loadmore" role="button" data-offset="<?php echo get_option('posts_per_page')?>" data-tag="<?php the_tag_title()?>" onlick="loadposts(this)">Load More</span>
<?php } ?>
