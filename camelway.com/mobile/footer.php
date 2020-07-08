<div class="wrap footer">
    <div class="container">
        <span class="copy">&copy; Camelway Machinery Manufacture Co., Ltd.</span>
    </div>
</div>
<div class="contactbtn">
    <ul>
        <li class="icon-tel"><a href="https://wa.me/8618838109566?text=Please%20Send%20me%20your%20best%20quotation" class="c-whatsapp">&#xe9c4;</a></li>
        <li class="icon-sms"><a href="mailto:info@camelway.com" class="c-email">&#xe9b6;</a></li>
        <li class="icon-ke"><a href="https://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT10517310&lng=en&p=enamp" class="c-swt">&#xe9b4;</a></li>
        <li class="icon-cu"><a href="<?php the_mobile_permalink(1)?>">&#xe945;</a></li>
        <li role="button" tabindex="2" class="icon-top" on="tap:top.scrollTo(duration=200)">&#xe9df;</li>
    </ul>
</div>
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
    "vars" : {
    "gtag_id": "UA-75819314-1",
        "config" : {
        "UA-75819314-1": { "groups": "default" }
            }
        },
        "triggers": {
            "whatsappclick" : {
                "on": "click",
                "selector": ".c-whatsapp",
                "request": "event",
                "vars": {
                    "event_name": "沟通",
                    "event_category": "whatsapp",
                    "event_label": "着陆页:<?php dm_mobile_url();?>"
                }
            },
            "emailclick" : {
                "on": "click",
                "selector": ".c-email",
                "request": "event",
                "vars": {
                    "event_name": "沟通",
                    "event_category": "发送邮件",
                    "event_label": "着陆页:<?php dm_mobile_url();?>"
                }
            },
            "swtclick" : {
                "on": "click",
                "selector": ".c-swt",
                "request": "event",
                "vars": {
                    "event_name": "沟通",
                    "event_category": "商务通",
                    "event_label": "着陆页:<?php dm_mobile_url();?>"
                }
            },
            "gotop" : {
                "on": "click",
                "selector": ".icon-top",
                "request": "event",
                "vars": {
                    "event_name": "浏览",
                    "event_category": "返回顶部",
                    "event_label": "着陆页:<?php dm_mobile_url();?>"
                }
            },
            "formsubmit": {
                "on": "amp-form-submit-success",
                "request": "event",
                "vars": {
                    "event_name": "沟通",
                    "event_category": "留言",
                    "event_label": "着陆页:<?php dm_mobile_url();?>"
                }
            }
        }
    }
</script>
</amp-analytics>
<amp-analytics type="googleadwords" data-credentials="include">
<script type="application/json">
  {
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
