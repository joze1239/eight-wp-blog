<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="entry-content">
                <?php
                // Example of loading posts
                /*
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
                <?php endif; */ ?>
                <div class="blog-posts">
                    <?php load_posts(); ?>
                </div>
                <button id="loadmore">Load More...</button>
                <select id="select_tag">
                    <option value="All">All categories</option>
                    <option value="Culture">Culture</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Product">Product</option>
                    <option value="Trending">Trending</option>
                </select>
                <input id="search" type="text" placeholder="Search" /> 
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>