<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="entry-content">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => '6',
                    'paged' => 1,
                );
                $blog_posts = new WP_Query($args);
                ?>

                <?php if ($blog_posts->have_posts()) : ?>
                    <div class="blog-posts">
                        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        <?php endwhile; ?>
                    </div>
                    <button class="loadmore">Load More...</button>
                <?php endif; ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>