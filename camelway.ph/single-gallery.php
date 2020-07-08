<?php get_header();?>
<div class="container single single-gallery">
    <div class="main">
        <div class="breadcrumb"> <?php the_breadcrumblist();?></div>
        <h1><?php the_subtitle()?></h1>
        <div class="pubmeta"><span class="author"><?php the_author()?></span> posted this album in <span class="date" pubdate="<?php the_time('Y-m-d H:i:s');?>"><?php the_time('F d, Y');?></span></div>
        <div class="content">

        <div class="showroom">
            <span class="prev">〈</span>
<?php
$i = 1;
$images = array();
while(have_images('gallery')){
    the_image();
    if($i == 1){
?>
            <div class="viewport">
                <div class="image">
                    <img src="<?php the_image_link()?>" alt="<?php the_image_title()?>">
                    <span class="counter">1/<?php echo found_post_images('gallery');?></span>
                </div>
                <p><?php the_image_description()?></p>
            </div>
            <span class="next">〉</span>
<?php
    }
        $images[] = array('link'=>get_the_image_link(),'title'=>get_the_image_title(),'description'=>get_the_image_description());
    $i++;
} 
?>
        </div>
        <script>
        <?php echo "var images = ".json_encode($images).";";
        ?>
        var index = window.location.hash.match(/\d+/) ? (parseInt(window.location.hash.match(/\d+/)) -1 ) % images.length : 0;
        var loading = new Image();
        loading.src = "<?php dminfo(template_url)?>images/loading.gif";
        loading.width = "50";
        loading.height = "50";
        function imageshow(index){
            var count = images.length;
            var imageobj = images[index];
            var src = imageobj.link;
            if(!supportwebp)
                src = "<?php dminfo('ajax_url')?>?action=webp2jpg&f="+escape(src);
            var title = imageobj.title;
            var description = imageobj.description;
            var img = new Image();
            img.src = src;
            var loadingbox = document.createElement('div');
            loadingbox.style.position = 'absolute';
            loadingbox.style.top = '0px';
            loadingbox.style.right = '0px';
            loadingbox.style.bottom = '0px';
            loadingbox.style.left = '0px';
            loadingbox.style.textAlign = 'center';
            loadingbox.style.margin = '0';
            loadingbox.style.backgroundColor = 'rgba(0,0,0,.6)';
            loadingbox.style.display = 'flex';
            loadingbox.style.alignItems = 'center';
            loadingbox.style.justifyContent = 'center';
            loadingbox.appendChild(loading);
            document.querySelector('.viewport .image').appendChild(loadingbox);

            var imgparent = document.querySelector('.viewport');
            img.onload = function(){
                imgparent.querySelector('img').src = src;
                imgparent.querySelector('img').alt = title;
                imgparent.querySelector('.counter').innerHTML = (index+1)+'/'+count;
                imgparent.querySelector('p').innerHTML = description;
                document.querySelector('.viewport .image').removeChild(loadingbox);
                window.location.hash = "#"+ (index+1);
            }
            img.onerror = function(){
                imgparent.querySelector('img').src = src;
                imgparent.querySelector('img').alt = title;
                imgparent.querySelector('.counter').innerHTML = (index+1)+'/'+count;
                imgparent.querySelector('p').innerHTML = description;
                document.querySelector('.viewport .image').removeChild(loadingbox);
                window.location.hash = "#"+ (index+1);
            }
        }
        imageshow(index);
        document.querySelector('.showroom').addEventListener('click', function(){
            var target = window.event.target;
            if(target.nodeName != 'SPAN')
                return;
            if(target.className=='prev')
                index--;
            else if(target.className=='next')
                index++;
            var count = images.length;
            if(index < 0)
                index = count - 1;
            if(index >= count)
                index = 0;
            imageshow(index);
        });
        </script>
        <div class="text">
            <?php the_content();?>
        </div>
        <div class="post_nav">
            <p>Privious: <?php previous_post_link();?></p>
            <p>Next: <?php next_post_link();?></p>
        </div>
        </div>
        <?php get_template_part('feedback');?>
        <?php //get_template_part('map');?>
    </div>
    <div class="aside">
        <?php get_sidebar();?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();

