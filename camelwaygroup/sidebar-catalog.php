<div class="side-catalog">
    <ul>
        <li><a href="<?php the_category_link(2)?>"><?php the_category_name(2);?></a>
            <ul>
<?php 
foreach(get_posts('cat=2&posts_per_page=20') as $p){
?>
                <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a></li>
<?php } ?>
            </ul>
        </li>
        <li><a href="<?php the_category_link(3)?>"><?php the_category_name(3);?></a>
            <ul>
<?php 
foreach(get_posts('cat=3&posts_per_page=20') as $p){
?>
            <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a></li>
<?php } ?>
            </ul>
        </li>
        <li><a href="<?php the_category_link(4)?>"><?php the_category_name(4);?></a>
            <ul>
            <li><a href="<?php the_category_link(5)?>"><?php the_category_name(5);?></a>
<?php 
foreach(get_posts('cat=4&posts_per_page=20') as $p){
?>
            <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a></li>
<?php } ?>
            </ul>
        </li>
        <li><a href="<?php the_category_link(6)?>">Concrete Pump</a>
            <ul>
<?php 
foreach(get_posts('cat=6&posts_per_page=20') as $p){
?>
            <li><a href="<?php echo $p->get_permalink()?>"><?php echo $p->post_subtitle?></a></li>
<?php } ?>
            </ul>
        </li>
    </ul>
</div>
