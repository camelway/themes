<div class="container breadcrumb"><?php breadcrumb_nav();?></div>
<div class="container main">
    <div class="content">
        <h1><?php the_subtitle();?></h1>
        <div class="head">
            <div class="pubinfo">
                <span class="pubdate"><?php the_time('Y-m-d');?></span>
                <span class="viewed"><?php echo intval(get_the_meta('viewed')) + 1?></span>
                <a href="#author" class="author"><?php the_author()?></a>
            </div>
            <div class="score"><?php the_ratingValue()?></div>
        </div>
        <div class="gallery-slider">
            <span class="ctr-btn prev" role="button"></span>
            <span class="ctr-btn next" role="button"></span>
            <figure></figure>
        </div>
        <script>
<?php
$images = array();
while(have_images('gallery')){
    the_image();
    $image = get_the_image_link();
    list($width, $height) = get_image_size($image);
    $images[] = array('link'=>$image,'title'=>get_the_image_title(),'description'=>get_the_image_description(), "width"=>$width, "height"=>$height);
}
?>
        (function(){
            var gallery_images = <?php echo json_encode($images)?>;
            var gallery_count = gallery_images.length;
            var index = window.location.hash.match(/\d+/) ? (parseInt(window.location.hash.match(/\d+/)) -1 ) % gallery_images.length : 0;
            var figure = document.querySelector('.gallery-slider figure');
            var loading = new Image();
            loading.src = "<?php dminfo('template_url')?>images/loading.gif";
            loading.width = 50;
            loading.height = 50;
            function showimage(index){
                index = index % gallery_count;
                var imageobj = gallery_images[index];
                var title = imageobj.title;
                var description = imageobj.description;
                var width = imageobj.width;
                var height = imageobj.height;
                var src = imageobj.link;
                if(!supportwebp){
                    src = "<?php dminfo('ajax_url')?>?action=modifyimg&f="+encodeURIComponent(src)+"&type=jpg";
                }
                figure.innerHTML = '';
                figure.style.height = height/(width/figure.offsetWidth)+'px';
                figure.appendChild(loading);
                loading.style.marginTop = height/(width/figure.offsetWidth)/2-25+'px';
                var img = new Image();
                img.src = src;
                img.onload = function(){
                    figure.removeChild(loading);
                    figure.innerHTML = '<img src="'+src+'" alt="'+title+'" with="'+width+'" height="'+height+'"><figcaption>'+description+'</figcaption>';
                    window.location.hash = "#"+(index+1);
                };
                img.onerror = function(){
                    figure.removeChild(loading);
                    window.location.hash = "#"+(index+1);
                };
            }
            document.querySelector('.gallery-slider').addEventListener('click', function(e){
                var target = e.target || window.event.srcElement;
                if(target.nodeName != 'SPAN'){
                    return;
                }
                if(target.classList.contains('prev')){
                    index--;
                }else if(target.classList.contains('next')){
                    index++;
                }
                if(index < 0){
                    index = gallery_count - 1;
                }
                if(index >= gallery_count){
                    index = 0;
                }
                showimage(index);
            });
            showimage(index);
        })(document);
        </script>
        <div class="entry-content">
            <?php the_content();?>
        </div>
        <div class="post-tags"><?php the_tags('', ' ');?></div>
        <div class="rate-share">
            <?php get_template_part('widget', 'rate');?>
            <?php get_template_part('widget', 'share');?>
        </div>
        <div class="post-pagination">
            <span>Keyingi: <?php next_post_link();?></span>
            <span>Oldingi: <?php previous_post_link();?></span>
        </div>
        <?php get_template_part('widget', 'form')?>
        <?php get_template_part('widget', 'author')?>
        <?php get_template_part('widget', 'related-machines')?>
    </div>
    <?php get_sidebar();?>
    <div class="clearfix"></div>
</div>
