<?php get_header();?>
<div class="wrap contact-head">
    <div class="container">
        <?php breadcrumb_nav();?>
        <div class="contact-info">
            <h1>Contact Us</h1> 
            <p>Have a question about our machine & service? please feel free to contact us.</p>
            <h2>China Head Office</h2>
            <ul>
                <li><span>Phone:</span>0086-18838109566</li>
                <li><span>Email:</span>quote@camelway.com</li>
            </ul>
            <div class="addr">China Headquarters: No. 446 ZhengShang Road, Zhengzhou, Henan Prov</div>
        </div>
    </div>
</div>

<div class="wrap contact-body">
    <div class="container">
        As a Chinese Construction Machinery Manufacturer, Camleway Group are committed to providing affordable and accessible equipment for infrastructure projects in developing countries. We help customers design solutions, select equipment, install & maintain as well as provide after-sales service. Through online and offline sales networks around the world, you can quickly get in touch with us. We recommend contacting us by filling out the form.
        <ul>
            <li><span>Pre-Sales Advice</span></li>
            <li><span>Design Program</span></li>
            <li><span>Site inspection</span></li>
            <li><span>After-Sales Service</span></li>
        </ul>
    </div>
</div>

<div class="container about-feedback">
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
$comments = $feedback_query->query(array('number'=>6, 'group'=>'comment', 'status'=>'approved', 'parent'=>0));
foreach($comments as $comment){
    $showusername = (mb_strlen($comment->feedback_user_name) > 3) ? mb_substr($comment->feedback_user_name, 0, 3).'***' : $comment->feedback_user_name;
?>
            <li>
                <div><span class="author"><?php echo $showusername?></span> <span class="pubdate"><?php echo $comment->feedback_date;?></span></div>
                <p><?php echo strip_tags($comment->feedback_content);?></p>
            </li>
<?php } ?>
        </ul>
    </div>
</div>

<?php get_footer();