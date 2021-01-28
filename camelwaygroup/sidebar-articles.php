<div class="side-articles">
    <h3>Popular Articles</h3>
    <ul>
<?php
$posts = get_posts(array('number'=>5,'orderby'=>'rand','category'=>10));
foreach($posts as $post){
    echo sprintf('<li><a href="%s" title="%s">%s</a></li>', $post->get_permalink(), $post->post_title, $post->post_subtitle);
}
?>
    </ul>
</div>
