<div class="wrap overview">
    <div class="container">
        <div class="headline">
            <h1 class="title"><?php the_subtitle()?></h1>
            <?php get_template_part('widget', 'share')?>
        </div>
        <div class="head">
            <div class="thumbnail">
                <img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" <?php the_srcset(get_the_thumbnail());?> width="600" height="350">
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
                    <div class="stars"><span data-score="1" data-tips="No Interest"></span><span data-score="2" data-tips="A Little Interest"></span><span data-score="3" data-tips="How Much?"></span><span data-score="4" data-tips="Planning to buy"></span><span data-score="5" data-tips="Need It Now"></span></div>
                    <span class="tips"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container main">
    <div class="content">
        <ul class="product-navs">
            <li class="selected"><a href="#introduction">Mahsulotni tanishtirish</a></li>
<?php if(get_the_data('specification')){?>
            <li><a href="#specification">Texnik spetsifikatsiya</a></li>
<?php } ?>
            <li><a href="#quote">Iqtibosni oling</a></li>
            <li><a href="#related">Tegishli mahsulotlar</a></li>
        </ul>
        <div class="entry-content" id="introduction">
            <div class="gallery">
<?php
while(have_images('gallery')){
    the_image();
    $img =  get_the_image_link();
    $thumbnail = get_the_image_thumbnail();
    $thumbnail = empty($thumbnail) ? $img : $thumbnail;
?>
                <figure>
                    <a href="<?php echo $img;?>" target="_blank"><img src="<?php echo $thumbnail;?>" <?php the_srcset($thumbnail);?> alt="<?php the_image_title()?>" width="600" height="350"></a>
                    <figcaption><?php the_image_description()?></figcaption>
                </figure>
<?php } ?>
            </div>
            <?php the_content();?>
        </div>
<?php if(get_the_data('specification')){?>
        <div class="entry-content" id="specification">
            <?php the_data('specification');?>
        </div>
<?php } ?>
        <?php get_template_part('widget', 'form');?>
        <?php get_template_part('widget', 'related-machines');?>
    </div>
    <?php get_sidebar()?>
    <div class="clearfix"></div>
</div>
