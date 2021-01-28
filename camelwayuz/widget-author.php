<div class="post-author content-section" id="author">
    <div class="brief">
        <div class="author-info">
            <div class="author-avatar"><img src="<?php the_author_meta('avatar')?>" alt="<?php the_author();?>" width="65" height="65"></div>
            <div class="author-introduce">
                <strong><?php the_author();?></strong>
                <span><?php the_author_meta('title')?></span>
            </div>
        </div>
        <div class="contact telphone">
            <?php the_author_meta('tel')?>
        </div>
        <div class="contact email">
            <?php the_author_meta('email')?>
        </div>
    </div>
    <div class="motto">
        <?php the_author_meta('description');?>
    </div>
</div>
