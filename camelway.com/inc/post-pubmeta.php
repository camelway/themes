            <div class="post-pub-meta">
                <span itemprop="datePublished" class="publish-date"><?php the_time('Y-m-d')?></span>
                <span itemprop="author" class="publish-author"><a href="<?php echo get_the_author_posts_link()?>" rel="nofollow"><?php the_author();?></a></span>
                <span itemprop="dateModified" class="modified-date"><?php the_modified_time('Y-m-d');?></span>
                <div class="publisher" itemprop="publisher" itemscope  itemtype="https://schema.org/Organization">
                    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><img itemprop="url" src="//data.camelway.net/static/images/camelway-114x114.png" alt="logo"></span>
                    <a itemprop="url" href="<?php echo home_url(true);?>" rel="nofollow"><span itemprop="name">Camelway Machinery</span></a>
                </div>
            </div>
