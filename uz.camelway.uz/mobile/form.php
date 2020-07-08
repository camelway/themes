<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Bepul Baholash</p>
        <p class="slogan">Biz Toshkentda joylashganmiz, biz ishlab chiqaruvchilarmiz.</p>
        <p class="description">Camelway fabrikasi savdo bo'limining mutaxassislari sizning barcha savollaringizga dushanbadan yakshanbagacha soat 06:00 dan 20:00 gacha (Toshkent vaqti bilan) javob berishadi.</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Ism (talab qilinadi):" required></p>
            <p><input type="text" name="user_mobile" placeholder="Telefon: (talab qilinadi):" required></p>
            <p><input type="email" name="user_email" placeholder="Elektron pochta:"></p>
            <p><input type="text" name="content" placeholder="Sizning so'rovingiz tafsilotlarini kiriting (talab qilinadi)" required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="Yuborish">
            </p>
        </form>
    </div>
</div>
