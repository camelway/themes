<div class="wrap content-section related-machines" id="related">
    <div class="headline">
        <h2 class="title">Tegishli mahsulotlar</h2>
        <span class="more refresh" role="button" on="tap:item-m-list.refresh" tabindex="1"></span>
    </div>
    <ul class="items">
<amp-list id="item-m-list" layout="fixed-height" width="auto" height="200" src="<?php dminfo('ajax_url')?>?action=loadposts&cat=1,2,3,4,5,6,7&count=6&orderby=rand">
    <template type="amp-mustache">
        <li>
            <a href="{{mobile_permalink}}"><amp-img src="{{post_thumbnail}}" srcset="{{post_thumbnail_srcset}}" alt="{{post_subtitle}}" layout="responsive" width="300" height="175"><amp-img fallback layout="intrinsic" src="{{post_thumbnail_fallback}}" alt="{{post_subtitle}}" width="300" height="175"></amp-img></amp-img></a>
            <h3>{{post_subtitle}}</h3>
        </li>
    </template>
</amp-list>
    </ul>
</div>
