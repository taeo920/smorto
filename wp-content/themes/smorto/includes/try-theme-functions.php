<?php

/**
 * Retrieve work experience posts per type
 *
 * @param string $experience_type_slug Slug for given experience type
 *
 * @return array Post objects
 */
function try_get_experiences( $experience_type_slug ) {
   $args = array(
        'post_type' => 'experience',
        'tax_query' => array(
            array(
                'taxonomy' => 'experience-type',
                'field' => 'slug',
                'terms' => $experience_type_slug
            )
        ),
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    
    return get_posts( $args );
}