<div class="widget-float">
    <div class="contact-icons">
        <a href="https://wa.me/<?php echo str_replace(array(' ', '(', ')', '-'), '', get_option('float_whatsapp'))?>" target="_blank" class="whatsapp">&#xe902;</a>
        <a href="https://t.me/<?php echo get_option('float_telegram')?>" target="_blank" class="telegram">&#xe928;</a>
        <a href="mailto:<?php echo get_option('float_email')?>" class="email">&#xe901;</a>
        <a href="tel:<?php echo str_replace(array(' ', '(', ')'), '', get_option('float_mobile'))?>" class="mobile">&#xe91b;</a>
        <a role="button" class="inquiry" on="tap:floatform.toggleClass(class='sliderout')" tabindex="5">Xabar qoldiring</a>
    </div>
    <div class="float-form rfq-form" id="floatform">
        <p role="button" class="headline" on="tap:floatform.toggleClass(class='sliderout')" tabindex="6">Xabar qoldiring</p>
        <form action-xhr="<?php dminfo('feedback_url')?>" method="post" target="_top">
            <p class="input name"><input type="text" name="user_name" required placeholder="Ismingiz:*"></p>
            <p class="input tel"><input type="text" name="user_mobile" required placeholder="Sizning mobil:*"></p>
            <p class="input email"><input type="text" name="user_email" placeholder="Sizning Email"></p>
            <p class="input message"><input type="text" name="content" required placeholder="Mahsulotlar va talablar:*"></p>
            <p class="privacy">Sizning shaxsiy ma'lumotlaringiz sir saqlanadi</p>
            <div class="action">
                <div class="result" submit-success><template type="amp-mustache">{{message}}</template></div>
                <input type="submit" name ="submit" value="Taklifni so'rang" class="submit">
            </div>
        </form>
    </div>
</div>
