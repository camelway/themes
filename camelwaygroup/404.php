<?php get_header();?>
<div class="wrap notfound">
    <div class="lost">
        <img src="<?php dminfo('template_url')?>media/404.png" alt="404 Photo">
        <div class="explain">
            <p>The page was not found on this server.</p>
            <a href="<?php dminfo('home_url')?>">Go Home</a>
            <a href="<?php the_permalink(2)?>">Contact Us</a>
        </div>
    </div>
</div>
<?php get_footer();