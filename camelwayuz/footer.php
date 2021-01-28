<div class="wrap footer">
    <div class="container">
        <div class="company-links">
            <img src="<?php dminfo('template_url')?>images/camelway-logo.png" al="ИП CAMELWAY CHINA" width="275" height="50">
            <div class="social-links">
                <a href="https://www.facebook.com/camelway/" rel="nofollow" target="_blank" class="facebook">Facebook</a>
                <a href="https://www.pinterest.com/camelwaygroup/" rel="nofollow" target="_blank" class="pinterest">Pinterest</a>
                <a href="https://www.linkedin.com/company/camelway/" rel="nofollow" target="_blank" class="linked">Linkedin</a>
                <a href="https://twitter.com/camelway_group" rel="nofollow" target="_blank" class="twitter">Twitter</a>
                <a href="https://www.youtube.com/channel/UCisCm9pYJtqHX9Vz6WOPPRg" rel="nofollow" target="_blank" class="youtube">Youtube</a>
            </div>
        </div>
        <div class="cagegory">
            <h4>Mahsulot toifasi</h4>
<?php 
$cats = get_categories(array('include'=>array(1,2,3,4,5,6,7)));
foreach($cats as $cat){
    printf('<a href="%s">%s</a>', $cat->get_permalink(), $cat->cat_name);
}
?>
        </div>
        <div class="information">
            <h4>Ma'lumotlar</h4>
            <a href="<?php the_permalink(1)?>">Biz haqimizda</a>
            <a href="<?php the_permalink(2)?>">Biz bilan bog`laning</a>
            <a href="<?php the_category_link(9)?>">Maqolalar</a>
            <a href="#">Maxfiylik siyosati</a>
            <a href="<?php dminfo('sitemap_url')?>">Sitemap</a>
        </div>
        <div class="contact">
            <h4>Kontakt ma'lumotlar</h4>
            <p class="tel">Tel: +8618838109566</p>
            <p class="email">Email: sales@camelway.uz</p>
            <p class="operatinghours">Ish vaqti: Dushanbadan shanbagacha, soat 9 dan 18 gacha.</p>
        </div>
    </div>
</div>
<div class="copyright">&copy; <?php echo date('Y')?> Camelway Machinery</div>
<?php get_template_part('widget', 'float')?>
</body>
</html>
