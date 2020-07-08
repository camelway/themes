<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Bepul baholash</p>
        <p class="slogan">Biz Toshkentda joylashganmiz, biz ishlab chiqaruvchilarmiz.</p>
        <p class="description">Camelway fabrikasi savdo bo'limining mutaxassislari sizning barcha savollaringizga dushanbadan yakshanbagacha soat 06:00 dan 20:00 gacha (Toshkent vaqti bilan) javob berishadi.</p>
        <p><input type="text" name="user_name" placeholder="Ism (talab qilinadi):" required></p>
        <p><input type="text" name="user_mobile" placeholder="Telefon: (talab qilinadi)" required></p>
        <p><input type="text" name="user_email" placeholder="Elektron pochta:"></p>
        <p><input type="text" name="content" placeholder="Sizning so'rovingiz tafsilotlarini kiriting (talab qilinadi)" required></p>
        <p><input type="submit" value="Taklifni so'rang"></p>
    </form>
</div>
