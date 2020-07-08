<div class="wrap footer">
    <div class="container">
        <ul class="secondary-navigation">
        <li>
            <h3><?php the_category_name(1);?></h3>
            <nav>
<?php
$posts = get_posts('category=1'); foreach($posts as $post){
?>
                <a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a>
<?php } ?>
            </nav>
        </li>
        <li>
            <h3><?php the_category_name(6);?></h3>
            <nav>
<?php
$posts = get_posts('category=6'); foreach($posts as $post){
?>
                <a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_subtitle;?></a>
<?php } ?>
            </nav>
        </li>
        <li>
            <h3><?php the_category_name(10);?></h3>
            <nav>
            <nav>
<?php
$posts = get_posts('category=10&numberposts=6&orderby=rand'); foreach($posts as $post){
?>
                <a href="<?php echo $post->get_permalink();?>"><?php echo $post->post_tips;?></a>
<?php } ?>
            </nav>
        </li>
        <li>
            <h3>Contact US</h3>
            <p>Email: info@camelway.com</p>
            <p>TEl: +8637165861518</p>
            <p>Mobile: +8618838109566</p>
            <p>whatsapp: +8618838109566</p>
            <p>Address: No.446 ZhengShang Road, ZhengZhou China</p>
        </li>

        <li>
            <h3>Follow us</h3>
            <nav>
                <a href="https://www.facebook.com/camelway/" class="icon-facebook" rel="nofollow" target="_blank">FaceBook</a>
                <a href="https://www.youtube.com/channel/UC9dCYzdL212an-4DYbIb_3A?view_as=subscriber" class="icon-youtube" rel="nofollow" target="_blank">YouTube</a>
                <a href="https://twitter.com/Camelway_Group" class="icon-twitter" rel="nofollow" target="_blank">Twitter</a>
                <a href="#" class="icon-linkedin" rel="nofollow" target="_blank">LinkedIn</a>
            </nav>
        </li>
        </ul>
        <div class="certificate">
            <img src="<?php dminfo('template_url')?>images/ce.png" alt="CE">
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            &copy;<?php echo date('Y')?> Camelway Machinery
            <div class="links" id="legal">
            <?php if(is_home()) { ?>
                &nbsp;&nbsp; <a href="http://www.beian.miit.gov.cn/" target="_blank" rel="_nofollow">豫ICP备19008660号</a>
            <?php } ?>
                &nbsp;&nbsp;<a href="<?php the_permalink(2);?>#privacy" rel="nofollow">Privacy Protection</a></div>
        </div>
    </div>
</div>
<?php get_template_part('widget', 'float-assistant');?>
<script src="<?php dminfo('template_url')?>js/camelway.js?v=2020:1"></script>
<script language="javascript" src="https://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT10517310&lng=en"></script>
</body>
</html>
