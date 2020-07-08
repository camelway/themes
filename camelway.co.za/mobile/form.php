<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Request a Fast &amp; Free Quote</p>
        <p class="slogan">Get a Quote Directly from the Manufacturer</p>
        <p class="description">Specialists of the sales department of Camelway Machinery will answer all your questions from Monday to Sunday from 08:00 to 20:00.</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Your Name:" required></p>
            <p><input type="text" name="user_mobile" placeholder="Phone Number:" required></p>
            <p><input type="email" name="user_email" placeholder="Email:"></p>
            <p><input type="text" name="content" placeholder="Detail Request. Product,Capacity,Country etc." required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="Submit">
            </p>
        </form>
    </div>
</div>
