<div class="footer">
<div class="container">
    <div class="foot-logo">
        <img src="<?php dminfo('template_url')?>images/foot-logo.png" alt="camelway">
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y')?> Camelway Machinery</p>
        <p class="privacy"><a href="<?php the_permalink(222)?>"  rel="nofollow">Privacy Policy</a></p>
    </div>
</div>
</div>
<script>
    (function(){
        if(!supportwebp){
            var images = document.querySelectorAll('img');
            for(var i in images){
                var originsrc = images[i].src;
                if(originsrc && originsrc.substr(-5) == '.webp' && ( originsrc.substr(0, 27) == 'https://www.camelway.co.za/' || originsrc.substr(0,1) == '/')){
                    images[i].src = 'https://www.camelway.co.za/dm-ajax.php?action=webp2jpg&f='+encodeURIComponent(originsrc);
                }
            }
        }
<?php if(is_single()){ ?>
        //rating
        var ratingbox = document.querySelector('.share .rating');
        if(ratingbox){
            var ratinged = false;
            ratingbox.addEventListener('mouseover', function(e){
                var ev = e || e.event;
                var target = ev.target || ev.srcElement;
                if(target.nodeName !== 'SPAN') return;
                var spans = ratingbox.querySelectorAll('span');
                var index = Array.from(spans).indexOf(target);
                spans.forEach(function(c,i,o){
                    if(i<=index){
                        spans[i].className = 'checked';
                    }else{
                        spans[i].className = '';
                    }
                })
            });
            ratingbox.addEventListener('click', function(e){
                var ev = e || e.event;
                var target = ev.target || ev.srcElement;
                if(target.nodeName !== 'SPAN') return;
                var spans = ratingbox.querySelectorAll('span');
                var index = Array.from(spans).indexOf(target);
                spans.forEach(function(c,i,o){
                    if(i<=index){
                        spans[i].className = 'checked';
                    }else{
                        spans[i].className = '';
                    }
                });
                var url = '<?php dminfo('ajax_url')?>?action=ratingproduct&id=<?php the_ID();?>&rating='+(index+1);
                var tmp = new Image();
                tmp.src = url;
                ratinged = true;
            });
            ratingbox.addEventListener('mouseleave', function(){
                if(ratinged == true) return;
                var spans = ratingbox.querySelectorAll('span');
                spans.forEach(function(c,i,o){
                    spans[i].className = '';
                })
            });
        }
        share_init('.sharebox');
<?php } ?>
        //show mobile phone
        var singlemobile = document.querySelector('.contact .telegram');
        if(singlemobile)
            document.querySelector('.top-contact .mobile').innerHTML = singlemobile.innerHTML;
        else{
            var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
            document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(',');
        }
        var singleemail = document.querySelector('.contact .email');
        if(singleemail)
            document.querySelector('.top-contact .email').innerHTML = singleemail.innerHTML;
        //show whatsapp
        var whatsapps = ['8615617584955','8617839193601'];
        var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
        var walink = 'https://wa.me/'+waid+"?text="+escape('Please send me detail info and quote of this machine');
        var wabox = document.createElement('div');
        wabox.className = 'chat-wa';
        wabox.innerHTML = '<img src="<?php dminfo('template_url')?>images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp Us</span>';
        wabox.addEventListener('click', function(){
            window.open(walink); 
            gtag('event', 'conversion', {'send_to': 'AW-918898170/BVb5CJaW0c0BEPqLlbYD'});
            gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-9', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
        });
        document.body.appendChild(wabox);
    })();
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>