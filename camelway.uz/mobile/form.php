<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Мы находимся в Ташкенте, Мы производители.</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 06:00 до 20:00 (время Ташкентское).</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Твое имя:" required></p>
            <p><input type="text" name="user_mobile" placeholder="Ваш номер телефона:" required></p>
            <p><input type="text" name="content" placeholder="Введите детали вашего запроса" required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="Разместить">
            </p>
        </form>
    </div>
</div>
