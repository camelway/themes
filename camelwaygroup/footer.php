<div class="wrap footer">
    <div class="container">
        <div class="foot-navs">
            <h4>Site Navigation</h4>
            <ul>
                <li><a href="<?php the_category_link(10);?>">Camelway Group Blog</a></li>
                <li><a href="<?php the_category_link(1)?>">Concrete Mixing Plant</a></li>
                <li><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></li>
                <li><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></li>
                <li><a href="<?php the_category_link(5)?>"><?php the_category_name(5)?></a></li>
                <li><a href="<?php the_permalink(2)?>">Contact Us</a></li>
            </ul>
        </div>
        <div class="foot-catalog">
            <h4>Products Catalog</h4>
            <ul>
<?php
$cs = get_categories(array('include'=>array(2,3,4,5,6,7,8,9)));
foreach($cs as $c){ ?>
                <li><a href="<?php echo $c->get_permalink()?>"><?php echo $c->cat_name?></a></li>
<?php }
$ps = get_posts(array('category__in'=>array(1,2,4,6,8), 'posts_per_page'=>4, 'meta_key'=>'viewed', 'orderby'=>'meta_value_num'));
foreach($ps as $p){ ?>
                <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a></li>
<?php } ?>
            </ul>
        </div>
        <div class="foot-contact">
            <div class="tel">
                <p class="key"><?php echo get_option('site_mobile')?></p>
                <p class="tips">Whatsapp · Wechat · Telegram</p>
            </div>
            <div class="email">
                <p class="key"><?php echo get_option('site_email')?></p>
                <p class="tip">Email request will get the most detailed reply</p>
            </div>
            <div class="share">
                <a href="https://www.facebook.com/camelway/" rel="nofollow" class="facebook" target="_blank">&#xe918;</a>
                <a href="https://www.pinterest.com/camelwaygroup/" rel="nofollow" class="pinterest" target="_blank">&#xe91b;</a>
                <a href="https://www.youtube.com/channel/UCisCm9pYJtqHX9Vz6WOPPRg" rel="nofollow" class="youtube" target="_blank">&#xe91e;</a>
                <a href="https://www.linkedin.com/company/camelway/" rel="nofollow" class="linked" target="_blank">&#xe91c;</a>
            </div>
        </div>
    </div>
</div>
<div class="wrap copy">&copy; <?php echo date('Y')?> Camelway Machinery</div>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
</body>
</html>