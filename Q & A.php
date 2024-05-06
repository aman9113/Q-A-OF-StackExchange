Q. How to Make a Custom Results Page for a Custom Post Type with Block Editor

Solution :-

**Step 1 PHP Code**


function custom_post_type_registration() {
    register_post_type('my_custom_post_type', array(
        'labels' => array(
            'name' => __('Custom Posts'),
            'singular_name' => __('Custom Post'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'custom-posts'),
    ));
}
add_action('init', 'custom_post_type_registration');

 **Step 2 PHP Code** 


<?php
/**
 * Template Name: Custom Post Type Archive
 */

get_header();

// Your custom query to retrieve posts of your custom post type
$args = array(
    'post_type' => 'my_custom_post_type',
    'posts_per_page' => -1, // Retrieve all posts
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Display post content using blocks or custom HTML/CSS
        the_title('<h2>', '</h2>');
        the_content();
    endwhile;
endif;

wp_reset_postdata();

get_footer();
?>

  **Step 3 PHP Code**
  

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        echo '<div class="custom-post">';
        echo '<h2>' . get_the_title() . '</h2>';
        echo '<div class="post-content">' . get_the_content() . '</div>';
        echo '</div>';
    endwhile;
endif;


