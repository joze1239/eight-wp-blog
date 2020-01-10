<?php

function load_posts($paged = 0, $posts_per_page = 6, $tag = '', $search = '')
{
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'tag' => $tag,
        's' => $search
    );
    $blog_posts = new WP_Query($args);

    if ($blog_posts->have_posts()) : ?>
        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
        <?php endwhile; ?>
<?php
    endif;
}

function load_posts_by_ajax_callback()
{
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $posts_per_page = $_POST['posts_per_page'];
    $tag = $_POST['tag'];
    $search = $_POST['search'];
    load_posts($paged, $posts_per_page, $tag, $search);

    wp_die();
}

function load_stylsheets()
{
    wp_register_style('custom_style', get_template_directory_uri() . '/css/style.css', array(), 1, 'all');
    wp_enqueue_style('custom_style');
}

function load_scripts()
{
    // Register the script
    wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('custom-script', 'blog', $script_data_array);

    // Enqueued script with localized data.
    wp_enqueue_script('custom-script');
}

add_action('wp_enqueue_scripts', 'load_scripts');
add_action('wp_enqueue_scripts', 'load_stylsheets');

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


add_theme_support('post-thumbnails');
define('FS_METHOD', 'direct');
