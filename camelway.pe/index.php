<?php get_header(); ?>
<div class="container welcome">
    <div class="company">
        <img src="<?php dminfo('template_url')?>images/camelway-china.jpg" alt="Camelway Sudamérica</">
        <em>Camelway Sudamérica</em>
        <p>Camelway es una empresa con sede en China, comprometida con la fabricación y el suministro de mejor maquinaria de construcción para los clientes de todo el mundo. Ahora, hemos comenzado a hacer negocios en el continente de América del Sur.</p>
    </div>

    <div class="banner">
        <ul class="images">
            <li><a href="<?php the_category_link(1);?>"><img src="<?php dminfo('template_url')?>/images/banner1.jpg" alt="<?php the_category_name(1);?>"></a></li>
            <li><a href="<?php the_category_link(2);?>"><img src="<?php dminfo('template_url')?>/images/banner2.jpg" alt="<?php the_category_name(2);?>"></a></li>
            <li><a href="<?php the_category_link(5);?>"><img src="<?php dminfo('template_url')?>/images/banner3.jpg" alt="<?php the_category_name(5);?>"></a></li>
        </ul>
        </ul>
        <ul class="text">
            <li>¡QUERIDOS SOCIOS! ¡ESTAMOS LISTOS PARA ASESORARTE EN CUALQUIER TIPO DE COMPONENTES PARA PLANTAS DE HORMIGÓN, DEJE LA APLICACIÓN Y NUESTROS ESPECIALISTAS LE DEVOLVERÁN EN EL TIEMPO MÁS CORTO!</li>
            <li>Vendemos varios mezcladores de concreto, incluyendo mezcladores de concreto de doble eje, mezcladores de concreto por gravedad, mezcladores de concreto de mezcla forzada, mezcladores de concreto y mezcladores de concreto con bombas.</li>
            <li>Camelway ofrece una amplia gama de equipos para procesar barras de refuerzo, incluidas máquinas para doblar barras de refuerzo, máquinas para cortar barras de refuerzo, máquinas para moldear barras de refuerzo, máquinas para conectar barras de refuerzo y máquinas para pretensar barras de refuerzo, etc.</li>
            
        </ul>
    </div>
</div>

<div class="container index-product-showroom">
    <h1>Productos calientes</h1>
    <ul class="showroom">
<?php
$cs = get_categories(array('exclude'=>array(6,7)));
foreach($cs as $c){
?>
        <li>
            <div class="thumbnail">
             <a href="<?php echo $c->get_permalink();?>"><img src="<?php echo $c->cat_thumbnail;?>" alt="<?php echo $c->cat_name;?>"></a>
            </div>
            <div class="description">
                <h2><a href="<?php echo $c->get_permalink()?>"><?php echo $c->cat_name;?></a></h2>
                <p><?php echo dm_trim_words($c->cat_description, 300);?></p>
                <a href="<?php echo $c->get_permalink()?>" class="more">Aprende más</a>
                <a href="<?php echo $c->get_permalink()?>#feedback" class="inquiry">Solicitud de precio</a>
            </div>
        </li>
<?php } 
?>
    </ul>

</div>

<div class="container full-feedback">
<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Presupuesto gratis</p>
        <p class="slogan">Estamos en Lima y somos fabricantes.</p>
        <p class="description">Los expertos del departamento de ventas de fábrica de Camelway responderán todas sus preguntas de lunes a domingo de 06:00 a 20:00 (hora de Lima).</p>
        <p><input type="text" name="user_name" placeholder="Tu nombre" required></p>
        <p><input type="text" name="user_mobile" placeholder="Su numero de telefono"></p>
        <p><input type="text" name="content" placeholder="Ingrese los detalles de su solicitud" required></p>
        <p><input type="submit" value="Solicitar una oferta"></p>
        <input type="hidden" name="lang" value="es">
    </form>
    <p>CAMELWAY se encuentra en Lima y se especializa en proporcionar maquinaria y equipos de construcción de alta calidad a los usuarios de Lima. ¡Bienvenido a consultar!</p>
</div>
    <?php get_template_part('map');?> 
    <div class="clearfix"></div>
</div> 

<div class="index-footer">
    <div class="container">
        <div class="foot-logo">
            <img src="<?php dminfo('template_url')?>/images/foot-logo.png" alt="camelway">
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y')?> CAMELWAY CHINA |<a href="https://www.camelway.co.za/concrete-batching-plant/">Concrete Batching Plant</a>|<a href="https://www.camelway.sn/centrale-a-beton/">Centrale à Béton</a>|<a href="https://www.camelway.uz/byetohhiye-zavodi/">бетонный завод</a>|<a href="https://www.camelway.ph/concrete-batching-plant/">Concrete Batching Plant Philippines</a>|<a href="https://www.camelway.lk/concrete-batching-plant/">Concrete Batching Plant Sri Lanka</a></p>
        </div>
    </div>
</div>
<script src="<?php dminfo('template_url');?>jquery-3.4.1.min.js"></script>
<script>
$(function(){
    var banner_imgs = $('.banner .images li');
    var banner_txts = $('.banner .text li');
    var index = 0;
    function play(index){
        banner_imgs.eq(index).siblings().fadeOut(300, function(){
             banner_imgs.eq(index).fadeIn(10);
        });
        banner_txts.eq(index).siblings().fadeOut(200, function(){
            banner_txts.eq(index).fadeIn(20);
        });
        setTimeout(function(){
            index++;
            if(index==banner_imgs.length)
                index = 0;
            play(index);
        }, 5000);
    }
    play(index);
});
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75819314-8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-75819314-8');
    gtag('config', 'AW-701339815');
</script>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '473483456591431');
fbq('track', 'PageView');
</script>
<script type="text/javascript" >
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
ym(56097448, "init", {
    clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
});
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
var whatsapps = ['8615981847002'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid;
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="https://www.camelway.pe/dm-content/themes/hi-domai/images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp US</span>';
    wabox.addEventListener('click', function(){
        window.open(walink); 
        //gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'openwhatsapp', {'send_to': 'UA-75819314-8', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56097448" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=473483456591431&ev=PageView&noscript=1"/></noscript>
</body>
</html>