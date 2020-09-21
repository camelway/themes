<?php get_header()?>
<div class="container single-head">
    <?php breadcrumb_nav(); ?>
    <div class="head">
         <div class="gallery">
<?php
while(have_images('gallery')){
the_image(); ?>
<a href="<?php the_image_link()?>"><img srcset="<?php the_image_thumbnail();?> 500w, <?php dminfo('ajax_url')?>?action=cropimage&f=<?php the_image_thumbnail();?>&width=300 300w" src="<?php the_image_thumbnail();?>" with="500" height="375" alt="<?php the_image_title()?>"></a>
<?php } ?>
        </div>
        <div class="overview">
        <h1><?php the_subtitle();?></h1>
            <ul class="params">
                <li>Capacity: <span><?php the_data('capacity')?></span></li>
                <li>Power: <span><?php the_data('power')?></span></li>
                <li>Container Qty: <span><?php the_data('qty')?></span></li>
                <li>Price: <span><?php the_data('lowprice')?> - <?php the_data('highprice')?>USD</span></li>
            </ul>
            <div class="introduce"><?php the_excerpt();?></div>
            <div class="review">
<?php $rating = get_rating(); ?>
                <div class="result">
                    <span class="score"><?php echo $rating['score']?></span>
                    <span class="score-ui">
                        <?php show_rating_star($rating['score'])?>
                    </span>
                    <span class="count">(<?php echo $rating['count']?> ratings)</span>
                </div>
                <div class="rating">
                    <span>Rating Us:</span>
                    <div class="star"><span></span><span></span><span></span><span></span><span></span></div>
                </div>
            </div>
            <div class="share">
                <span>Share</span>
                <a href="https://www.facebook.com/sharer.php?src=sp&u=<?php echo rawurlencode(dm_url(false))?>" title="Facebook" rel="nofollow" class="facebook">&#xe918;</a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode(dm_url(false))?>&title=<?php echo rawurlencode(get_the_subtitle())?>" title="Linkedin" rel="nofollow" class="linked">&#xe91c;</a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(dm_url(false))?>" title="Twitter" rel="nofollow" class="twitter">&#xe91a;</a>
                <a href="https://web.skype.com/share?url=<?php echo rawurlencode(dm_url(false))?>" title="Skype" rel="nofollow" class="skype">&#xe919;</a>
                <a href="vibre://forward?text=<?php echo rawurlencode(get_the_subtitle()."\r\n".dm_url(false))?>" title="Viber" rel="nofollow" class="viber">&#xe916;</a>
                <a href="https://telegram.me/share/url?url=<?php echo rawurlencode(dm_url(false))?>&text=<?php echo rawurlencode(get_the_subtitle());?>" title="Telegram" rel="nofollow" class="telegram">&#xe91d;</a>
                <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_subtitle()."\r\n".dm_url(false))?>" title="Whatsapp" rel="nofollow" class="whatsapp">&#xe91f;</a>
            </div>
            <div class="rfq">
                <h3>Request A Quote</h3>
                <form action="<?php dminfo('feedback_url')?>" method="post" class="feedback-form" onsubmit="return async_submit(this)">
                    <p class="input"><input name="user_name" type="text" placeholder="Name:*" required></p>
                    <p class="input"><input name="user_mobile" type="text" placeholder="Mobile:*" required></p>
                    <p class="input"><input name="user_email" type="email" placeholder="Email:"></p>
                    <p class="input"><input name="company" type="text" placeholder="Company:"></p>
                    <p class="input full-row"><textarea name="content" placeholder="Detail:*" rows="1"></textarea></p>
                    <p class="full-row"><span class="result"></span><input name="submit" type="submit" value="Submit"></p>
                </form>
            </div>
        </div> 
        <div class="clearfix"></div>
    </div>
</div>

<div class="wrap single-service">
    <div class="container service-icon">
        <span>1 minute send request</span>
        <span>12 hours customized solutions*</span>
        <span>factory visiting anytime</span>
        <span>10-40 days shipping*</span>
        <span>One week Installation*</span>
        <span>2 days traning*</span>
        <span>2 years warranty*</span>
        <span>project tracking regularly</span>
        <span>2 hours provide maintenance plan*</span>
    </div>
    <div class="container service-stage">
        <span>Pre-Sale Service</span>
        <span>In-sale service</span>
        <span>After-sale service</span>
    </div>
</div>

<div class="container single-body">
    <div class="main">
        <div class="entry-content">
            <p class="title">Introduce</p>
            <?php the_content();?>
        </div>
<?php
$post = get_the_ID();
$feedback_query = new DM_Feedback_Query();
$comments = $feedback_query->query(array('post_id'=>$post, 'number'=>10, 'group'=>'comment', 'no_found_rows'=>false, 'status'=>'approved'));
?>
         <div class="comments">
            <h3 class="title"><?php echo $feedback_query->found_feedbacks();?> Comments</h3>
            <div class="comment-form">
                <div class="avatar"><img src="<?php dminfo('template_url')?>media/anonymous-avatar.png" alt="avatar" width="30" height="30"></div>
                <div class="rating">Rating: &nbsp;&nbsp;<span class="star-filled"></span><span class="star-filled"></span><span class="star-filled"></span><span class="star-filled"></span><span class="star-filled"></span><i>5</i></div>
                <div class="message">
                    <div class="content" contenteditable data-tips="Post a public comment(private information will be protected)."></div>
                    <span class="emojibtn" role="button" tabindex="-1"></span>
                </div>
                <div class="action">
                    <div class="name" contenteditable data-tips="Name:"></div>
                    <div class="email" contenteditable data-tips="Email:"></div>
                    <div class="submit disabled">Submit</div>
                    <div class="cancel">Cancel</div>
                </div>
            </div>
            <div class="comments-list">
                <ul>
<?php 
foreach($comments as $comment){
    $avatar = sprintf('https://www.gravatar.com/avatar/%s.jpg?d=mp', md5($comment->feedback_user_email));
    $showusername = (strlen($comment->feedback_user_name) > 3) ? substr($comment->feedback_user_name, 0, 3).'***' : $comment->feedback_user_name;
?>
                    <li>
                        <div class="author"><img src="<?php echo $avatar;?>" alt="<?php echo $comment->feedback_user_name?>" class="avatar"> <span class="name"><?php echo $showusername?></span> <span class="rating"><?php show_rating_star($comment->get_meta('score', true))?></span></div>
                        <div class="message"><?php echo $comment->feedback_content;?></div>
                        <div class="action" data-comment-id="<?php echo $comment->feedback_ID;?>">
                            <span class="like"><?php echo intval($comment->get_meta('likes', true));?></span>
                            <span class="reply">Reply</span>
                            <span class="viewreply">View Reply</span>
                        </div>
                        <span class="pubtime"><?php echo $comment->feedback_date;?></span>
                    </li>
<?php } ?>
                </ul>
<?php if($feedback_query->max_num_pages > 1){ ?>
                <div class="loadmore" data-offset="10" data-id="<?php the_ID()?>">View More</div>
<?php } ?>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?>    
        <?php get_template_part('sidebar', 'showcase');?>    
    </div>
    <div class="clearfix"></div>
</div>
<?php get_template_part('footer', 'related');?>
<?php get_footer();
