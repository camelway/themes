<div class="container singe single-view">
    <div class="post-main" role="main" itemscope itemtype="https://schema.org/BlogPosting">
        <div class="post-content" >
            <h1 itemprop="headline name"><?php the_subtitle();?></h1>
            <?php get_template_part('inc/post','pubmeta');?>
            <?php the_schema_images()?>
            <meta itemprop="mainEntityOfPage" content="<?php the_permalink()?>">
            <meta itemprop="description" content="<?php echo dm_trim_words(get_the_excerpt(), 255, '');?>">
            <div class="content-section" itemprop="articleBody">
                <?php the_content();?>
            </div>
        </div>
        <div class="post-tags">
            <?php the_schema_keywords();?>
        </div>
         <div class="post-pagination">
            <?php camelway_post_pagination();?>
        </div>
        <div class="post-feedbacks">
            <?php get_template_part('feedbacks')?>
        </div>
    </div>
    <div class="post-sidebar" role="sidebar" >
        <div class="post-author">
            <div class="brief-info">
                <img src="<?php the_author_meta('avatar')?>" class="author-avatar" alt="<?php the_author();?>">
                <h3><?php the_author();?></h3>
                <p><?php the_author_meta('title')?></p>
                <p><?php the_author_meta('department')?></p>
                <p><?php the_author_meta('company')?></p>
            </div>
            
            <div class="contact-info">
                <h3>Contact Author</h3>
                <p class="tel">Mobile: <?php the_author_meta('tel')?></p>
                <p class="wechat">Wechat: <?php the_author_meta('wechat')?></p>
                <p class="email">Email: <?php the_author_meta('email')?></p>
                <?php if(get_the_author_meta("whatsapp")){ ?><p class="whatsapp">Whatsapp: <?php the_author_meta('whatsapp')?></p> <?php }?>
                <?php if(get_the_author_meta("facebook")){ ?><p class="facebook">FaceBook: <?php the_author_meta('facebook')?></p> <?php }?>
                <?php if(get_the_author_meta("linkedin")){ ?><p class="linkedin">linkedin: <?php the_author_meta('linkedin')?></p> <?php }?>
            </div>
    </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="container content-section">
    <h2>Related Products</h2>
    <?php the_vertical_items(array(1,2,3,4,5,6,7,8,9), 4);?>
</div>
<?php  //get_template_part('widget', 'inquiry-form'); ?>
