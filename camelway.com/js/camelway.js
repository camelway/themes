//GA ID
var ga_id = 'UA-75819314-1';
//转化ID
var conversion_id = 'AW-918898170/qNZgCIL0kXQQ-ouVtgM';
//whatsapp
var whatsapp = '8618838109566';
//字符串重复对象
String.prototype.repeat = function(count){
    return new Array(count+1).join(this);
}
//大类
function Camelway(){
    //当前时间
    var now = new Date();

    //提交表单之后需要回调的函数列表
    var submitcallbacks = new Array();

    //获取cookie
    function getCookie(name){
        if(document.cookie.length == 0 )
            return false;

        var start = document.cookie.indexOf(name+"=");
        if(start == -1)
            return false;

        var last = document.cookie.substr(start + name.length +1 );
        var end = last.indexOf(';');
        return unescape(last.substr(0, end));
    }

    //设置cookie
    function setCookie(name, value, expires){
        var cdate = new Date();
        cdate.setTime(cdate.getTime() + expires*1000);
        if(window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)){
            var domain = window.location.hostname.match(/[^.\s]*\.[a-zA-Z]{2,5}$/)[0];
        }else{
            var domain = window.location.hostname;
        }
        document.cookie = name+"="+escape(value)+";expires="+cdate.toUTCString()+";domain="+domain+";path=/";
    }

    //是否是移动浏览器
    function isMobile(){
        var userAgentInfo = navigator.userAgent;
        var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod" ,"Mobile");
        for(var index in Agents){
            if(userAgentInfo.match(Agents[index])) return true;
        }
        return false;
    }

    //是否支持webp格式图片
    function supportwebp() {
        var elem = document.createElement('canvas');
        if (!!(elem.getContext && elem.getContext('2d'))) {
            return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;
        }
        return false;
    }

    //插入浮动表单
    function openMessaging(){
        var widgetfloatmessaging = document.createElement('div');
        widgetfloatmessaging.className = 'widget-float-messaging';
        if(arguments.length == 0 || arguments[0] == 'messaging'){
            widgetfloatmessaging.innerHTML = '<p class="headline">Information Request<span class="icon-close">&#xe9de;</span></p><form action="/dm-feedback.php" method="post"><p><label for="user_name">Name<span class="required">*</span>:</label><input type="text" name="user_name" id="user_name" required placeholder="Your Name"></p><p><label for="user_email">Email<span class="required">*</span>:</label><input type="text" name="user_email" id="user_email" placeholder="Your Emaill Address"></p><p><label for="content">Content<span class="required">*</span>:</label><textarea name="content" id="content" rows="8" required placeholder="Any information you want to know"></textarea></p><input type="hidden" name="lang" value="en"><p><input class="submit" type="submit" value="Submit"></p></form>';
        }else if(arguments[0] == 'email'){
            var subject = document.querySelector('h1') ? document.querySelector('h1').innerText : '';
            widgetfloatmessaging.innerHTML = '<p class="headline">Send Us an Email <span class="icon-close">&#xe9de;</span></p><form action="/dm-feedback.php" method="post"><p><label for="user_name">Subject<span class="required">*</span>:</label><input type="text" name="user_name" id="user_name" value="'+subject+'"></p><p><label for="user_email">Email<span class="required">*</span>:</label><input type="text" name="user_email" id="user_email" placeholder="Your Email Address" required></p><p><label for="content">Content<span class="required">*</span>:</label><textarea name="content" id="content" rows="8" required></textarea></p><input type="hidden" name="lang" value="en"><p><input class="submit" type="submit" value="Send"></p></form>';
        }else if(arguments[0] == 'download'){
            widgetfloatmessaging.innerHTML = '<p class="headline">Please fill out the Form<span class="icon-close">&#xe9de;</span></p><form action="/dm-feedback.php" method="post"><input type="hidden" name="user_name" value="anonymous down pdf"><p><label for="user_email">Email<span class="required">*</span>:</label><input type="text" name="user_email" id="user_email" placeholder="Your Email Address" required></p><p><label for="content">Content<span class="required">*</span>:</label><textarea name="content" id="content" rows="4" required placeholder="Your inquiry details such as product name, capacity, FOB, etc. (required)"></textarea></p><input type="hidden" name="lang" value="en"><p><input class="submit" type="submit" value="Download"></p></form>';
        }
        widgetfloatmessaging.querySelector('.icon-close').addEventListener("click", function(){
            document.body.removeChild(widgetfloatmessaging);
        });
        document.body.appendChild(widgetfloatmessaging);
        widgetfloatmessaging.style.top = (window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight)/2 - widgetfloatmessaging.offsetHeight/2 + 'px';
    }

    //提交posts数据
    function Post(url, data, success){
        var postdata = '';
        if(typeof(data) == 'object'){
            for(var i in data){
                postdata += i+"="+data[i]+"&";
            }
        }
        postdata = postdata.replace(/&$/,'');
        var xhr = new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('POST', url, true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send(postdata);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var xml = JSON.parse(xhr.responseText);
                success(xml);
            }else if(xhr.readyState == 4){
                alert('Data submission failure!');
            }
        }
    }

    //去除头尾空格
    function trim(string) {
        return string.replace(/^\s+|\s+$/g, '');
    }

    //初始化系统
    this.visitor = {
        'initPage': getCookie('camelway_initpage') || window.location.href,
        'initTime': getCookie('camelway_inittime') || now.getTime(),
        'isMobile': isMobile(),
        'width': window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
        'height': window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
    };

    //记录转化
    this.logConversion = function(){
        gtag('event', 'conversion', {'send_to': conversion_id});
    }

    //记录事件
    this.logEvent = function(action, category, label){
        gtag('event', action, {'send_to': ga_id, 'event_category': category, 'event_label': label});
    }

    //显示消息
    this.alert = function(){
        if(arguments.length == 0){
            console.error('显示消息错误，没有消息实体!');
            return;
        }else if(arguments.length >= 1){
            var message = arguments[0];
            var mtype = arguments[1] || 'success';
        }
        var messagehtml = "<div class=\"notice "+mtype+"\">"+message+"</div><span class=\"icon close\">&#xe9de;</span>";
        var messagedom = document.createElement('div');
        messagedom.className = 'message-wrap';
        messagedom.innerHTML = messagehtml;

        if(document.querySelector('.message-wrap'))
            document.querySelector('.message-wrap').remove();

        document.body.appendChild(messagedom);

        var msgdomrm = setTimeout(function(){
            messagedom.parentElement.removeChild(messagedom);
            messagedom = null;
        }, 15000);

        messagedom.addEventListener('click', function(){
            clearTimeout(msgdomrm);
            messagedom.parentElement.removeChild(messagedom);
            messagedom = null;
        });
        
    }

    //播放视频
    this.playVideo = function(name, src){
        var widgetfloatplayer = document.createElement('div');
        widgetfloatplayer.className = 'widget-float-player';
        widgetfloatplayer.innerHTML = '<p class="headline">'+name+'<span class="icon-close">&#xe9de;</span></p><div class="tv"><video src="'+src+'" controls autoplay="true" preload="auto">Your brower do not support the video!</video></div>'
        widgetfloatplayer.querySelector('.icon-close').addEventListener("click", function(){
            document.body.removeChild(widgetfloatplayer);
        });
        widgetfloatplayer.querySelector('video').addEventListener('loadedmetadata', function(){
            var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            var videoWidth = this.videoWidth;
            var videoHeight = this.videoHeight;
            var pleft = 0;
            var ptop = 0;
            var pwidth = videoWidth;
            var pheight = videoHeight + 40;

            if(pheight > windowHeight){
                pwidth = windowWidth / (pheight/windowHeight);
                pheight = windowHeight;
            }
            if(pwidth > windowWidth){
                pheight = windowHeight / (pwidth/windowWidth);
                pwidth = windowWidth;
            }
            pleft = windowWidth/2 - pwidth/2;
            ptop = windowHeight/2 - pheight/2;

            widgetfloatplayer.style.top = ptop + 'px';
            widgetfloatplayer.style.left = pleft + 'px';
            widgetfloatplayer.style.height = pheight + 'px';
            widgetfloatplayer.style.width = pwidth + 'px';
        });
        document.body.appendChild(widgetfloatplayer);
    }

    //ajax提交post
    this.submit = function(success){
        var _this = this;
        document.addEventListener('submit', function(e){
            var ev = e || window.event;
            var target = ev.target || ev.srcElement;
            if(target.method=='get')
                return true;
            var url = target.action;
            var data = new Array();
            for(var i = 0; i <target.elements.length; i++){
                var obj = target.elements[i];
                var name = obj.name;
                if(!name)
                    continue;
                if(obj.type == 'text' || obj.type == 'email' || obj.type == 'url' || obj.type == 'textarea' || obj.type == 'hidden'){
                    var value = obj.value;
                }else if(obj.type == 'select-one'){
                    var value = obj.options[obj.selectedIndex].value;    
                }else if(obj.type == 'select-multiple'){
                    var value = '';
                    for(var i=0; i<obj.options.length; i++){
                        if(obj.options[i].selected)
                            value += obj.options[i].value;
                    }
                }else if(obj.type == 'checkbox' || obj.type == 'radio'){
                    var value = obj.checked ? obj.value : '';
                }else
                    var value = '';


                if(value == '')
                    continue;

                if(data[name] == undefined)
                    data[name] = encodeURIComponent(value);
                else
                    data[name] = data[name] + " " + encodeURIComponent(value);
            }
            data['format'] = 'json';
            data['url'] = _this.visitor.initPage.indexOf("?") > 0 ? escape(_this.visitor.initPage +"&" + _this.visitor.initTime) : escape(_this.visitor.initPage +"?" + _this.visitor.initTime);
            if(data['content'] !='' ) data['content'] += "\n\nLanding Page:" +escape( _this.visitor.initPage);
            Post(url, data, success);
            ev.preventDefault();
            return false;
        });
    }

    //绑定小工具事件
    this.widget = function(){
        var _this = this;
        var talkonline = document.querySelectorAll('.talkonline');
        if(talkonline){
            for(var i = 0; i < talkonline.length; i++){
                talkonline[i].addEventListener('click', function(e){
                    var ev = e || window.event;
                    _this.logEvent('沟通', '商务通', '着陆页:'+_this.visitor.initPage);
                    openZoosUrl('chatwin');
                    ev.preventDefault();
                    return false;
                });
            }
        }

        var talkwhatsapp = document.querySelectorAll('.talkwhatsapp')
        if(talkwhatsapp){
            for(var i = 0; i < talkwhatsapp.length; i++){
                talkwhatsapp[i].addEventListener('click', function(e){
                    var ev = e || window.event;
                    _this.logEvent('沟通', 'whatsapp', '着陆页:'+_this.visitor.initPage);
                    window.open('https://wa.me/'+whatsapp+'?text=Please%20Send%20me%20your%20best%20quotation:'+escape(_this.visitor.initPage));
                    ev.preventDefault();
                    return false;
                });
            }
        }

        var leavemsg = document.querySelectorAll('.leavemsg');
        if(leavemsg){
            for(var i = 0; i < leavemsg.length; i++){
                leavemsg[i].addEventListener('click', function(e){
                    var ev = e || window.event;
                    _this.logEvent('沟通', '留言', '着陆页:'+_this.visitor.initPage);
                    openMessaging();
                    ev.preventDefault();
                    return false;
                });
            }
        }

        var sendmail =  document.querySelectorAll('.sendmail');
        if(sendmail){
            for(var i = 0; i < sendmail.length; i++){
                sendmail[i].addEventListener('click', function(e){
                    var ev = e || window.event;
                    _this.logEvent('沟通', '发送邮件', '着陆页:'+_this.visitor.initPage);
                    openMessaging('email');
                    ev.preventDefault();
                    return false;
                });
            }
        }
        
        var pdfdown = document.querySelectorAll('.down');
        if(pdfdown){
            for(var i = 0; i < pdfdown.length; i++){
                pdfdown[i].addEventListener('click', function(e){
                    var ev = e || window.event;
                    var pdflink = ev.target.href || ev.srcElement.href;
                    openMessaging('download');
                    ev.preventDefault();
                    _this.logEvent('浏览', '下载PDF', '着陆页:'+_this.visitor.initPage);
                    submitcallbacks.push(function(){
                        window.location.href = '/down.php?file='+escape(pdflink);
                    });
                    return false;
                });
            }
        }

        document.querySelector('.gotop-btn').addEventListener('click', function(){
            _this.logEvent('浏览', '返回顶部', '着陆页:'+_this.visitor.initPage);
            var animation = setInterval(function(){
                var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
                if(scrolltop == 0)
                    clearInterval(animation);
                var scrollY = scrolltop - 20 > 0 ? scrolltop - 20 : 0;
                window.scrollTo(0, scrollY);
            }, 5);
        });

        var gotopbtn = document.querySelector('.gotop-btn');
        var widgetservicebtn = document.querySelector('.widget-service-btn');
        var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
        var distance = 0;
        var scrolltimeout;
        var gotopbtntimeout;
        var servicebtntimeout = setTimeout(function(){
            if(_this.visitor.width < 1400)
                widgetservicebtn.classList.add('fadeout');
        }, 5000);
        window.addEventListener('scroll', function(){
            if(scrolltimeout)
                clearTimeout(scrolltimeout);

            scrolltimeout = setTimeout(function(){
                var _scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
                distance =   _scrolltop - scrolltop;
                scrolltop =  _scrolltop;

                if(distance < 0 && scrolltop > 600){
                    gotopbtn.classList.add('fadein');
                    if(gotopbtntimeout)
                        clearTimeout(gotopbtntimeout);
                    gotopbtntimeout = setTimeout(function(){
                        gotopbtn.classList.remove('fadein');
                    }, 2000);
                }

                if( ( distance > 20 || distance < -20 ) && widgetservicebtn.classList.contains('fadeout')){
                    widgetservicebtn.classList.remove('fadeout');
                    if(servicebtntimeout)
                        clearTimeout(servicebtntimeout);
                    servicebtntimeout = setTimeout(function(){
                        widgetservicebtn.classList.add('fadeout');
                    }, 3000);
                }
            }, 100);
        });
    }

    //按顺序加载第三方js
    this.loadScript = function(src, callback){
        if(typeof(src) == 'string')
            src = new Array(src);
        var js = document.createElement('script');
        var loadsrc = src.shift();
        js.src = loadsrc;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(js, s);

        if(src.length == 0){
            js.onload = callback;
        }else{
            var _this = this;
            js.onload = function(){
                _this.loadScript(src, callback);
            }
        }
    }

    //显示loading信息
    this.loading = function(){
        return "<div class=\"loading icon\">&#xe968;</div>";
    }

    //绑定评论功能
    this.listencomment = function(){
        var _this = this;
        var feedbackform = document.querySelector('.feedback-form');
        if(!feedbackform)
            return false;

        var contentobj = feedbackform.querySelector('.content');
        var usernameobj = feedbackform.querySelector('.user-name');
        var useremailobj = feedbackform.querySelector('.user-email');
        var useravatarobj = feedbackform.querySelector('.user-avatar img')
        var cancelobj = feedbackform.querySelector('.feedback-cancel');
        var submitobj = feedbackform.querySelector('.feedback-post');

        var tips = contentobj.getAttribute('data-tips');
        var usernameobjtips = usernameobj.getAttribute('data-tips');
        var useremailobjtips = usernameobj.getAttribute('data-tips');

        var username = getCookie('feedback_user_name') || '';
        var useremail = getCookie('feedback_user_email') || '';
        var useravatar = getCookie('feedback_user_avatar') || useravatarobj.src;
        usernameobj.innerText = username;
        useremailobj.innerText = useremail;

        //输入
        contentobj.addEventListener('focus', function(){
            feedbackform.querySelector('.user-contact').style.display = 'block';
            if(username!='')
                usernameobj.setAttribute('data-tips', '');
            if(useremail!='')
                useremailobj.setAttribute('data-tips', '');
        });

        //监听留言输入操作
        feedbackform.addEventListener('keydown', function(e){
            var evt = e || window.event;
            var target = evt.target || evt.srcElement;
            if(target == contentobj || target == usernameobj || target == useremailobj){
                //显示与隐藏提示
                if(target.innerText != '')
                    target.setAttribute('data-tips', '');
                else if(target.innerText == ''){
                    if(target == contentobj)
                        target.setAttribute('data-tips', tips);
                    else if(target == usernameobj)
                        target.setAttribute('data-tips', usernameobjtips);
                    else
                        target.setAttribute('data-tips', useremailobjtips);
                }
                //屏蔽回车
                if((target == usernameobj || target == useremailobj) && evt.keyCode == 13)
                    evt.preventDefault();
                //显示与隐藏提交按钮
                if(contentobj.innerText != '' && usernameobj.innerText != '' && useremailobj.innerText != '')
                    feedbackform.querySelector('.feedback-post').className = "feedback-post feedback-action enable";
                else
                    feedbackform.querySelector('.feedback-post').className = "feedback-post feedback-action";
            }
        });
        //监听留言提交动作
        submitobj.addEventListener('click', function(e){
            var evt = e || window.event;
            var target = evt.target || evt.srcElement;
            var username = username || encodeURIComponent(trim(usernameobj.innerText));
            var useremail = useremail || encodeURIComponent(trim(useremailobj.innerText));
            var content = encodeURIComponent(trim(contentobj.innerText).replace(/[\r\n]{2,}/g,"\r\n"));
            if(content != '') content += "\n\nLanding Page: " + escape(_this.visitor.initPage);
            var postid = target.getAttribute('data-post-id');
            var fparent = target.getAttribute('data-parent-id');
            var comment = {user_name: username, user_email: useremail, content: content, post_ID: postid, parent: fparent, group:'comment'};
            var feedbackresult = document.createElement('div');
            feedbackresult.innerHTML = '<div class="loading"></div>';
            feedbackresult.className = 'feedback-result';
            feedbackform.querySelector('.user-contact').style.display = 'none';
            feedbackform.appendChild(feedbackresult);
            Post('/dm-feedback.php?format=json', comment, function(data){
                if(data.error_code == 200){
                    contentobj.innerHTML = '';
                    contentobj.setAttribute('data-tips', tips);
                    submitobj.setAttribute('data-parent-id', 0);
                    submitobj.innerText = 'Post';
                    //保存状态
                    setCookie('feedback_user_name', decodeURIComponent(username), 31536000);
                    setCookie('feedback_user_email', decodeURIComponent(useremail), 31536000);
                }
                feedbackresult.innerHTML = '<strong><span class="icon-error"></span>'+data.error_message+'</strong>';
                    setTimeout(function(){
                        feedbackform.removeChild(feedbackresult);
                }, 5000);
            });
        });
        //取消留言按钮
        cancelobj.addEventListener('click', function(e){
            contentobj.innerHTML = '';
            contentobj.setAttribute('data-tips', tips);
            submitobj.setAttribute('data-parent-id', 0);
            submitobj.innerText = 'Post';
            feedbackform.querySelector('.user-contact').style.display = 'none';
        });
        //回复留言
        document.querySelector('.feedback-list').addEventListener('click', function(e){
            var evt = e || window.event;
            var target = evt.target || evt.srcElement;
            if(target.className == 'reply'){
                var name = target.parentNode.querySelector('.feedback-user').innerText;
                var fparent = target.getAttribute('data-feedback-id');
                submitobj.setAttribute('data-parent-id', fparent);
                submitobj.innerText = 'Reply';
                contentobj.setAttribute('data-tips', "@"+name+": ");
                contentobj.focus();
                evt.preventDefault();
                return false;
            }
        });
    }
    //如果浏览器不支持webp格式，则把图片替换成jpeg
    this.webp = function(){
        if(supportwebp()) return;
        var images = document.querySelectorAll('img');
        for(var i in images){
            var originsrc = images[i].src;
            if(originsrc && originsrc.substr(-5) == '.webp'){
                images[i].src = 'https://www.camelway.com/dm-ajax.php?action=webp2jpg&f='+encodeURIComponent(originsrc);
            }
        }
    }

    //开始执行
    this.run = function(){
         var _this = this;
        _this.widget();
        _this.listencomment();
        _this.submit(function(data){
            var msg = data.error_message || data.body;
            var errorcode = data.error_code == undefined ? data.code : data.error_code;
            var result = 'fail';
            if(errorcode == 200 || errorcode == 0){
                var result = 'success';
                while((callback = submitcallbacks.pop()) != null){
                    callback();
                }
                _this.logConversion();
            }

            _this.alert(msg, result);
        });
        _this.webp();
    }

    //直接执行，初始化函数
    if(getCookie('initpage') == false){
        var initPage = window.location.href;
        var initTime = now.getTime();
        setCookie('camelway_initpage', initPage, 31536000);
        setCookie('camelway_inittime', initTime, 31536000);
    }
}


