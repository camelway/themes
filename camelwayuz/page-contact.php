<div class="container breadcrumb"><?php breadcrumb_nav();?></div>
<div class="container page-content">
    <h1 class="title"><?php the_subtitle()?></h1>
    <div class="prompt entry-content"><?php the_content();?></div>
    <ul class="sales">
<?php
$users = get_users('group=uz-sales&orderby=rand');
foreach($users as $user){    
?>
        <li>
            <div class="avatar">
                <img src="<?php echo $user->get_meta('avatar')?>" alt="<?php echo $user->display_name;?>" width="100" height="100">
            </div>
            <div class="info">
                <p class="name"><?php echo $user->display_name?></p>
                <p class="department"><?php echo $user->get_meta('department')?></p>
                <p class="position"><?php echo $user->get_meta('title')?></p>
                <p class="tel"><?php echo $user->get_meta('tel')?></p>
                <p class="email"><?php echo $user->get_meta('email')?></p>
            </div>
        </li>
<?php } ?> 
    </ul>
</div>
<?php get_template_part('widget', 'contact');?>
