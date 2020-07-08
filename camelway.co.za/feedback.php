<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Request a Fast &amp; Free Quote</p>
        <p class="slogan">Get a Quote Directly from the Manufacturer.</p>
        <p class="description">Specialists of the sales department of Camelway Machinery will answer all your questions from Monday to Sunday from 08:00 to 20:00.</p>
        <p><input type="text" name="user_name" placeholder="Name:(required)" required></p>
        <p><input type="text" name="user_mobile" placeholder="Phone:(required)" required></p>
        <p><input type="text" name="user_email" placeholder="Email:"></p>
        <p><input type="text" name="content" placeholder="Inquiry: product, capacity, delivery port, etc.(required)" required></p>
        <p><input type="submit" value="Submit"></p>
    </form>
</div>
