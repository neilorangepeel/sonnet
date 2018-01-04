<?php
/**
 * Template Name: Blog
 *
 * The template for displaying all blog posts.
 *
 * @package sonnet
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="main blog-page grid" role="main">

        <?php if($post->post_excerpt) : ?>
        <section class="excerpt col-1-2">

            <h2><?php the_excerpt(); ?></h2>

        </section>
        <?php endif; ?>

        <?php the_post_thumbnail(); ?>

        <section class="blogroll col-2-3">

            <?php
                $args = array(
                    'category_name' => 'blog',
                    'paged' 		=> $paged
                );
                $wp_query = new WP_Query(); $wp_query->query($args); if ( $wp_query->have_posts() ) :

                // Start the Loop
                while ( $wp_query->have_posts() ) : $wp_query->the_post();
            ?>

            <article class="single-article">
                <h3><time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('jS F Y'); ?></time></h3>
                <h1 class="post-title"><a href="<?php the_permalink() ;?>"><?php the_title(); ?></a></h1>
                <?php the_post_thumbnail('halfWidth', array('class' => 'featIMG')); ?>
                <?php the_content(); ?>
                <p><?php the_tags(); ?></p>
            </article>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else: endif; ?>

            <?php tt_sonnet_pagination(); ?>
        </section>

        <section class="sidebar col-1-3">
           <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
           <?php endif; ?>
        </section>

    </main>

</div><!-- #primary -->

<?php get_footer(); ?>
