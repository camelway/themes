<div class="footer">
<div class="container">
    <div class="foot-logo">
        <img src="<?php dminfo('template_url')?>images/foot-logo.png" alt="camelway">
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y')?> Camelway Machinery</p>
    </div>
</div>
</div>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
    gtag('config', 'UA-75819314-14');
    gtag('config', 'AW-663867645');

    !function(f,b,e,v,n,t,s){
        if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)
    }(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '418256865395733');
    fbq('track', 'PageView');

    if (!String.prototype.trim) {
      String.prototype.trim = function () {
        return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
      };
    }
    function getCookie(name){
        if(document.cookie.length == 0 )
            return false;
        var start = document.cookie.indexOf(name+"=");
        if(start == -1)
            return false;
        var last = document.cookie.substr(start + name.length +1 );
        var end = last.indexOf(';');
        return unescape(last.substr(0, end));
    }
    function setCookie(name, value, expires){
        var cdate = new Date();
        cdate.setTime(cdate.getTime() + expires*1000);
        var domain = window.location.hostname;
        document.cookie = name+"="+escape(value)+";expires="+cdate.toUTCString()+";domain="+domain+";path=/";
    }
    if(getCookie('camelwayinitpage') == false){
        setCookie('camelwayinitpage', window.location.href, 604800);
    }
    function get_landing_page(){
       return getCookie('camelwayinitpage') || window.location.href;
    }
    function ajax_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var content = obj.content.innnerText || obj.content.value;
        if(content !=''){
            content += "\n\nLanding Page: "+get_landing_page();
        }
        var ajaxurl = obj.action+"?format=json";
        var data = "user_name="+encodeURIComponent(user_name)+"&user_mobile="+encodeURIComponent(user_mobile)+"&user_email="+encodeURIComponent(user_email)+"&content="+encodeURIComponent(content);
        var xhr = new XMLHttpRequest();
        xhr.open("POST",ajaxurl,true);
        xhr.send(data);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var data = JSON.parse(xhr.responseText);
                if(data.error_code == 200){
                    //google conversion
                    gtag('event', 'conversion', {'send_to': 'AW-663867645/ER-nCJPG9cUBEP2hx7wC'});
                    //facebook conversion
                    fbq('track', 'Lead');
                }
               alert(data.error_message);
            }
        }
        return false;
    }
    (function(){
        if(!supportwebp){
            var images = document.querySelectorAll('img');
            for(var i in images){
                var originsrc = images[i].src;
                if(originsrc && originsrc.substr(-5) == '.webp' && ( originsrc.substr(0, 24) == 'https://www.camelway.lk/' || originsrc.substr(0,1) == '/')){
                    images[i].src = 'https://www.camelway.lk/dm-ajax.php?action=webp2jpg&f='+encodeURIComponent(originsrc);
                }
            }
        }
<?php if(is_single() && in_category(array(1,2,3,4,5,6,7))) { ?>
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
        var whatsapps = ['8615617584955','8617839193601', '8617739794239'];
        var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
        var walink = 'https://wa.me/'+waid+"?text="+escape('Please send me detail info and quote of this machine');
        var wabox = document.createElement('div');
        wabox.className = 'chat-wa';
        wabox.innerHTML = '<img src="<?php dminfo('template_url')?>images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp US</span>';
        wabox.addEventListener('click', function(){
            window.open(walink);
            gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
            gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-17', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
        });
        document.body.appendChild(wabox);
    })();
</script>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418256865395733&ev=PageView&noscript=1"/></noscript>
</body>
</html>
