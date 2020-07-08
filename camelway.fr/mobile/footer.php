<footer class="wrap">
    &copy;<?php echo date('Y')?> Camelway Machinery <div class="links"><a href="https://www.camelway.fr/centrale-a-beton/">Centrale à Béton</a></a>
</footer>
<div class="chat-wa">
    <a href="https://wa.me/8618838109566?text=Please%20Send%20me%20your%20best%20quotation" rel="nofollow" target="_blank"><amp-img src="<?php dminfo('template_url')?>images/whatsapp.png" layout="fixed" width="40" height="40"></amp-img></a>
</div>
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">{
    "vars": {
        "gtag_id": "UA-75819314-16",
        "config" : {
          "UA-75819314-9": {"groups": "default"}
        }
    },
    "triggers": {
        "chatonline" : {
            "on": "click",
            "selector": ".chat-wa",
            "request": "event",
            "vars": {
                "event_name": "Chat",
                "event_category": "whatsapp",
                "event_label": "camelway"
            }
        }
    }
}
</script>
</amp-analytics>
<amp-analytics type="googleadwords" data-credentials="include">
<script type="application/json">{
    "triggers": {
        "onVisible": {
        "on": "visible",
        "request": "remarketing"
        }
    },
    "vars": {
        "googleConversionId": "AW-918898170/qNZgCIL0kXQQ-ouVtgM",
        "googleRemarketingOnly": "true"
    }
}
</script>
</amp-analytics>
</body>
</html>
