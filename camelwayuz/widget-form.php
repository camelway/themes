<div class="wrap content-section rfq-form" id="quote">
    <h2 class="title">Bepul baholash</h2>
    <p class="explain">Mutaxassislar har kuni soat 06:00 dan 20:00 gacha barcha savollaringizga javob berishadi.</p>
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return async_submit(this)">
        <p class="input half name"><input type="text" name="user_name" placeholder="Ism:*" required></p>
        <p class="input half tel"><input type="text" name="user_mobile" placeholder="Telefon:*" required></p>
        <p class="input half company"><input type="text" name="company" placeholder="Kompaniya:"></p>
        <p class="input half email"><input type="text" name="user_email" placeholder="Email:"></p>
        <p class="input message"><input type="text" name="content" placeholder="Mahsulotlar va talablar:*" required></p>
        <p class="privacy">Sizning shaxsiy ma'lumotlaringiz sir saqlanadi</p>
        <p class="action"><span class="result"></span><input type="submit" name ="submit" value="Taklifni so'rang" class="submit"><input type="hidden" name="post_ID" value="<?php the_ID();?>"></p>
    </form>
</div>
