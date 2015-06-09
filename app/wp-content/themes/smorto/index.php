<div class="container">
	<div class="row">
        <section class="intro col-xs-12">
            <div class="headline">
                <h1>Steve Morton</h1>
                <h3>PHP Web Developer</h3>
                <div class="test"></div>
            </div>
        </section>
	</div>
</div>

<div class="container-fluid">
    <div class="row">
        <section class="work">
            <?php $posts = get_posts( array('post_type' => 'project', 'numberposts' => 6 ) ); ?>
            <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                <div class="work-item-container">
                    <div class="work-item">
                        <img class="screenshot" src="<?php the_field('screenshot'); ?>">
                        <h3 class="title"><a href="<?php the_field('url'); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endforeach; wp_reset_query(); ?>
        </section>
    </div>
</div>

<div class="container">
    <div class="row">
        <section class="experience col-xs-12">
            <h2>Experience</h2>
        </section>
    </div>
    <div class="row">
        <section class="skills col-xs-12">
            <h2>Skills</h2>
        </section>
    </div>
    <div class="row">
        <section class="contact col-xs-12">
            <h2>Contact</h2>
        </section>
    </div>
</div>