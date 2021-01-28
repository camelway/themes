<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php dm_title()?></title>
<link rel="icon" href="<?php dminfo('template_url')?>media/favicon.ico">
<link rel="apple-touch-icon-precompose" href="<?php dminfo('template_url')?>media/touch-icon.png">
<link rel="alternate" type="application/atom+xml" href="<?php dminfo('atom_url')?>">
<?php if(!is_404()){ ?>
<meta name="keywords" content="<?php dm_keywords();?>">
<meta name="description" content="<?php dm_description()?>">
<link rel="canonical" href="<?php dm_url()?>">
<link rel="alternate" hreflang="en" href="<?php dm_url();?>">
<?php
the_facebook_ogp();
the_twitter_card();
the_google_schema();
}
load_style();
?>
<?php echo get_option('gloabaljs')?>
<script>
    var supportwebp = (function(){var elem = document.createElement('canvas');if (!!(elem.getContext && elem.getContext('2d'))) {return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;}return false;})();
    var camelwaydatalayer = (function(){
        var data;
        if(!window.localStorage.getItem('camelwaydata')){
            data = {'commentsliked':Array(),'postsliked':Array(),'postsdisliked':Array(), 'entrypage': window.location.href};
            window.localStorage.setItem('camelwaydata', JSON.stringify(data));
        }else{
            data = JSON.parse(window.localStorage.getItem('camelwaydata'));
        }
        function save(){
            window.localStorage.setItem('camelwaydata', JSON.stringify(data));
        }
        function getentrypage(){
            return data.entrypage;
        }
        function isliked(postid){
            return data.postsliked.indexOf(postid) != -1;
        }
        function likepost(postid){
            if(postid && !isliked(postid)){
                data.postsliked.push(postid);
                undislikepost(postid);
            }
            save();
        }
        function unlikepost(postid){
            if(data.postsliked.indexOf(postid) == -1)
                return false;
            data.postsliked.splice(data.postsliked.indexOf(postid), 1);
            save();
        }
        function isdisliked(postid){
            return data.postsdisliked.indexOf(postid) != -1;
        }
        function dislikepost(postid){
            if(postid && !isdisliked(postid)){
                data.postsdisliked.push(postid);
                unlikepost(postid);
            }
            save();
        }
         function undislikepost(postid){
           if(data.postsdisliked.indexOf(postid) == -1)
                return false;
            data.postsdisliked.splice(data.postsdisliked.indexOf(postid), 1);
            save();
        }
        function iscommentliked(commentid){
             return data.commentsliked.indexOf(commentid) != -1;
        }
        function likecomment(commentid){
            if(commentid && !iscommentliked(commentid))
                data.commentsliked.push(commentid);
            save();
        }
        function unlikecomment(commentid){
            if(data.commentsliked.indexOf(commentid) == -1)
                return false;
            data.commentsliked.splice(data.commentsliked.indexOf(commentid), 1);
            save();
        }
        return {
            'get_entrypage': getentrypage,
            'like_post': likepost,
            'unlike_post': unlikepost,
            'dislike_post': dislikepost,
            'undislike_post': undislikepost,
            'is_liked': isliked,
            'is_disliked': isdisliked,
            'is_comment_liked': iscommentliked,
            'like_comment': likecomment,
            'unlike_comment': unlikecomment,
        }
    })();
    function share_init(wrap){
        var wrap = document.querySelector(wrap);
        if(!wrap) return;
        var aw = window.screen.availWidth;
        var ah = window.screen.availHeight;
        var width,height,top,left;
        if(aw>1200){
            width = 800;
        }else if(aw>800){
            width = 600;
        }else{
            width = aw;
        }
        if(ah>800){
            height = 500;
        }else{
            height = ah;
        }
        top = ah/2 - height/2;
        left = aw/2 - width/2;
        wrap.addEventListener('click', function(e){
            var target = e.target || window.event.srcElement;
            var href = target.getAttribute('href');
            if(href){
                window.open(href, '_blank', 'width='+width+',height='+height+',left='+left+',top='+top+',location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');
            }
            e.preventDefault();
            return false;
        }, false);
    }
    function async_request(args){
        var url = args.url;
        var method = args.method || 'GET';
        var data = args.data || '';
        var callback = args.callback || '';
        var encodeddata = '';
        for(var i in data){
            encodeddata += encodeURIComponent(i)+"="+encodeURIComponent(data[i])+"&";
        }
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.send(encodeddata.substr(0, encodeddata.length-1));
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                if(callback)
                    callback(xhr.responseText);
            }
        }
    }
    function async_submit(obj){
        var user_name = obj.user_name.value.trim();
        var user_mobile = obj.user_mobile.value.trim();
        var user_email = obj.user_email.value.trim();
        var company =  obj.company ? obj.company.value.trim() : '';
        var content = obj.content.innnerText || obj.content.value;
        var post_id = obj.post_ID ? obj.post_ID.value : 0;
        if(company !='' )
            content += "\r\nCompany: "+company;
        if(content !='')
            content += "\n\nLanding Page: " + get_landing_page();

        var ajaxurl = obj.action+"?format=json";
        var doingajax = document.createElement('div');
        doingajax.className = 'doing-submit';
        obj.appendChild(doingajax);
        obj.submit.setAttribute('disabled', true);
        async_request({
            'method': "POST",
            'url': ajaxurl,
            'data': {'user_name':user_name,'user_mobile':user_mobile,'user_email':user_email,'content':content,'post_ID':post_id},
            'callback': function(data){
                var result = JSON.parse(data);
                if(result.message && obj.querySelector('.result'))
                    obj.querySelector('.result').innerHTML = result.message;
                if(result.code == 200){
                   <?php echo get_option('conversionjs');?>
                }
                obj.removeChild(doingajax); 
                obj.submit.removeAttribute('disabled');
            }
        });
        return false;
    }
    function get_landing_page(){
        return camelwaydatalayer.get_entrypage();
    }
    function scrollleft(containerobj){
            var width = containerobj.scrollWidth;
            var count = containerobj.children.length;
            var sl = containerobj.scrollLeft || 0;
            if(sl +  containerobj.offsetWidth >= width - width/count){
                containerobj.scrollLeft = 0 ;
            }else{
                containerobj.scrollLeft += width/count;
            }
    }
    function scrollright(containerobj){
            var width = containerobj.scrollWidth;
            var count = containerobj.children.length;
            var sl = containerobj.scrollLeft || 0;
            if(sl == 0){
                containerobj.scrollLeft = width - containerobj.offsetWidth;
            }else{
                containerobj.scrollLeft -= width/count;
            }
    }
    
