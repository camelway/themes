<div class="footer">
<div class="container">
    <div class="foot-logo">
        <img src="<?php dminfo('template_url')?>images/foot-logo.png" alt="camelway">
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y')?> ИП ООО «CAMELWAY CHINA»</p>
    </div>
</div>
</div>
<script>
(function(){
    if(!supportwebp){
        var images = document.querySelectorAll('img');
        for(var i in images){
            var originsrc = images[i].src;
            if(originsrc && originsrc.substr(-5) == '.webp' && ( originsrc.substr(0, 24) == 'https://www.camelway.uz/' || originsrc.substr(0,1) == '/')){
                images[i].src = '<?php dminfo('ajax_url')?>?action=webp2jpg&f='+encodeURIComponent(originsrc);
            }
        }
    }

    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(', ');

    var singlemobile = document.querySelector('.contact .telegram');
    if(singlemobile)
        document.querySelector('.top-contact .mobile').innerHTML = singlemobile.innerHTML;
    var singleemail = document.querySelector('.contact .email');
    if(singleemail)
        document.querySelector('.top-contact .email').innerHTML = singleemail.innerHTML;
})();
</script>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<noscript><div><img src="https://mc.yandex.ru/watch/56097448" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=473483456591431&ev=PageView&noscript=1"/></noscript>
</body>
</html>
