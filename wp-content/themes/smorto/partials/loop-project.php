<div class="work-item-container">
    <a class="work-item" href="<?php the_field('url'); ?>" target="_blank">
        <img class="screenshot" src="<?php the_field('screenshot'); ?>">
        <div class="details">
            <h3 class="title"><?php the_title(); ?></h3>
            <div class="description composition"><?php the_content(); ?></div>
        </div>
    </a>
</div>