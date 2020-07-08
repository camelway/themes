<?php get_header();?>
<div class="container not-found-404">
    <div class="icon not-found-txt">4&#xe9e1;4</div>
    <h1>Page Not Found</h1>
    <p>Will Return to Home Page in <span class="countdown">5</span> Seconds</p>
    <div class="action">
        <a class="tohome" href="<?php dminfo('home')?>">Home</a>
        <a class="chatonline talkonline" href="javascript:void(0);">Online Service</a>
    </div>
<script>
var countdown = setInterval(function(){
    var selector = document.querySelector('.countdown');
    var second = selector.innerHTML;
    if(second == 1){
        window.location.href = '<?php dminfo('home')?>';
        clearInterval(countdown);
    }else{
        second--;
        selector.innerHTML = second;
    }
},1200);
</script>
</div>
<?php get_footer();?>
