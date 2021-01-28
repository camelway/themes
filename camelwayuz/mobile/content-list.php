<ul class="posts-list items">
<?php 
$loadurl = get_dminfo('ajax_url').'?action=loadposts';
if(is_category())
    $loadurl .= sprintf('&cat=%s', get_category_ID());
elseif(is_tag())
    $loadurl .= sprintf('&tag=%s', get_tag_ID());
elseif(is_search())
    $loadurl .= sprintf('&s=%s', get_query_var('s'));
?>
<amp-list id="item-m-list" layout="fixed-height" width="auto" height="800" load-more="auto" load-more-bookmark="next" src="<?php echo $loadurl?>">
    <template type="amp-mustache">
    <li>
{{#post_thumbnail}}
        <div class="thumbnail"><a href="{{mobile_permalink}}"><amp-img layout="responsive" src="{{post_thumbnail}}" srcset="{{post_thumbnail_srcset}}" alt="{{post_subtitle}}" width="300" height="175"><amp-img fallback layout="intrinsic" src="{{post_thumbnail_fallback}}" alt="{{post_subtitle}}" width="300" height="175"></amp-img></amp-img></a></div>
{{/post_thumbnail}}
        <div class="info">
            <h3><a href="{{mobile_permalink}}">{{post_subtitle}}</a></h3>
            <div class="pubinfo">
                <span class="pubdate">{{post_datetext}}</span>
                <span class="viewed">{{viewed}}</span>
            </div>
            <p>{{post_excerpt}}</p>
        </div>
    </li>
    </template>
</amp-list>
</ul> 
