<?php

/*
	This is Voice Child Theme functions file
	You can use it to modify specific features and styling of Voice Theme
*/

add_action( 'after_setup_theme', 'vce_child_theme_setup', 99 );

function vce_child_theme_setup() {
	add_action( 'wp_enqueue_scripts', 'vce_child_load_scripts' );
}

function vce_child_load_scripts() {
	wp_register_style( 'vce_child_load_scripts', trailingslashit( get_stylesheet_directory_uri() ).'style.css', false, VOICE_THEME_VERSION, 'screen' );
	wp_enqueue_style( 'vce_child_load_scripts' );
}

function example_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <?php the_content(); ?>
                </li>
            </ul>
        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;

}

?>
