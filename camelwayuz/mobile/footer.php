<div class="wrap footer">
    <div class="container">
        &copy;<?php echo date('Y')?> Camelway
    </div>
</div>
<?php get_template_part('widget', 'float');?>
<?php if(is_single()){?>
<amp-pixel src="<?php dminfo('ajax_url')?>?action=viewed&id=<?php the_ID()?>" layout="nodisplay" referrerpolicy="no-referrer"></amp-pixel>
<?php }?>
<amp-analytics type="facebookpixel" id="facebook-pixel">
<script type="application/json">
{
    "vars": {
        "pixelId": "<?php echo get_option('facebook_pixel')?>"
    },
    "triggers": {
        "trackPageview": {
            "on": "visible",
            "request": "pageview"
        }
    }
}
</script>
</amp-analytics>
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
  "vars" : {
    "gtag_id": "<?php echo get_option('google_ga')?>",
    "config" : {
      "<?php echo get_option('google_ga')?>": { "groups": "default" }
    }
  }
}
</script>
</amp-analytics>
</body>
</html>
