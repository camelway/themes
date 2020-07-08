<div class="widget-float-messaging">
    <p class="headline">提交信息 <span class="icon-close">&#xe9de;</span></p>
    <form action="<?php dminfo('feedback_url');?>" method="post">
        <p><label for="user_name">姓名:</label><input type="text" name="user_name" id="user_name" placeholder="如何称呼您"></p>
        <p><label for="user_email">邮箱:</label><input type="text" name="user_email" id="user_email" placeholder="您的邮箱"></p>
        <p><label for="user_mobile">电话:</label><input type="text" name="user_mobile" id="user_mobile" placeholder="您的电话"></p>
        <p><label for="content">信息:</label><textarea name="content" id="content" placeholder=""></textarea></p>
        <input type="hidden" name="lang" value="cn">
        <p><input class="submit" type="submit" value="提交"></p>
    </form>
</div>
