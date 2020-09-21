<?php get_header();?>
<div class="wrap primary-banner">
    <div class="wrap banner-elements">
        <ul>
            <li class="fadein"><a href="<?php the_category_link(2);?>"><img srcset="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-1.jpg&width=1920 1920w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-1.jpg&width=1024 1024w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-1.jpg&width=800 800w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-1.jpg&width=400 400w" src="<?php dminfo('template_url')?>media/index-banner-1.jpg" alt="stationary concrete batching plant"></a></li>
            <li><a href="<?php the_category_link(3);?>"><img srcset="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-2.jpg&width=1920 1920w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-2.jpg&width=1024 1024w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-2.jpg&width=800 800w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-2.jpg&width=400 400w" src="<?php dminfo('template_url')?>media/index-banner-2.jpg" alt="mobile concrete batching plant"></a></li>
            <li><a href="<?php the_category_link(4);?>"><img srcset="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-3.jpg&width=1920 1920w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-3.jpg&width=1024 1024w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-3.jpg&width=800 800w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php dminfo('template_url')?>media/index-banner-3.jpg&width=400 400w" src="<?php dminfo('template_url')?>media/index-banner-3.jpg" alt="concrete mixer"></a></li>
        </ul>
    </div>
    <div class="wrap leading-products">
        <ul class="container product-elements">
            <li>
                <img src="<?php dminfo('template_url')?>media/stationary-batching-plant-icon.png" alt="stationary batching plant">
                <h3><a href="<?php the_category_link(2)?>">Stationary Concrete Batching Plant</a></h3>
                <p>Stationary batching plant produce any types of concrete university and stable.</p>
            </li>
            <li>
                <img src="<?php dminfo('template_url')?>media/mobile-batching-plant-icon.png" alt="mobile batching plant">
                <h3><a href="<?php the_category_link(3)?>">Mobile Concrete Batching Plant</a></h3>
                <p>Mobile batching plant produce concrete at jobsite in easy way.</p>
            </li>
            <li>
                <img src="<?php dminfo('template_url')?>media/concrete-mixer-icon.png" alt="concrete mixer">
                <h3><a href="<?php the_category_link(4)?>">Concrete Mixer</a></h3>
                <p>We have multiple types of concrete mixers can help to mix build materiales.</p>
            </li>
        </ul>
    </div>
</div>

<div class="container company">
    <div class="introduce">
        <h1>Camelway Machinery Group</h1>
        <p>Camelway Machinery Group is an established manufacturer of construction machinery, holding multiple subsidiaries around the world.</p>
        <ul>
            <li>Founded year: 1983</li>
            <li>Factory area: 100,000 square meters</li>
            <li>Number of Workers: 300+</li>
            <li>Production equipment: 500 sets</li>
            <li>Global customers: 15000+</li>
        </ul>
        <a href="#" class="more">Learn More</a>
    </div>
    <div class="globalfootprint">
    <img src="<?php dminfo('template_url')?>media/clients.jpg" alt="our clients">
    </div>
</div>

<div class="wrap product-show">
    <div class="container">
        <h2>Products Show</h2>
        <div class="explanation">
            <blockquote>
                Camelway Machinery offers construction machines worldwide, main products include concrete batching plants, concrete pumps, concrete mixers, crushers, etc.
            </blockquote>
            <ul>
                <li>
                    <h3><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></h3>
                    <a href="<?php the_category_link(2)?>" class="more">More+</a>
                </li>
                <li>
                    <h3><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></h3>
                    <a href="<?php the_category_link(2)?>" class="more">More+</a>
                </li>
                <li>
                    <h3><a href="<?php the_category_link(4)?>"><?php the_category_name(4)?></a></h3>
                    <a href="<?php the_category_link(2)?>" class="more">More+</a>
                </li>
            </ul>
        </div>
        <div class="product-image">
            <img src="<?php dminfo('template_url')?>media/index-product-show.png" alt="concrete batching plant">
        </div>
    </div>
</div>

<div class="wrap product-scroll">
    <ul>
