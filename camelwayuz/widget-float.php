<div class="widget-float">
    <div class="contact-icons">
        <a href="https://wa.me/<?php echo str_replace(array(' ', '(', ')', '-'), '', get_option('float_whatsapp'))?>" target="_blank" class="whatsapp">&#xe902;</a>
        <a href="https://t.me/<?php echo get_option('float_telegram')?>" target="_blank" class="telegram">&#xe928;</a>
        <a href="mailto:<?php echo get_option('float_email')?>" class="email">&#xe901;</a>
        <a href="tel:<?php echo str_replace(array(' ', '(', ')'), '', get_option('float_mobile'))?>" class="mobile">&#xe91b;</a>
        <a href="#quote" class="inquiry" onclick="toggleClass('.float-form', 'sliderout')">Xabar qoldiring</a>
    </div>
    <div class="float-form rfq-form">
        <p class="headline" onclick="toggleClass('.float-form', 'sliderout')">Xabar qoldiring</p>
        <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return async_submit(this)">
            <p class="input name"><input type="text" name="user_name" required placeholder="Ismingiz:*"></p>
            <p class="input tel"><input type="text" name="user_mobile" required placeholder="Sizning mobil:*"></p>
            <p class="input email"><input type="text" name="user_email" placeholder="Sizning Email"></p>
            <p class="input message"><input type="text" name="content" required placeholder="Mahsulotlar va talablar:*"></p>
            <p class="privacy">Sizning shaxsiy ma'lumotlaringiz sir saqlanadi</p>
            <p class="action"><span class="result"></span><input type="submit" name="submit" value="Taklifni so'rang" class="submit"></p>
        </form>
    </div>
</div>
