<div class="wrap about-banner">
    <div class="container breadcrumb"><?php breadcrumb_nav();?></div>
    <div class="container">
        <h1 class="title"><?php the_subtitle()?></h1>
    </div>
</div>
<div class="wrap about-content">
    <div class="container entry-content">
        <img src="<?php the_thumbnail()?>" alt="<?php the_subtitle()?>" class="thumbnail">
        <?php the_content();?>
    </div>
</div>
<div class="container about-why">
    <div class="headline">
        <h2>Nega bizni tanlaydilar?</h2>
        <p>Biz ishlab chiqaruvchimiz, shuning uchun siz eng yuqori sifatli mahsulotlarni eng past narxga olishingiz, mahsulotimizni tanlashingiz mumkin, sotishdan keyingi xizmat va sifat muammolari haqida tashvishlanishingiz shart emas. </p>
    </div>
    <ul>
        <li>
            <span class="icon">&#xe905;</span>
            <h3>Design</h3>
            <p>We have professional sales and technical engineers, who can not only help you choose the right equipment, but also help you design production plans for free.</p>
        </li>
        <li>
            <span class="icon">&#xe906;</span>
            <h3>Installation & training</h3>
            <p>Good equipment needs perfect implementation, we provide free equipment installation and training services.</p>
        </li>
        <li>
            <span class="icon">&#xe903;</span>
            <h3>Accessories Service</h3>
            <p>Original spare parts and accessories, respond to your replacement needs in the fastest time.</p>
        </li>
        <li>
            <span class="icon">&#xe904;</span>
            <h3>After Sales Support</h3>
            <p>Sales engineers are on standby at any time to ensure the safe and stable operation of equipment.</p>
        </li>
    </ul>
</div>
<div class="container">
    <?php get_template_part('widget', 'company');?>
</div>
<?php get_template_part('widget', 'form-map');?>
