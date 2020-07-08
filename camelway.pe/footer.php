<div class="footer">
<div class="container">
    <div class="foot-logo">
        <img src="<?php dminfo('template_url')?>images/foot-logo.png" alt="camelway">
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y')?> CAMELWAY CHINA </p>
    </div>
</div>
</div>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-75819314-10');
  gtag('config', 'AW-801325996');
    (function(){
        function supportwebp() {
            var elem = document.createElement('canvas');
            if (!!(elem.getContext && elem.getContext('2d'))) {
                return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;
            }
            return false;
        }
        if(supportwebp()) return;
            var images = document.querySelectorAll('img');
            for(var i in images){
                var originsrc = images[i].src;
                if(originsrc && originsrc.substr(-5) == '.webp' && ( originsrc.substr(0, 24) == 'https://www.camelway.pe/' || originsrc.substr(0,1) == '/')){
                    images[i].src = 'https://www.camelway.pe/dm-ajax.php?action=webp2jpg&f='+encodeURIComponent(originsrc);
                }
            }
    })();
    if (!String.prototype.trim) {
      String.prototype.trim = function () {
        return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
      };
    }
    if(getCookie('camelwayuzinitpage') == false){
        setCookie('camelwayuzinitpage', window.location.href, 864000);
    }
    function get_landing_page(){
        var landingpage = getCookie('camelwayuzinitpage');
       return landingpage;
    }
    function ajax_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var content = obj.content.innnerText || obj.content.value;
        if(content !=''){
            content += "\n\n Landing Page: "+get_landing_page();
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
                   gtag('event', 'conversion', {'send_to': 'AW-801325996/pGxsCPGKjYQBEKyHjf4C'});
                }
               alert(data.error_message);
            }
        }
        return false;
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
        if(window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)){
            var domain = window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)[0];
        }else{
            var domain = window.location.hostname;
        }
        document.cookie = name+"="+escape(value)+";expires="+cdate.toUTCString()+";domain="+domain+";path=/";
    }

    var topmobile = document.querySelector('.top-contact .mobile').innerHTML;
    document.querySelector('.top-contact .mobile').innerHTML = topmobile.split(',').sort(function(){return Math.random() - 0.5}).slice(0,2).join(',');
    var whatsapps = ['8615036199932','8615515808851'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid+"?text="+escape('Please send me detail info and quote of this machine');
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="https://www.camelway.pe/dm-content/themes/hi-domai/images/whatsapp.png" alt="chat" title="Whatsapp Us"><span>Whatsapp Us</span>';
    wabox.addEventListener('click', function(){
        window.open(walink); 
        //gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-8', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);
</script>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=473483456591431&ev=PageView&noscript=1"/></noscript>
</body>
</html>
