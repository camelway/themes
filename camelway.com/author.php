<?php get_header(); ?>
<div class="wrap secondary-banner" style="background-image: url(<?php dminfo('template_url')?>images/author.jpg)";> </div>
<style>
.author .author-info {
    text-align: center;
}
.author .author-info img {
    max-width: 180px;
}
.author .author-detail {
    position: relative;
    margin-top: 20px;
    padding: 0 4em;
}
.author .author-detail:before {
    content: '\e964';
    position: absolute;
    top: -.5em;
    left: 0;
    font-size: 3em;
    color: #ebebeb;
}
.author .author-detail:after {
    content: '\e965';
    position: absolute;
    right: 0;
    bottom: -.5em;
    font-size: 3em;
    color: #ebebeb;
}
.author .contact-info {
    display: flex;
    display: -webkit-flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 50px;
}
.author .contact-info li {
    margin: 5px auto;
    width: 200px;
    height: 150px;
    text-align: center;
    background: #f5f5f5;
}
.author .contact-info li:before {
    display: block;
    margin-top: 30px;
    font-size: 2em;
    text-align: center;
    color: #ccc;
}
.author .contact-info .tel:before {
    content: '\e940';
}
.author .contact-info .wechat:before {
    content: '\e9c5';
}
.author .contact-info .email:before {
    content: '\e9b7';
}
.author .contact-info .whatsapp:before {
    content: '\e9c4';
}
.author .contact-info .facebook:before {
    content: '\e9c1';
}
.author .contact-info .linkedin:before {
    content: '\e9c8';
}
@media(max-width: 600px) {
    .author .author-detail {
        padding: 0;
    }
}
</style>
<div class="wrap author">
    <div class="container content-section">
        <div class="author-info">
            <img src="<?php the_author_meta('avatar');?>" alt="<?php the_author();?>">
            <h1><?php the_author()?></h1>
            <span><?php the_author_meta('company');?></span>  <span><?php the_author_meta('department');?></span>  <span><?php the_author_meta('title')?></span>
        </div>
        <blockquote class="author-detail">
            <?php the_author_meta('description');?>
        </blockquote>
        <ul class="contact-info">
                <?php if(get_the_author_meta('tel')){ ?><li class="tel">Mobile<br><?php the_author_meta('tel');?></li><?php } ?>
                <?php if(get_the_author_meta('wechat')){ ?><li class="wechat">Wechat<br><?php the_author_meta('wechat');?></li><?php } ?>
                <?php if(get_the_author_meta('email')){ ?><li class="email">Email<br><?php the_author_meta('email');?></li><?php } ?>
                <?php if(get_the_author_meta('whatsapp')){ ?><li class="whatsapp">whatsapp<br><?php the_author_meta('whatsapp');?></li><?php } ?>
                <?php if(get_the_author_meta('facebook')){ ?><li class="facebook">FaceBook<br><?php the_author_meta('facebook');?></li><?php } ?>
                <?php if(get_the_author_meta('linkedin')){ ?><li class="linkedin">LinkedIn<br><?php the_author_meta('linkedin');?></li><?php } ?>
            <ul>
    </div>

    <div class="container content-section">
        <h2>Posts</h2>
        <ul class="item-list-common">
<?php
while(have_posts()){
    the_post();
?>
        <li>
            <div class="item-pubdate">
                <span class="ym"><?php the_time('Y-m');?></span>
                <span class="day"><?php the_time('d');?></span>
            </div>
            <div class="item-excerpt">
                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                <p><?php echo dm_trim_words(get_the_excerpt(), 250);?></p>
            </div>
        </li>
<?php }?>
        <ul>
        </div>

    <?php get_template_part('widget', 'inquiry-form');?>

</div>

<?php
get_footer();
