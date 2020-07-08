<?php get_header();?>
<div class="container notfound">
    <div class="main">
        <h1>404 Не Найдено</h1>
        <h2>Не нашли эту страницу, если хотите купить машину, свяжитесь с нами напрямую</h1>
        <div class="feedback">
            <form action="<?php dminfo('feedback_url')?>" method="post">
            <p class="headline">Онлайн сообщение</p>
            <p class="slogan">24 часа в сутки, 365 дней в году</p>
            <p class="description">Каковы ваши потребности, вы можете оставить сообщение, мы  отве</p>
            <p><input type="text" name="user_name" placeholder="Пожалуйста, введите ваше имя"></p>
            <p><input type="text" name="user_email" placeholder="Пожалуйста, введите ваш номер телефона"></p>
            <p><input type="text" name="user_mobile" placeholder="Пожалуйста, введите ваш адрес электронной почты"></p>
            <p><input type="text" name="content" placeholder="Пожалуйста, введите ваш адрес электронной почты"></p>
            <p><input type="submit" value="послать"></p>
            <input type="hidden" name="lang" value="ru">
            </form>
        </div>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>