<?php 
$q = new DM_Query(array('category__in'=>array(1,2,3,4,5,6,7,8), 'meta_key'=>'viewed', 'orderby'=>'meta_value_num'));
while($q->have_posts()){
    $q->the_post();
?>
        <li>
            <a href="<?php the_permalink()?>"><img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php echo esc_html(get_the_thumbnail())?>&width=380" alt="<?php the_subtitle()?>" width="380" height="285"></a>
           <div class="text">
                <h3><a href="<?php the_permalink()?>"><?php the_subtitle()?></a></h3>
                <span>Capacity: <?php the_data('capacity')?></span>
            </div>
        </li>
<?php } ?>
    </ul>
    <div class="scroll-control">
        <span role="button">&#xe92c;</span>
        <span role="button">&#xe92d;</span>
    </div>
</div>

<div class="wrap reviews">
    <div class="container review-content">
        <h2>User Evaluation <span class="privacy-notice">All public reviews has obtained user consent</span></h2>
        <ul>
            <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>

             <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>

             <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>

            <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>
            <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>
            <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>
            <li>
                <p>I first learned about the company on the Internet. After contacting, I quickly gave a site planning plan. Later, after using the equipment, the performance was very good.</p>
                <div class="author">
                    <img src="<?php dminfo('template_url')?>media/review-author-avatar.png" alt="Peter Grosskopf">
                    <div class="org">
                        <i>Peter Grosskopf</i>
                        <em>Russia Project leader</em>
                    </div>
                </div>
            </li>
        </ul>
        <div class="review-control review-control-left"></div>
        <div class="review-control review-control-right"></div>
    </div>
</div>

<div class="container feedbacks">
    <div class="feedback-container">
        <h2>Contact Sellers in Seconds</h2>
        <p class="tips">Fill out this simple form. Our team will contact you promptly to discuss next steps.</p>
        <form action="<?php dminfo('feedback_url')?>" method="post" class="feedback-form" onsubmit="return async_submit(this)">
            <p class="input"><input name="user_name" type="text" required placeholder="Name:*"></p>
            <p class="input"><input name="user_mobile" type="text" required placeholder="Mobile Phone:*"></p>
            <p class="input"><input name="user_email" type="email" placeholder="Email:"></p>
            <p class="input"><input name="company" type="text" placeholder="Company:"></p>
            <p class="full-row input"><textarea name="content" placeholder="Details:*" rows="2"></textarea></p>
            <p class="full-row"><label><input type="checkbox" name="public" value="1" checked>Public Display<span>(Will not show private information)</span></label></p>
            <p class="full-row"><span class="result"></span><input name="submit" type="submit" value="Submit"></p>
        </form>
    </div>
    <div class="feedback-list">
        <h3>Message Wall</h3>
        <ul>
<?php
$feedback_query = new DM_Feedback_Query();
$comments = $feedback_query->query(array('number'=>6, 'group'=>'comment', 'status'=>'approved'));
foreach($comments as $comment){
    $showusername = (strlen($comment->feedback_user_name) > 3) ? substr($comment->feedback_user_name, 0, 3).'***' : $comment->feedback_user_name;
?>
            <li>
                <div><span class="author"><?php echo $showusername?></span> <span class="pubdate"><?php echo $comment->feedback_date;?></span></div>
                <p><?php echo strip_tags($comment->feedback_content);?></p>
            </li>
<?php } ?>
        </ul>
    </div>
</div>

<div class="wrap partners">
    <ul class="container">
        <li><img src="<?php dminfo('template_url')?>media/sicoma.jpg" alt="sicoma"></li>
        <li><img src="<?php dminfo('template_url')?>media/wam.jpg" alt="wamp"></li>
        <li><img src="<?php dminfo('template_url')?>media/siemens.jpg" alt="siemens"></li>
        <li><img src="<?php dminfo('template_url')?>media/mitsubishi.jpg" alt="mitsubishi"></li>
        <li><img src="<?php dminfo('template_url')?>media/ai-burhan.jpg" alt="ai-burhan"></li>
        <li><img src="<?php dminfo('template_url')?>media/camozzi.jpg" alt="camozzi"></li>
        <li><img src="<?php dminfo('template_url')?>media/pedrollo.jpg" alt="pedrollo"></li>
        <li><img src="<?php dminfo('template_url')?>media/oli.jpg" alt="oli"></li>
        <li><img src="<?php dminfo('template_url')?>media/civil-concrete.jpg" alt="civil concrete"></li>
        <li><img src="<?php dminfo('template_url')?>media/crh.jpg" alt="crh"></li>
    </ul>
</div>

<?php get_footer();
