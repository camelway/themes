(function(baseurl){
    var whatsapps = ['998908053999','998900085888'];
    var waid = whatsapps[Math.floor(Math.random()*whatsapps.length)];
    var walink = 'https://wa.me/'+waid+"?text="+escape(window.location.href);
    var wabox = document.createElement('div');
    wabox.className = 'chat-wa';
    wabox.innerHTML = '<img src="'+baseurl+'/images/whatsapp.png" alt="chat" title="Whatsapp US"><span>Whatsapp Us</span>';
    wabox.addEventListener('click', function(){
        window.open(walink); 
        gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'opentelegram', {'send_to': 'UA-75819314-8', 'event_category': 'click whatsapp', 'event_label': 'open ' + waid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(wabox);

    var telegrams = ['camelwaydennis', 'camelwayCHAO'];
    var tid = telegrams[Math.floor(Math.random()*telegrams.length)];
    var tlink = 'https://t.me/'+tid;
    var tbox = document.createElement('div');
    tbox.className = 'chat-tg';
    tbox.innerHTML = '<img src="'+baseurl+'/images/telegram.svg" alt="chat" title="Телеграмма Нас"><span>Telegram Us</span>';
    tbox.addEventListener('click', function(){
        window.open(tlink); 
        gtag('event', 'conversion', {'send_to': 'AW-663867645/elhNCLTv5sUBEP2hx7wC'});
        gtag('event', 'opentelegram', {'send_to': 'UA-75819314-8', 'event_category': 'click telegram', 'event_label': 'open ' + tid + ' in '+escape(window.location.href)});
    });
    document.body.appendChild(tbox);
})(templateurl);
