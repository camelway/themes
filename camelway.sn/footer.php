
<footer id="footer">
<div id="footer-widgets" class="container style-1">
<div class="row">
<div class="col-md-4">
<div class="widget widget_text">
<h2 class="widget-title"><span>À Propos de Nous</span></h2>
<div class="textwidget">
Fondée en 1983, <a href="/a-propos-de-nous-.html" title="À propos de nous">Henan Camelway Machinery Manufacture Co., Ltd.</a> est principalement engagée dans la R&D et la fabrication d'équipements de haute technologie, tels que les équipements de construction et de concassage, ainsi que dans la fourniture de solutions techniques et de produits de support.
</div>
</div>
</div>
<div class="col-md-4">
<div class="widget widget_links">
<h2 class="widget-title"><span>Produits chauds</span></h2>
<ul class="wprt-links clearfix col2">
<li class="style-2"><a href="/centrale-a-beton/centrale-a-beton-fixe.html">Centrale à Béton fixe</a></li>
<li class="style-2"><a href="/centrale-a-beton/centrale-a-beton-mobile.html">Centrale à béton mobile</a></li>
<li class="style-2"><a href="/betonniere/jzc-betonniere.html">JZC bétonnière</a></li>
<li class="style-2"><a href="/betonniere/auto-betonniere-de-chargement.html">Auto bétonnière auto chargeuse</a></li>
<li class="style-2"><a href="/pondeuse-a-brique/ligne-de-production-de-parpaing.html">Ligne de production de parpaing</a></li>
<li class="style-2"><a href="/livraison-du-beton/camion-toupie.html">Camion-toupie</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="widget widget_information">
<h2 class="widget-title"><span>Coordonnées</span></h2>
<div>
<a href="/"><div itemprop="name"><strong>CAMELWAY Centrales à Béton &amp; Concasseurs</strong></div>
</a>
<div>
<strong>Siège Social et Usine 1 : </strong><span>500 mètres au nord de la jonction de Beltway sur la route de Zhengshang,Zhengzhou city.</span>
<br>
</div>
<div>
<strong>Usine 2 : </strong><span>Kexue Av. Miaowang Road, Zhengzhou city. No 62</span>.<br>
</div>
<strong>Téléphone : </strong><span><a href="tel:008613938693680">+86 13938693680</a></span><br>
<strong>Email : </strong><span><a href="mailto:camelwayltd@gmail.com">camelwayltd@gmail.com</a></span><br>
</div></div><div class="widget widget_spacer">
<div class="wprt-spacer clearfix" style="height:10px"></div>
</div>
<div class="widget widget_spacer">
<div class="wprt-spacer clearfix" style="height:10px"></div>
</div>
</div>
</div>
</div>
<div class="footer-menu footer-4-icons footer-menu-center-icon">
<a href="tel:008618337127913"><i class="fa fa-mobile" style="color:white"></i><span>Appelez-Nous</span></a>
<a href="/"><i class="fa fa-whatsapp" style="color:white"></i><span>WHATSAPP</span></a>
<a href="/"><i class="fa fa-volume-control-phone" style="color:white"></i><span>VİBER</span></a>
<a href="/"><i class="fa fa-comments-o" style="color:white"></i><span>Bavarder</span></a>
<div class="clear"></div>
</div>
</footer>

<div id="bottom" class="clearfix style-1">
<div id="bottom-bar-inner" class="wprt-container">
<div class="bottom-bar-inner-wrap">
<div class="bottom-bar-content">
<div id="copyright">Tous Droits Réservés Copyright© 2020 <a href="/">CamelWay</a>.
</div>
</div>
<div class="bottom-bar-menu">
<ul class="bottom-nav">
<li><a href="/questions-et-reponses/" title="Questions & Réponses">Q&R</a></li>
<li><a href="/galerie/" title="Galerie">Galerie</a></li>
<li><a href="/a-propos-de-nous-.html" title="À propos de nous">À propos de nous</a></li>
<li><a href="/privacy-policy-.html">Privacy Policy</a></li>
<li><a href="/terms-of-use-.html">Terms of Use</a></li>
<li><a href="/sitemap.xml">Sitemap</a></li>
</ul>
</div>
</div>
</div>
</div>
</section></div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-11"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-918898170');
  gtag('config', 'UA-75819314-11');
</script>
<script>
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
    var content = obj.content.innnerText || obj.content.value;
    if(content !=''){
        content += "\n\n Landing Page: "+get_landing_page();
    }
    var ajaxurl = obj.action+"?format=json";
    var data = "user_name="+encodeURIComponent(user_name)+"&user_mobile="+encodeURIComponent(user_mobile)+"&content="+encodeURIComponent(content);
    var xhr = new XMLHttpRequest();
    xhr.open("POST",ajaxurl,true);
    xhr.send(data);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var data = JSON.parse(xhr.responseText);
            if(data.error_code == 200){
               gtag('event', 'conversion', {'send_to': 'AW-663867645/ER-nCJPG9cUBEP2hx7wC'});
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

var singlemobile = document.querySelector('.contact .telegram');
if(singlemobile)
document.querySelector('.top-contact .mobile').innerHTML = singlemobile.innerHTML;
var singleemail = document.querySelector('.contact .email');
if(singleemail)
document.querySelector('.top-contact .email').innerHTML = singleemail.innerHTML;
var whatsapps = ['8613938693680'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid;
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="https://www.camelway.sn/dm-content/themes/hi-domai/images/whatsapps.png" alt="chat" title="Whatsapp US"><span>Whatsapp US</span>';
    wabox.addEventListener('click', function(){
        window.open(walink); 
        gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-11', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);
</script>