//主系统初始化
var camelway = new Camelway();
camelway.run();

if(window.location.pathname != '/'){
    //内页
    camelway.loadScript(['//data.camelway.net/static/js/jquery.min.js'], function(){
        $(function(){
            //快捷导航
            var timeout;
            $(".global-site").click(function(){
                $(".website-frame").slideToggle(300);
            });
            $(".website-frame").mouseleave(function(){
                $(this).slideUp(300);
            });
            $(".icon-search").click(function(){
                $(".search-frame").slideToggle(300);
            });
            $(".search-frame").mouseleave(function(){
                $(this).slideUp(300);
            });

            //菜单
            $(".primary-menu li").hover(function(){
                var $this = $(this);
                timeout = setTimeout(function(){
                    $this.children(".secondary-menu").slideDown(300);
                }, 300);
            }, function(){
                clearTimeout(timeout);
                $(this).children(".secondary-menu").slideUp(300);
            });

            $(".icon-menu").click(function(){
                $(this).toggleClass('icon-menu-close');
                $('.primary-menu').slideToggle(300);
            });

            //内页语言切换
            $(".languageselector .show-item").click(function(){
                var $language = $(this).siblings('.language');
                if($language.is(":hidden"))
                    $language.slideDown(100);
                else
                    $language.slideUp(100);
            });

            //产品页面视频播放
            $(".media-info img, .media-info .video").click(function(){
                var name = $(".media-info .video").attr('data-name');
                var video = $(".media-info .video").attr('data-video');
                if(name)
                    camelway.playVideo(name, video);
            });

        });
    });
}else{
    camelway.loadScript(['//data.camelway.net/static/js/jquery.min.js', '//data.camelway.net/static/js/jquery.scroll.min.js'], function(){
        $(function(){
            //快捷导航
            var timeout;
            $(".global-site").click(function(){
                $(".website-frame").slideToggle(300);
            });
            $(".website-frame").mouseleave(function(){
                $(this).slideUp(300);
            });
            $(".icon-search").click(function(){
                $(".search-frame").slideToggle(300);
            });
            $(".search-frame").mouseleave(function(){
                $(this).slideUp(300);
            });

            //菜单
            $(".primary-menu li").hover(function(){
                var $this = $(this);
                timeout = setTimeout(function(){
                    $this.children(".secondary-menu").slideDown(300);
                }, 300);
            }, function(){
                clearTimeout(timeout);
                $(this).children(".secondary-menu").slideUp(300);
            });

            $(".icon-menu").click(function(){
                $(this).toggleClass('icon-menu-close');
                $('.primary-menu').slideToggle(300);
            });

            //内页语言切换
            $(".languageselector .show-item").click(function(){
                var $language = $(this).siblings('.language');
                if($language.is(":hidden"))
                    $language.slideDown(100);
                else
                    $language.slideUp(100);
            });

            //首页产品切换
            var timeout;
            $(".app-item li").hover(function(){
                var $this = $(this);
                timeout = setTimeout(function(){
                    $this.addClass('focus').siblings().removeClass('focus');
                }, 50);
            }, function(){
                clearTimeout(timeout);
            });
            //首页banner效果
            var bannercount = $('.primary-banner').children('div').length;
            var selector = "<span class=\"banner-selector\"><i class=\"selected\"></i>"+"<i></i>".repeat(bannercount-1)+"</span>";
            function showbannerindex(index){
                $(".primary-banner .banner-selector i").eq(index).addClass("selected").siblings().removeClass("selected");
            }
            var indexshow = $('.primary-banner').scroll('left', 6000, 1000, showbannerindex);
            $('.primary-banner').append(selector);
            if(camelway.visitor.isMobile){
                indexshow.touchscroll();
            }else{
                indexshow.scroll($(".primary-banner .banner-selector"),"selected");
            }
        });
    });
}
