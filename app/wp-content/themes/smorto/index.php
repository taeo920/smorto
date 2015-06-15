<div class="container">
	<div class="row">
        <section class="intro col-xs-12">
            <div class="headline">
                <h1 class="site-title">Steve Morton</h1>
                <h3 class="site-sub-title">PHP Web Developer</h3>
            </div>
        </section>
	</div>
</div>

<div class="container-fluid">
    <div class="row">
        <section id="work" class="work module">
            <?php $projects = get_posts( array('post_type' => 'project', 'numberposts' => 6, 'orderby' => 'menu_order', 'order' => 'ASC' ) ); ?>
            <?php foreach( $projects as $post ) : setup_postdata( $post ); ?>
                <div class="work-item-container">
                    <a class="work-item" href="<?php the_field('url'); ?>" target="_blank">
                        <img class="screenshot" src="<?php the_field('screenshot'); ?>">
                        <div class="details">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="description composition"><?php the_content(); ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; wp_reset_query(); ?>
        </section>
    </div>
</div>

<div class="container">
    <div class="row">
        <section id="experience" class="experience module col-xs-12">
            <h2 class="module-title">Experience</h2>
            <?php $experience_types = get_terms('experience-type'); ?>
            <?php foreach( $experience_types as $experience_type ) : ?>
                <h4 class="module-sub-title"><?php echo $experience_type->name; ?></h4>
            
                <ul class="experience-items">
                    <?php
                        $args = array(
                            'post_type' => 'experience',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'experience-type',
                                    'field' => 'slug',
                                    'terms' => $experience_type->slug
                                )
                            ),
                            'numberposts' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        );
                        $experiences = get_posts( $args );
                    ?>
                    
                    <?php foreach( $experiences as $post ) : setup_postdata( $post ); ?>
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
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            <?php endforeach; ?>
        </section>
    </div>
    <div class="row">
        <section id="skills" class="skills module col-xs-12">
            <h2 class="module-title">Skills</h2>
            
            <h4 class="module-sub-title">Core</h4>
            <ul class="skills-core">
                <li>
                    <h4 class="skill-title">WordPress</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-wordpress.png">
                </li>
                <li>
                    <h4 class="skill-title">PHP</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-php.png">
                </li>
                <li>
                    <h4 class="skill-title">jQuery</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-jquery.png">
                </li>
                <li>
                    <h4 class="skill-title">HTML5</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-html5.png">
                </li>
                <li>
                    <h4 class="skill-title">CSS3</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-css3.png">
                </li>
                <li>
                    <h4 class="skill-title">JavaScript</h4>
                    <img src="<?php bloginfo('template_url'); ?>/images/badge-javascript.png">
                </li>
            </ul>
            
            <h4 class="module-sub-title">Other</h4>
            <ul class="skills-other">
                <li>Git</li>
                <li>SEO</li>
                <li>Photoshop</li>
                <li>Bootstrap</li>
                <li>LESS</li>
                <li>LAMP Config</li>
                <li>mySQL</li>
                <li>NPM</li>
                <li>Gulp</li>
                <li>Browserify</li>
                <li>SOAP/REST</li>
                <li>AJAX</li>
            </ul>
        </section>
    </div>
    <div class="row">
        <section id="contact" class="contact module col-xs-12">
            <h2 class="module-title">Contact</h2>
            <ul class="contact-list">
                <li class="icon-linkedin"><a href="https://www.linkedin.com/pub/steve-morton/a9/310/b06" target="_blank">https://goo.gl/hyV6lD</a></li>
                <li class="icon-email-envelope"><a href="mailto:smorton920@gmail.com">smorton920@gmail.com</a></li>
            </ul>
        </section>
    </div>
</div>