(function(window){
    var ajax_url = "<?php dminfo('ajax_url')?>";
    window.document.addEventListener('DOMContentLoaded', function(){
        var topsearchicon = window.document.querySelector('.header .searchbtn');
        var topsearchform = window.document.querySelector('.header form');
        var topleaverq = window.document.querySelector('.header .leaverq');
        var mobilenavholder = window.document.querySelector('.header .navholder');
        topsearchicon.addEventListener('click', function(){
            this.classList.toggle('close-icon');
            topsearchform.classList.toggle('slideleft');
        });
        topleaverq.addEventListener('click', function(){
            var div = document.createElement('div');
            div.className = 'wrap-layer';
            window.document.body.appendChild(div);
            window.document.body.classList.add('overflowhidden');
            var rfq = document.createElement('div');
            rfq.className = 'float-rfq';
            rfq.innerHTML = '<h2>Contact Sellers in Seconds</h2><p class="tips">Fill out this simple form. Our team will contact you promptly to discuss next steps.</p><form action="/dm-feedback.php" method="post" class="feedback-form" onsubmit="return async_submit(this)"><p class="input"><input name="user_name" type="text" required placeholder="Name:*"></p><p class="input"><input name="user_mobile" type="text" required placeholder="Mobile Phone:*"></p><p class="input"><input name="user_email" type="email" placeholder="Email:"></p><p class="input"><input name="company" type="text" placeholder="Company:"></p><p class="full-row input"><textarea name="content" placeholder="Details:*" rows="2"></textarea></p><p class="full-row"><span class="result"></span><input name="submit" type="submit" value="Submit"></p></form><span class="close"></span>';
            rfq.querySelector('.close').addEventListener('click', function(){
                window.document.body.removeChild(div);
                div.removeChild(rfq);
                window.document.body.classList.remove('overflowhidden');
            });
            div.appendChild(rfq);
        });
        mobilenavholder.addEventListener('click', function(){
            var div = document.createElement('div');
            div.className = 'wrap-layer';
            window.document.body.appendChild(div);
            window.document.body.classList.add('overflowhidden');
            var slidernav = document.querySelector('.slidernav');
            slidernav.classList.toggle('show'); 
            div.addEventListener('click', function(){
                slidernav.classList.toggle('show'); 
                window.document.body.removeChild(div);   
                window.document.body.classList.remove('overflowhidden');
            });
        });

        if(!supportwebp){
            window.addEventListener('error', function(e){
                var el = e.target || window.event.srcElement;
                if(el.src && el.src.indexOf(window.location.host) > 0){
                    if(el.src.match(/^[^\?]+\/dm-ajax\.php\?action=corpimage\&f=.*/) && !el.src.match(/type\=jpg/)){
                        el.src =  el.src + '&type=jpg';
                    }
                    else if(el.src.match(/^[^\?]+\.webp/)){
                        el.src = ajax_url+'?action=webp2jpg&f='+encodeURIComponent(el.src);
                    }
                }
            }, true);
            var images = document.querySelectorAll('img');
            for(var i in images){
                var imagesrc = images[i].currentSrc || images[i].src;
                if(imagesrc && imagesrc.indexOf(window.location.host) > 0){
                    images[i].setAttribute('srcset', '');
                    if(imagesrc.match(/^[^\?]+\.webp/)){
                        images[i].src  = ajax_url+'?action=webp2jpg&f='+encodeURIComponent(imagesrc);
                    }else if(imagesrc.match(/^[^\?]+\.php\?action=/)){
                        images[i].src  = imagesrc + '&type=jpg';
                    }
                }
            }
        }
    <?php
    //记录访问
    if(is_single() || is_page() || is_topic()){ ?>
        async_request({
            "method": "POST",
            "url": ajax_url+"?action=viewed&id=<?php the_ID();?>",
            "callback": function(data){}
        });
        var commentform = window.document.querySelector('.comments .comment-form');
        var commentlist = window.document.querySelector('.comments .comments-list');
        var emojis = new Array('😀','😃', '😄','😁','😆','😅','😂','🤣','😊','😇','🙂','🙃','😉','😌','😍','😘','😗','😙','😚','😋','😛','😝','😜','🤪','🤨','🧐','🤓','😎','🤩','😏','😒','😞','😔','😟','😕','🙁','☹️','😣','😖','😫','😩','😢','😭','😤','😠','😡','🤬','🤯','😳','👋','🤚','🖐','✋','🖖','👌','✌️','🤞','🤟','🤘','🤙','👈','👉','👆','🖕','👇','☝️','👍','👎','✊','👊','🙏','👀','👂','💋');
        if(commentform){
            var commentinput = commentform.querySelector('.content');
            var commentaction = commentform.querySelector('.action');
            var submitbtn = commentform.querySelector('.submit');
            var cancelbtn = commentform.querySelector('.cancel');
            var commenttips = commentinput.getAttribute('data-tips');
            var nameinput = commentform.querySelector('.name');
            var emailinput = commentform.querySelector('.email');
            var scoreinput = commentform.querySelector('.rating');
            var emojibtn = commentform.querySelector('.emojibtn');
            var emojisbox = document.createElement('div');
            emojisbox.className = 'emojis';
            if(emojibtn){
                for(var i in emojis)
                    emojisbox.innerHTML += '<span>'+emojis[i]+'</span>';
                emojibtn.parentNode.appendChild(emojisbox);

                emojisbox.addEventListener('click', function(e){
                    var el = e.target || window.event.srcElement;
                    if(el.tagName == 'SPAN'){
                        commentinput.setAttribute('data-tips', '');
                        commentinput.innerHTML += el.innerHTML;
                    }
                });
                emojibtn.addEventListener('click', function(){
                    emojisbox.classList.toggle('show');
                });
            }
            if(scoreinput){
                scoreinput.addEventListener('mouseover', function(e){
                    var el = e.target || window.srcElement.srcElement;
                    if(el.nodeName !== 'SPAN') return;
                    var spans = scoreinput.querySelectorAll('span');
                    var index = Array.from(spans).indexOf(el);
                    spans.forEach(function(c,i,o){
                        if(i<=index){
                            spans[i].classList.add('star-filled');
                        }else{
                            spans[i].classList.remove('star-filled');
                        }
                        score = i + 1;
                    })
                });
            }
            commentinput.addEventListener('focus', function(){
                commentaction.classList.add('slidedown'); 
                if(scoreinput)
                    scoreinput.classList.add('slidedown'); 
                commentform.classList.add('focus');
            });
            commentinput.addEventListener('blur', function(){
                if(this.innerHTML == ''){
                    this.setAttribute('data-tips', commenttips);
                }
            });
            commentinput.addEventListener('keydown', function(){
                this.setAttribute('data-tips', '');
            });
            cancelbtn.addEventListener('click', function(){
                commentaction.classList.remove('slidedown'); 
                if(scoreinput)
                    scoreinput.classList.remove('slidedown'); 
                commentform.classList.remove('focus');
                emojisbox.classList.remove('show');
                commentinput.innerHTML = '';
                nameinput.innerHTML = '';
                emailinput.innerHTML = '';
                submitbtn.classList.add('disabled');
                commentform.classList.remove('reply');
                if(commentform.querySelector('.replyto'))
                    commentform.querySelector('.message').removeChild(commentform.querySelector('.replyto'));
            });
            commentform.addEventListener('keyup', function(){
                if(commentinput.innerText != '' && nameinput.innerText != '' && emailinput.innerText != '' && emailinput.innerText.match(/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-zA-Z]{1,10}$/i)){
                    submitbtn.classList.remove('disabled');
                }else{
                    submitbtn.classList.add('disabled');
                }
            });
            submitbtn.addEventListener('click', function(){
                if(submitbtn.classList.contains('disabled')){
                    return false;
                }
                emojisbox.classList.remove('show');
                var score = 0;
                if(scoreinput)
                    score = scoreinput.querySelectorAll('span.star-filled').length;
                var parentcomment = 0;
                if(commentform.querySelector('.replyto'))
                    parentcomment = commentform.querySelector('.replyto').getAttribute('data-parent');
                var wrap = document.createElement('div');
                wrap.className = 'result';
                wrap.innerHTML = '<span class="loading"></span>';
                commentform.appendChild(wrap);
                async_request({
                    'method': 'POST',
                    'url': ajax_url+'?action=addcomment',
                    'data': {'post_ID': <?php the_ID();?>, 'user_name': nameinput.innerText, 'user_email': emailinput.innerText, 'content': commentinput.innerText + '\r\nLanding Page: ' + get_landing_page(), 'group': 'comment', 'parent': parentcomment, 'score': score},
                    'callback': function(data){
                        var result = JSON.parse(data);
                        wrap.querySelector('span').innerHTML = result.message;
                        if(result.code == 200){
                            wrap.querySelector('span').className = 'success';
                        }else{
                            wrap.querySelector('span').className = 'failure';
                        }
                        setTimeout(function(){
                            commentform.removeChild(wrap);
                            commentaction.classList.remove('slidedown'); 
                            commentform.classList.remove('focus');
                            commentform.classList.remove('reply');
                            if(commentform.querySelector('.replyto'))
                                commentform.querySelector('.message').removeChild(commentform.querySelector('.replyto'));
                        }, 5000);
                    }
                });
            });
           
            if(commentlist){
                commentlist.querySelectorAll('li .action').forEach(function(item){
                    if(camelwaydatalayer.is_comment_liked(item.getAttribute('data-comment-id')))
                        item.querySelector('.like').classList.add('liked');
                });
                commentlist.addEventListener('click', function(e){
                    var node = e.target || window.event.srcElement;
                    if(node && node.classList.contains('like')){
                        var comment_id = node.parentNode.getAttribute('data-comment-id');
                        if(!camelwaydatalayer.is_comment_liked(comment_id)){
                            node.classList.add('liked');
                            camelwaydatalayer.like_comment(comment_id);
                            async_request({
                                "method": "POST",
                                "url": ajax_url+"?action=likecomment&id="+comment_id,
                                "callback": function(data){
                                    node.innerHTML = data;
                                }
                            });
                        }else{
                            node.classList.remove('liked');
                            camelwaydatalayer.unlike_comment(comment_id);
                            async_request({
                                "method": "POST",
                                "url": ajax_url+"?action=unlikecomment&id="+comment_id,
                                "callback": function(data){
                                    node.innerHTML = data;
                                }
                            });
                        }
                    }
                    else if(node && node.classList.contains('reply')){
                        var comment_id = node.parentNode.getAttribute('data-comment-id');
                        var reply_name = node.parentNode.parentNode.querySelector('.name').innerHTML;
                        if(commentinput.parentNode.querySelector('.replyto')){
                            commentinput.parentNode.removeChild(commentform.querySelector('.replyto'));
                        }
                        var replyinfo = document.createElement('div');
                        replyinfo.className = 'replyto';
                        replyinfo.setAttribute('data-parent', comment_id);
                        replyinfo.innerHTML = 'Reply to @'+reply_name;
                        commentinput.parentNode.insertBefore(replyinfo,commentinput);
                        commentform.classList.add('reply');
                        commentinput.focus();
                    }
                    else if(node && node.classList.contains('loadmore')){
                        var href = node.getAttribute('href');
                        async_request({
                            "method": "GET",
                            "url": href,
                            "callback": function(data){
                                var result = JSON.parse(data);
                                var comments = result['items'];
                                for(var i in comments){
                                    var id = comments[i]['id'];
                                    var avatar = comments[i]['avatar'];
                                    var author = comments[i]['author'];
                                    var content = comments[i]['content'];
                                    var date = comments[i]['date'];
                                    var likes = comments[i]['likes'];
                                    var score = comments[i]['score'];
                                    var likeclass = 'like';
                                    if(camelwaydatalayer.is_comment_liked(id)){
                                        likeclass = 'like liked';
                                    }
                                    var ratinghtml = '';
                                    if(score){
                                        var ratinghtml = '<span class="rating">'+'<span class="star-filled"></span>'.repeat(score) + '</span>';
                                    }
                                    var li = document.createElement('li');
                                    li.innerHTML = '<div class="author"><img src="'+avatar+'" alt="'+author+'" class="avatar"> <span class="name">'+author+'</span>'+ratinghtml+'</div><div class="message">'+content+'</div><div class="action" data-comment-id="'+id+'"><span class="'+likeclass+'">'+likes+'</span><span class="reply">Reply</span><!--<span class="viewreply">View Reply</span>--></div><span class="pubtime">'+date+'</span>';
                                    node.previousElementSibling.appendChild(li);
                                }
                                if(result['next']){
                                    node.setAttribute('href', result['next']);
                                }else{
                                    node.parentNode.removeChild(node);
                                }
                            }
                        });
                        e.preventDefault();
                        return false;
                    }
                });
            }
        }
    <?php } if(is_single() && in_category(array(1,2,3,4,5,6,7,8,9))){ ?>
        var reviewstar = document.querySelector('.review .rating .star');
        reviewstar.addEventListener('click', function(e){
            document.querySelector('.comment-form .content').focus();
        });
        share_init('.overview .share');
        var gallery = document.querySelector('.gallery');
        function showImage(index, target){
            var images = Array.from(gallery.querySelectorAll('a')).map(function(item){return item.getAttribute('href');});
            var index = index % images.length;
            if(index <0 ){
                index +=  images.length;
            }
            var img = images[index];
             if(!supportwebp && img.match(/.webp$/))
                img = ajax_url+'?action=webp2jpg&f='+encodeURI(img);
             target.src =  "<?php dminfo('template_url')?>media/loading.gif";
             var imgobj = new Image();
             imgobj.src = img;
             imgobj.onload = function(){target.src = img};
        }
        gallery.addEventListener('click', function(e){
            var el = e.target || window.event.srcElement;
            if(el.tagName == 'A'){ el = el.querySelector('img');}
            var container = document.createElement('div');
            var close = document.createElement('div');
            container.className = 'wrap-layer gallery-container';
            close.className = 'close';
            var images = gallery.querySelectorAll('a');
            var index = Array.from(gallery.querySelectorAll('img')).indexOf(el);
            var html = '<div class="gallery-window"><span class="prev"></span><div class="pic"><img src=""></div><span class="next"></span></div>';
            container.innerHTML = html;
            showImage(index, container.querySelector('img'));

            container.addEventListener('click', function(e){
                var ev = e || window.event;
                var el = e.target || window.event.srcElement;
                if(el.classList.contains('close')){
                    document.body.classList.remove('overflowhidden');
                    document.body.removeChild(container);
                }else if(el.classList.contains('next') || ev.screenX > document.body.offsetWidth / 2){
                    index++;
                    showImage(index, container.querySelector('img'));
                }else if(el.classList.contains('prev')|| ev.screenX < document.body.offsetWidth / 2){
                    index--;
                    showImage(index, container.querySelector('img'));
                }
            });
            container.appendChild(close);
            document.body.appendChild(container);
            document.body.classList.add('overflowhidden');
            e.preventDefault();
            return false;
        });
    <?php } if(is_single() && in_category(10)){ ?>
        var postid = <?php the_ID();?>;
        var likebutton = window.document.querySelector('.single-blog .post-tips .like');
        var dislikebutton = window.document.querySelector('.single-blog .post-tips .dislike');
        if(camelwaydatalayer.is_liked(postid)) likebutton.classList.add('liked');
        if(camelwaydatalayer.is_disliked(postid)) dislikebutton.classList.add('disliked');

        likebutton.addEventListener('click', function(){
            if(camelwaydatalayer.is_liked(postid)){
                likebutton.classList.remove('liked');
                async_request({
                    "method": "POST",
                    "url": ajax_url+"?action=unlikepost&id="+postid,
                    "callback": function(data){
                        likebutton.innerHTML = data;
                        camelwaydatalayer.unlike_post(postid);
                    }
                });
            }else{
                likebutton.classList.add('liked');
                async_request({
                    "method": "POST",
                    "url": ajax_url+"?action=likepost&id="+postid,
                    "callback": function(data){
                        likebutton.innerHTML = data;
                        camelwaydatalayer.like_post(postid);
                    }
                });
                if(camelwaydatalayer.is_disliked(postid)){
                    async_request({
                        "method": "POST",
                        "url": ajax_url+"?action=undislikepost&id="+postid,
                        "callback": function(data){
                            dislikebutton.innerHTML = data;
                            dislikebutton.classList.remove('disliked');
                            camelwaydatalayer.undislike_post(postid);
                        }
                    });
                }
            }
        });
        dislikebutton.addEventListener('click', function(){
            if(!camelwaydatalayer.is_disliked(postid) && !camelwaydatalayer.is_liked(postid)){
                dislikebutton.classList.add('disliked');
                async_request({
                    "method": "POST",
                    "url": ajax_url+"?action=dislikepost&id=<?php the_ID();?>",
                    "callback": function(data){
                        dislikebutton.innerHTML = data;
                        camelwaydatalayer.dislike_post(postid);
                    }
                });
            }else if(camelwaydatalayer.is_disliked(postid)){
                dislikebutton.classList.remove('disliked');
                async_request({
                    "method": "POST",
                    "url": ajax_url+"?action=undislikepost&id=<?php the_ID();?>",
                    "callback": function(data){
                        dislikebutton.innerHTML = data;
                        camelwaydatalayer.undislike_post(postid);
                    }
                });
            }
        });
        share_init('.sidebar .side-share');
<?php } if(is_search()) { ?>
        var loadmore = document.querySelector('.loadmore');
        if(loadmore){
            var s = '<?php echo get_query_var('s')?>';
            loadmore.addEventListener('click', function(){
                var offset = parseInt(loadmore.getAttribute('data-offset'));
                async_request({
                    "method": "GET",
                    "url": ajax_url+"?action=loadposts&s="+s+"&offset="+offset+'&cat=10',
                    "callback": function(data){
                        var result = JSON.parse(data);
                        var items = result['items'];
                        for(var i in items){
                            var item = items[i];
                            var title = item['post_title'];
                            var permalink = item['permalink'];
                            var post_excerpt = item['post_excerpt'].substr(0, 255)+'...';
                            var entry = document.createElement('div');
                            entry.className = 'item';
                            if(item['post_thumbnail']){
                                var img = ajax_url+"?action=cropimage&f="+escape(item['post_thumbnail'])+"&width=105";
                                entry.innerHTML = '<h2><a href="'+permalink+'">'+title+'</a></h2><a href="'+permalink+'" class="thumbnail"><img src="'+img+'" alt="'+title+'" width="105" height="79"></a><p>'+post_excerpt+'</p><a href="'+permalink+'" class="url">'+permalink+'</a>';
                            }else{
                                entry.innerHTML = '<h2><a href="'+permalink+'">'+title+'</a></h2><p>'+post_excerpt+'</p><a href="'+permalink+'" class="url">'+permalink+'</a>';
                            }
                            loadmore.previousElementSibling.appendChild(entry);
                        }
                        if(!result['next']){
                            loadmore.parentNode.removeChild(loadmore);
                        }else{
                            loadmore.setAttribute('data-offset', offset + result['count']);
                        }
                    }
                });
            });
        }
<?php } if(is_tag()){?>
    var loadmore = document.querySelector('.loadmore');
        if(loadmore){
            var s = '<?php echo get_query_var('s')?>';
            loadmore.addEventListener('click', function(){
                var offset = parseInt(loadmore.getAttribute('data-offset'));
                async_request({
                    "method": "GET",
                        "url": ajax_url+"?action=loadposts&tag=<?php echo get_tag()->term_id;?>&offset="+offset,
                        "callback": function(data){
                        var result = JSON.parse(data);
                        var items = result['items'];
                        for(var i in items){
                            var item = items[i];
                            var title = item['post_title'];
                            var subtitle = item['post_subtitle'];
                            var permalink = item['permalink'];
                            var post_excerpt = item['post_excerpt'];
                            var post_date = item['post_date'];
                            var images = item['images'];
                            var entry = document.createElement('div');
                            entry.className = 'item';
                            if(images.length == 0){
                                entry.innerHTML = '<h2><a href="'+permalink+'">'+subtitle+'</a></h2><p>'+post_excerpt+'</p><span class="pubdate">'+post_date+'</span>'
                            }else if(images.length <=2){
                                var img = ajax_url+"?action=cropimage&f="+escape(images[0])+"&width=200";
                                entry.innerHTML = '<img src="'+img+'" alt="'+title+'" width="200" height="150" class="thumbnail"><h2><a href="'+permalink+'">'+subtitle+'</a></h2><p>'+post_excerpt+'</p><span class="pubdate">'+post_date+'</span>';
                            }else{
                                var imghtml = '';
                                for(var i in images){
                                    if(i == 3) break;
                                    var img = ajax_url+"?action=cropimage&f="+escape(images[i])+"&width=315";
                                    imghtml += '<a href="'+permalink+'"><img src="'+img+'" alt="'+title+'" width="'+images[i]['width']+'" height="'+images[i]['height']+'"></a>';
                                }
                                entry.innerHTML = '<h2><a href="'+permalink+'">'+subtitle+'</a></h2><p>'+post_excerpt+'</p><div class="thumbnails">'+imghtml+'</div><span class="pubdate">'+post_date+'</span>';
                            }
                            loadmore.previousElementSibling.appendChild(entry);
                        }
                        if(!result['next']){
                            loadmore.parentNode.removeChild(loadmore);
                        }else{
                            loadmore.setAttribute('data-offset', offset + result['count']);
                        }
                    }
                });
            });
        }
        share_init('.sidebar .side-share');
<?php } elseif(is_category(10)){ ?>
        var loadmore = document.querySelector('.loadmore');
        if(loadmore){
            var cat = loadmore.getAttribute('data-id');
            loadmore.addEventListener('click', function(){
                var offset = parseInt(loadmore.getAttribute('data-offset'));
                async_request({
                    "method": "GET",    
                    "url": ajax_url+"?action=loadposts&cat="+cat+"&offset="+offset,
                    "callback": function(data){
                        var result = JSON.parse(data);
                        var items = result['items'];
                        for(var i in items){
                            var item = items[i];
                            var title = item['post_title'];
                            var subtitle = item['post_subtitle'];
                            var permalink = item['permalink'];
                            var post_excerpt = item['post_excerpt'];
                            var post_date = item['post_datetext'];
                            var author = item['author'];
                            var avatar = item['author_avatar'];
                            var feedback_number = item['feedback_number'] > 1 ? item['feedback_number'] + ' Comments' : item['feedback_number'] + ' Comment';
                            var img = ajax_url+"?action=cropimage&f="+escape(item['post_thumbnail'])+"&width=240";
                            var entry = document.createElement('li');
                            if(item['post_thumbnail']){
                                entry.innerHTML = '<div class="thumbnail"><a href="'+permalink+'"><img src="'+img+'" alt="'+title+'" width="230" height="175"></a></div><div class="text"><h2><a href="'+permalink+'">'+subtitle+'</a></h2><p>'+post_excerpt+'</p><div class="author"><img class="avatar" src="'+avatar+'" alt="'+author+'" width="50" height="50"><strong>camelway</strong><span class="pubdate">'+post_date+'</span></div><div class="comment_count">'+feedback_number+'</div></div>';
                            }else{
                                entry.innerHTML = '<div class="text"><h2><a href="'+permalink+'">'+subtitle+'</a></h2><p>'+post_excerpt+'</p><div class="author"><img class="avatar" src="'+avatar+'" alt="'+author+'" width="50" height="50"><strong>camelway</strong><span class="pubdate">'+post_date+'</span></div><div class="comment_count">'+feedback_number+'</div></div>';
                            }
                            loadmore.previousElementSibling.appendChild(entry);
                        }
                        if(!result['next']){
                            loadmore.parentNode.removeChild(loadmore);
                        }else{
                            loadmore.setAttribute('data-offset', offset + result['count']);
                        }
                    }
                });
            });
        }
<?php } elseif(is_home()){ ?>
        var pscroll = document.querySelector('.product-scroll .scroll-control');
        pscroll.addEventListener('click', function(e){
            var el = e.target || window.event.srcElement;
            var index = Array.from(pscroll.querySelectorAll('span')).indexOf(el);
            if(index == 0){
                scrollleft(document.querySelector('.product-scroll ul'));
            }else{
                scrollright(document.querySelector('.product-scroll ul'));
            }
        });
       var reviewcontrolleft = document.querySelector('.review-control-left');
       var reviewcontrolright = document.querySelector('.review-control-right');
       reviewcontrolleft.addEventListener('click', function(){
            scrollleft(document.querySelector('.review-content ul'));
       });
       reviewcontrolright.addEventListener('click', function(){
            scrollright(document.querySelector('.review-content ul'));
       });
       document.querySelector('.primary-banner').style.height = document.body.offsetWidth / 1920 * 820 + 'px';
       window.addEventListener('resize',function(){document.querySelector('.primary-banner').style.height = document.body.offsetWidth / 1920 * 820 + 'px';});
       var banners = document.querySelectorAll('.banner-elements li');
       setInterval(function(){
            var show = document.querySelector('.banner-elements .fadein');
            var index = Array.from(banners).indexOf(show) || 0;
            index++;
            if(index >= banners.length)
                index = 0;
            banners[index].classList.add('fadein');
            show.classList.remove('fadein');
       }, 8000);
<?php }?>
        var floatrfq = window.document.createElement('div');
        floatrfq.className = 'float-widget';
        floatrfq.innerHTML = '<div class="title"><p>Request free Quote</p><span class="close">&#xe90e;</span></div><form action="<?php dminfo('feedback_url')?>" method="post" class="feedback-form" onsubmit="return async_submit(this)"><p class="input full-row"><input type="text" name="user_name" required placeholder="Name:*"></p><p class="input full-row"><input type="text" name="user_mobile" placeholder="Mobile:"></p><p class="input full-row"><input type="email" name="user_email" placeholder="Email:"></p><p class="input full-row"><textarea name="content" placeholder="Detail:*" rows="2"></textarea></p><p class="full-row"><span class="result"></span><input name="submit" type="submit" value="Submit"></p></form>';
        window.document.body.appendChild(floatrfq);
        floatrfq.querySelector('.title').addEventListener('click', function(){
             floatrfq.classList.toggle('active');
        });
        var floatcontact = window.document.createElement('div');
        floatcontact.className = 'float-contact';
        floatcontact.innerHTML = '<a href="https://wa.me/<?php echo get_option('float_whatsapp')?>" target="_blank" class="whatsappus" rel="nofollow noopener" role="button" tabindex="0" title="Whatsapp">&#xe931;</a><a href="mailto:info@camelwaygroup.com" class="emailus" role="button" tabindex="0" title="Email ">&#xe917;</a>';
        window.document.body.appendChild(floatcontact);
        floatcontact.addEventListener('click', function(e){
            var target = e.target || window.event.srcElement;
            var href = target.href;
            if(target.className == 'whatsappus'){
                href+='?text='+encodeURIComponent(get_landing_page());
                var aw = window.screen.availWidth;
                var ah = window.screen.availHeight;
                var width,height,top,left;
                if(aw>1200){
                    width = 800;
                }else if(aw>800){
                    width = 600;
                }else{
                    width = aw;
                }
                if(ah>800){
                    height = 600;
                }else{
                    height = ah;
                }
               top = ah/2 - height/2;
                left = aw/2 - width/2;
                window.open(href, '_blank', 'width='+width+',height='+height+',left='+left+',top='+top+',location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');
                gtag('event', 'chat whatsapp', { 'event_category': 'chat','event_label':get_landing_page(),'value': 5});
            }else{
                var title = document.querySelector('h1') ? document.querySelector('h1').innerText : document.title;
                var subject = encodeURIComponent('Request For Quote: '+title);
                var body = encodeURIComponent(get_landing_page());
                href+='?subject='+subject+"&body="+body;
                window.location.href = href;
                gtag('event', 'send email', { 'event_category': 'chat','event_label':get_landing_page(),'value': 5});
            }
             e.preventDefault();
            return false;
        }, false);
    })
})(window);
</script>
</head>
<body>
<div class="wrap quick-links">
    <div class="container">
        <a href="mailto:<?php echo get_option('site_email')?>" class="email"><?php echo get_option('site_email')?></a>
        <a href="tel:<?php echo get_option('site_mobile')?>" class="phone"><?php echo get_option('site_mobile')?></a>
        <div class="media-platforms">
            <a href="https://www.facebook.com/camelway/" rel="nofollow" class="facebook" target="_blank">&#xe918;</a>
            <a href="https://www.pinterest.com/camelwaygroup/" rel="nofollow" class="pinterest" target="_blank">&#xe91b;</a>
            <a href="https://www.youtube.com/channel/UCisCm9pYJtqHX9Vz6WOPPRg" rel="nofollow" class="youtube" target="_blank">&#xe91e;</a>
            <a href="https://www.linkedin.com/company/camelway/" rel="nofollow" class="linked" target="_blank">&#xe91c;</a>
        </div>
    </div>
