<div class="wrap feedback">
    <div class="container">
        <div class="rfq-form">
            <h2 class="title">Bepul baholash</h2>
            <p class="explain">Mutaxassislar har kuni soat 06:00 dan 20:00 gacha barcha savollaringizga javob berishadi.</p>
            <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return async_submit(this)">
                <p class="input name"><input type="text" name="user_name" placeholder="Ism:*" required></p>
                <p class="input tel"><input type="text" name="user_mobile" placeholder="Telefon:*" required></p>
                <p class="input email"><input type="text" name="user_email" placeholder="Email:"></p>
                <p class="input message"><input type="text" name="content" placeholder="Mahsulotlar va talablar:*" required></p>
                <p class="privacy">Sizning shaxsiy ma'lumotlaringiz sir saqlanadi</p>
                <p class="action"><span class="result"></span><input type="submit" name="submit" value="Taklifni so'rang" class="submit"></p>
            </form>
        </div>
        <div class="map"><iframe src="<?php dminfo('template_url')?>zmap.html"></iframe></div>
    </div>
</div>
