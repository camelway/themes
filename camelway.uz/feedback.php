<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Мы находимся в Ташкенте, Мы производители</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 06:00 до 20:00 (время Ташкентское).</p>
        <p><input type="text" name="user_name" placeholder="Твое имя" required></p>
        <p><input type="text" name="user_mobile" placeholder="Ваш номер телефона" required></p>
        <p><input type="text" name="content" placeholder="Введите детали вашего запроса" required></p>
        <p><input type="submit" value="Запросить предложение"></p>
        <input type="hidden" name="lang" value="ru">
    </form>
</div>