</div>
<div class="wrap header">
    <div class="container primary-menu">
        <a class="logo" href="<?php dminfo('home_url')?>"><img src="<?php dminfo('template_url')?>media/camelwaygroup.png" alt="Camelway Group" width="186" height="48"></a>
        <div class="navholder" role="button"></div>
        <div class="leaverq" role="button">Leave a Request</div>
        <div class="search">
            <div class="searchbtn" role="button"></div>
            <form action="<?php dminfo('home')?>index.php" method="get">
                <input type="text" name="s" value="">
            </form>
        </div>
        <div class="primary-nav">
            <ul>
                <li><a href="<?php the_permalink(1)?>">About Us</a></li>
                <li><a href="<?php the_category_link(1)?>">Mixing Plant<i class="arrow"></i></a>
                    <div class="secondary-nav">
                        <ul>
                            <li><a href="<?php the_category_link(2)?>"><?php the_category_name(2)?></a></li>
                            <li><a href="<?php the_category_link(3)?>"><?php the_category_name(3)?></a></li>
<?php
$ps = get_posts('cat=1');
foreach($ps as $p){ ?>
                            <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a</li>
<?php } ?>
                        </ul>
                        <div class="thumbnail">
                            <img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php echo esc_html(get_category_thumbnail(1))?>&width=260" alt="<?php the_category_name(1)?>" width="260" height="195">
                        </div>
                    </div>
                </li>
                <li><a href="<?php the_category_link(4);?>"><?php the_category_name(4)?><i class="arrow"></i></a>
                    <div class="secondary-nav">
                        <ul>
                            <li><a href="<?php the_category_link(5)?>"><?php the_category_name(5)?></a></li>
