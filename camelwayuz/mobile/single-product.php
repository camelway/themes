<div class="wrap overview">
    <div class="container">
        <div class="headline">
            <h1 class="title"><?php the_subtitle()?></h1>
        </div>
        <div class="head">
            <div class="thumbnail">
                <amp-img src="<?php the_thumbnail()?>" <?php the_srcset(get_the_thumbnail());?> alt="<?php the_subtitle()?>" layout="intrinsic" width="600" height="350"><?php webpfallback(get_the_thumbnail(), get_the_subtitle(), 600, 350);?></amp-img>
                <span class="score"><?php the_ratingValue()?></span>
            </div>
            <div class="brief">
                <p><?php the_data('tips')?></p>
                <div class="contact">
                    <a href="tel:<?php echo str_replace(array(' ', '(', ')'), '', get_option('float_mobile'))?>" class="call">Chaqirish</a>
                    <a href="mailto:<?php echo get_option('float_email')?>" class="mail">Pochta yozing</a>
                    <a href="#quote" class="quote">Xabar QOLDIRISH</a>
                </div>
                <div class="contact-info">
                    <p class="mobile"><?php the_data('mobile')?></p>
                    <p class="email"><?php the_data('email')?></p>
                </div>
                <div class="rate">
                    <span class="prompt">How do think of this machine?</span>
                    <form method="POST" id="rating" action-xhr="<?php dminfo('ajax_url')?>?action=rating&id=<?php the_ID();?>" target="_blank">
                        <fieldset class="stars">
                            <input name="score" type="radio" id="rating5" value="5" on="change:rating.submit"><label for="rating5" title="Need It Now">&#xe926;</label>
                            <input name="score" type="radio" id="rating4" value="4" on="change:rating.submit"><label for="rating5" title="Planning to buy">&#xe926;</label>
                            <input name="score" type="radio" id="rating3" value="3" on="change:rating.submit"><label for="rating5" title="How Much?">&#xe926;</label>
                            <input name="score" type="radio" id="rating2" value="2" on="change:rating.submit"><label for="rating5" title="A Little Interest">&#xe926;</label>
                            <input name="score" type="radio" id="rating1" value="1" on="change:rating.submit"><label for="rating5" title="No Interest">&#xe926;</label>
                        </fieldset>
                        <div submit-success class="tips"><template type="amp-mustache">{{message}}</p></template></div>
                    </form>
                </div>
                <?php get_template_part('widget', 'share')?>
            </div>
        </div>
    </div>
</div>
<div class="wrap gallery">
    <amp-carousel lightbox width="600" height="350" layout="responsive" type="slides" loop>
<?php
while(have_images('gallery')){
    the_image();
    $img = get_the_image_link();
    if(empty($img)) continue;
    list($width, $height) = get_image_size($img);
?>
    <amp-img src="<?php echo $img?>" <?php the_srcset($img);?> alt="<?php the_image_title();?>" layout="responsive" width="<?php echo $width;?>" height="<?php echo $height;?>"><?php echo webpfallback($img, the_image_title(), $width, $height)?></amp-img>
<?php } ?>
    </amp-carousel>
</div>
<ul class="container product-navs">
    <li><a href="#introduction">Mahsulotni tanishtirish</a></li>
<?php if(get_the_data('specification')){?>
    <li><a href="#specification">Texnik spetsifikatsiya</a></li>
<?php } ?>
    <li><a href="#quote">Iqtibosni oling</a></li>
    <li><a href="#related">Tegishli mahsulotlar</a></li>
</ul>
<div class="container entry-content" id="introduction">
    <?php the_content();?>
</div>
<?php if(get_the_data('specification')){?>
<div class="container entry-content" id="specification">
    <?php the_data('specification');?>
</div>
<?php } ?>
<div class="container">
    <?php get_template_part('widget', 'form-map');?>
    <?php get_template_part('widget', 'related-machines');?>
</div>
