<div class="wrap secondary-banner"<?php the_secondary_banner();?>>
    <div class="container">
        <h2 class="compact-title"><?php if(is_single()){ the_subtitle(); } elseif(is_category()){ the_category_name();};?></h2>
        <!--<?php if(get_category_description()){?><p class="compact-excerpt"><?php echo dm_trim_words(get_category_description(), 200, '')?></p><?php }?>-->
    </div>
</div>
