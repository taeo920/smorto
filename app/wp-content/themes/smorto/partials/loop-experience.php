<li class="experience-item row">
    <div class="col-sm-4 left">
        <h4 class="experience-company"><?php the_title(); ?></h4>
        <h6 class="experience-title"><?php the_field('title'); ?></h6>
        <small class="experience-date-range"><?php the_field('date_range'); ?></small>
    </div>
    <div class="col-sm-8 right">
        <div class="experience-description composition"><?php the_content(); ?></div>
    </div>
</li>