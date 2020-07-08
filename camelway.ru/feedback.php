<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Получить окончательную цену от производителя без представительства.</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 08:00 до 20:00.</p>
        <p><input type="text" name="user_name" placeholder="Имя (обязательно)" required></p>
        <p><input type="text" name="user_mobile" placeholder="Телефон: (обязательно)" required></p>
        <p><input type="text" name="user_email" placeholder="Электронное письмо:"></p>
        <p><input type="text" name="content" placeholder="Введите детали вашего запроса (обязательно)" required></p>
        <p><input type="submit" value="Запросить предложение"></p>
    </form>
</div>
