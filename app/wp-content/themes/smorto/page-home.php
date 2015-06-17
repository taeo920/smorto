<?php /* Template Name: Home */ ?>
<?php the_post(); ?>

<div class="container">
	<div class="row">
        <section class="intro col-xs-12">
            <?php the_content(); ?>
        </section>
	</div>
</div>

<div class="container-fluid">
    <div class="row">
        <section id="work" class="work">
            <?php try_posts_loop( get_field('featured_projects'), 'project'); ?>
        </section>
    </div>
</div>

<div class="container">
    <div class="row">
        <section id="experience" class="experience module">
            <h2 class="module-title">Experience</h2>
            <?php foreach( get_terms('experience-type') as $experience_type ) : ?>
                <h4 class="module-sub-title"><?php echo $experience_type->name; ?></h4>
            
                <ul class="experience-items">
                    <?php try_posts_loop( try_get_experiences( $experience_type->slug ), 'experience'); ?>
                </ul>
            <?php endforeach; ?>
        </section>
    </div>
    <div class="row">
        <section id="skills" class="skills module">
            <h2 class="module-title">Skills</h2>
            
            <h4 class="module-sub-title">Core</h4>
            <ul class="skills-core">
                <?php while ( have_rows('skills-core') ) : the_row(); ?>
                    <li>
                        <h4 class="skill-title"><?php the_sub_field('skill'); ?></h4>
                        <img src="<?php the_sub_field('badge'); ?>" alt="<?php the_sub_field('skill'); ?>">
                    </li>                 
                <?php endwhile; ?>
            </ul>
            
            <h4 class="module-sub-title">Other</h4>
            <ul class="skills-other">
                <?php while ( have_rows('skills-other') ) : the_row(); ?>
                    <li><?php the_sub_field('skill'); ?></li>                 
                <?php endwhile; ?>
            </ul>
        </section>
    </div>
    <div class="row">
        <section id="contact" class="contact module">
            <h2 class="module-title">Contact</h2>
            <ul class="contact-list">
                <li class="icon-linkedin"><a href="https://www.linkedin.com/pub/steve-morton/a9/310/b06" target="_blank">https://goo.gl/hyV6lD</a></li>
                <li class="icon-email-envelope"><a href="mailto:smorton920@gmail.com">smorton920@gmail.com</a></li>
            </ul>
        </section>
    </div>
</div>