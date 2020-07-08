<div class="container form-section">
<h2>Request a Quote</h2>
<form class="feedback" method="post" action-xhr="<?php dminfo('feedback_url')?>?format=json" target="_blank">
    <p><input type="text" name="user_name" placeholder="Name (required):" required><span class="required">*</span></p>
    <p><input type="email" name="user_email" placeholder="Email (required):" required><span class="required">*</span></p>
    <p><input type="text" name="user_mobile" placeholder="Mobile:"></p>
    <p><textarea name="content" placeholder="Enter Your inquiry details such as product name, FOB, etc. (required)" rows="4" required></textarea><span class="required">*</span></p>
    <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
    <p><input type="submit" value="Send" class="button"></p>
    <input type="hidden" name="url" value="<?php dm_mobile_url()?>">
<?php if(is_single()) { ?>
    <input type="hidden" name="post_ID" value="<?php the_ID()?>">
<?php  } ?>
</form>
<p class="note">Include a self introduction and special requests(if any) for better quotations.</p>
</div>
