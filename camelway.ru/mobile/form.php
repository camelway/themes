<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Бесплатный расчет сметы</p>
        <p class="slogan">Получить окончательную цену от производителя без представительства.</p>
        <p class="description">Специалисты отдела продаж Завода «Camelway» ответят на все интересующие Вас вопросы с понедельника по воскресенье с 08:00 до 20:00.</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Имя (обязательно)" required></p>
            <p><input type="text" name="user_mobile" placeholder="Телефон: (обязательно)" required></p>
            <p><input type="email" name="user_email" placeholder="Электронное письмо:"></p>
            <p><input type="text" name="content" placeholder="Введите детали вашего запроса (обязательно)" required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="послать">
            </p>
        </form>
    </div>
</div>
