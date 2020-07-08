<div class="sharebox">
    <a onclick="javascript:alert('Please Press Ctrl + D')" title="Add Favorites" rel="nofollow" class="favorites"></a>
    <a _href="https://www.facebook.com/sharer.php?src=sp&u=<?php echo rawurlencode(dm_url(false))?>" title="Facebook" rel="nofollow" class="facebook"></a>
    <a _href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode(dm_url(false))?>&title=<?php echo rawurlencode(get_the_subtitle())?>" title="Linkedin" rel="nofollow" class="linked"></a>
    <a _href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(dm_url(false))?>" title="Twitter" rel="nofollow" class="twitter"></a>
    <a _href="https://web.skype.com/share?url=<?php echo rawurlencode(dm_url(false))?>" title="Skype" rel="nofollow" class="skype"></a>
    <a _href="vibre://forward?text=<?php echo rawurlencode(get_the_subtitle()."\r\n".dm_url(false))?>" title="Viber" rel="nofollow" class="viber"></a>
    <a _href="https://telegram.me/share/url?url=<?php echo rawurlencode(dm_url(false))?>&text=<?php echo rawurlencode(get_the_subtitle());?>" title="Telegram" rel="nofollow" class="telegram"></a>
    <a _href="https://wa.me/?text=<?php echo rawurlencode(get_the_subtitle()."\r\n".dm_url(false))?>" title="Whatsapp" rel="nofollow" class="whatsapp"></a>
</div>
