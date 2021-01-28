<div class="wrap content-section rfq-form" id="quote">
    <h2 class="title">Bepul baholash</h2>
    <p class="explain">Mutaxassislar har kuni soat 06:00 dan 20:00 gacha barcha savollaringizga javob berishadi.</p>
    <form action-xhr="<?php dminfo('feedback_url')?>" method="post" target="_top">
        <p class="input name"><input type="text" name="user_name" placeholder="Ism:*" required></p>
        <p class="input tel"><input type="text" name="user_mobile" placeholder="Telefon:*" required></p>
        <p class="input email"><input type="text" name="user_email" placeholder="Email:"></p>
        <p class="input message"><input type="text" name="content" placeholder="Mahsulotlar va talablar:*" required></p>
        <p class="privacy">Sizning shaxsiy ma'lumotlaringiz sir saqlanadi</p>
        <div class="action">
            <div class="result" submit-success><template type="amp-mustache">{{message}}</template></div>
            <input type="submit" name ="submit" value="Taklifni so'rang" class="submit"><input type="hidden" name="post_ID" value="<?php the_ID();?>">
        </div>
    </form>
</div>
