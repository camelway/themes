<div class="rate">
    <span class="prompt">Rate this Article:</span>
    <form method="POST" id="rating" action-xhr="<?php dminfo('ajax_url')?>?action=rating&id=<?php the_ID();?>" target="_blank">
        <fieldset class="stars">
            <input name="score" type="radio" id="rating5" value="5" on="change:rating.submit"><label for="rating5" title="Need It Now">&#xe926;</label>
            <input name="score" type="radio" id="rating4" value="4" on="change:rating.submit"><label for="rating5" title="Planning to buy">&#xe926;</label>
            <input name="score" type="radio" id="rating3" value="3" on="change:rating.submit"><label for="rating5" title="How Much?">&#xe926;</label>
            <input name="score" type="radio" id="rating2" value="2" on="change:rating.submit"><label for="rating5" title="A Little Interest">&#xe926;</label>
            <input name="score" type="radio" id="rating1" value="1" on="change:rating.submit"><label for="rating5" title="No Interest">&#xe926;</label>
        </fieldset>
        <div submit-success class="tips"><template type="amp-mustache">{{message}}</p></template></div>
    </form>
</div>
