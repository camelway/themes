<div class="wrap feedback" id="feedback">
    <div class="container">
        <p class="headline">Obtenez le prix et le support</p>
        <!--<p class="slogan">Get a Quote Directly from the Manufacturer</p>-->
        <p class="description">S'il vous plaît laissez votre message ici! Nous vous enverrons des informations techniques détaillées et des devis!(Vos données ne seront utilisées que pour vous répondre!)</p>
        <form method="post" action-xhr="<?php dminfo('feedback_url')?>" target="_top">
            <p><input type="text" name="user_name" placeholder="Nom:*" required></p>
            <p><input type="text" name="user_mobile" placeholder="Téléphone:*" required></p>
            <p><input type="email" name="user_email" placeholder="Email:"></p>
            <p><input type="text" name="content" placeholder="Detail Request. Product,Capacity,Country etc." required></p>
            <p>
                <div submit-success class="result"><template type="amp-mustache"><span class="icon"></span>{{error_message}}</template></div>
                <input type="hidden" name="format" value="json">
                <input type="submit" value="Soumettre">
            </p>
        </form>
    </div>
</div>
