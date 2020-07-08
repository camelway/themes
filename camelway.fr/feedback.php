<div class="feedback" id="feedback">
    <form action="<?php dminfo('feedback_url')?>" method="post" onsubmit="return ajax_submit(this);">
        <p class="headline">Obtenez le prix et le support</p>
        <p class="description">S'il vous plaît laissez votre message ici! Nous vous enverrons des informations techniques détaillées et des devis!(Vos données ne seront utilisées que pour vous répondre!)</p>
        <p><input type="text" name="user_name" placeholder="Nom:*" required></p>
        <p><input type="text" name="user_mobile" placeholder="Téléphone:*" required></p>
        <p><input type="text" name="user_email" placeholder="Email:"></p>
        <p><input type="text" name="content" placeholder="Inquiry: product, capacity, delivery port, etc.(required)" required></p>
        <p><input type="submit" value="Soumettre"></p>
    </form>
</div>
