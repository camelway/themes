<div class="side-rfq">
    <h3>Request for Quotation</h3>
    <p>Fill in the form to have a sales contact you.</p>
    <form action="<?php dminfo('feedback_url')?>" method="post" class="feedback-form" onsubmit="return async_submit(this)">
        <p class="input full-row"><input name="user_name" type="text" placeholder="Name:*" required></p>
        <p class="input full-row"><input name="user_mobile" type="text" placeholder="Mobile:*" required></p>
        <p class="input full-row"><input name="user_email" type="email" placeholder="Email:"></p>
        <p class="input full-row"><textarea name="content" placeholder="Product name and detailed requirements:*" rows="2"></textarea></p>
        <p class="full-row"><span class="result"></span><input name="submit" type="submit" value="Submit"></p>
    </form>
</div>