<?php
$ps = get_posts('cat=4');
foreach($ps as $p){ ?>
                            <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a</li>
<?php } ?>
                        </ul>
                        <div class="thumbnail">
                            <img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php echo esc_html(get_category_thumbnail(4))?>&width=260" alt="<?php the_category_name(4)?>" width="260" height="195">
                    </div>
                </li>
                <li><a href="#">Products<i class="arrow"></i></a>
                     <div class="secondary-nav">
                        <ul>
<?php
$cs = get_categories(array('include'=>array(2,3,4,5,6,7)));
foreach($cs as $c){ ?>
                            <li><a href="<?php echo $c->get_permalink()?>"><?php echo $c->cat_name?></a</li>
<?php } ?>
                        </ul>
                        <div class="thumbnail">
                            <img src="<?php dminfo('ajax_url')?>?action=cropimage&f=<?php echo esc_html(get_category_thumbnail(2))?>&width=260" alt="<?php the_category_name(2)?>" width="260" height="195">
                    </div>

                </li>
                <li><a href="<?php the_permalink(2)?>">Contact Us</a></li>
            </ul>
           
        </div>
    </div>
</div>
<div class="slidernav">
    <ul>
        <li><a href="<?php dminfo('home_url')?>">Home</a</li>
        <li><a href="<?php the_category_link(1);?>"><?php the_category_name(1)?></a>
            <ul>
                <li><a href="<?php the_category_link(2);?>"><?php the_category_name(2)?></a></li>
                <li><a href="<?php the_category_link(3);?>"><?php the_category_name(3)?></a></li>
<?php
$ps = get_posts('cat=1');
foreach($ps as $p) echo sprintf('<li><a href="%s">%s</a></li>', $p->get_permalink(), $p->post_subtitle);
?>
            </ul>
        </li>
        <li><a href="<?php the_category_link(4);?>"><?php the_category_name(4)?></a>
            <ul>
                <li><a href="<?php the_category_link(5);?>"><?php the_category_name(5)?></a></li>
<?php
$ps = get_posts('cat=4');
foreach($ps as $p) echo sprintf('<li><a href="%s">%s</a></li>', $p->get_permalink(), $p->post_subtitle);
?>
            </ul>
        </li>
        <li><a href="<?php the_category_link(6);?>"><?php the_category_name(6)?></a></li>
        <li><a href="<?php the_category_link(7);?>"><?php the_category_name(7)?></a></li>
        <li><a href="<?php the_permalink(1);?>">About Us</a></li>
        <li><a href="<?php the_permalink(2);?>">Contact Us</a></li>
    </ul>
</div>