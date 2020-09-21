<div class="side-tags">
    <h3>Tags</h3>
<?php 
$tags = get_tags(array('orderby'=>'rand', 'number'=>15));
foreach($tags as $tag)
    echo sprintf('<a href="%s" style="font-size:%dpx">%s</a>', $tag->get_permalink(), rand(12, 18), $tag->name);
?>

</div>
