<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sonnet
 */



get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="main blog-page grid" role="main">

			<section class="tagline col-1-2">
				<h2>
					<?php
						printf( esc_html__( 'Search Results for: %s', 'tt-sonnet' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
			</section>

	        <section class="blogroll col-2-3">

	            <?php if (have_posts()) : ?>
	            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	            <?php while (have_posts()) : the_post(); ?>

	            <article class="single-article">
	                <h3><time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('jS F Y'); ?></time></h3>
	                <h1 class="post-title"><a href="<?php the_permalink() ;?>"><?php the_title(); ?></a></h1>
	                <?php the_post_thumbnail('full', array('class' => 'featIMG')); ?>
	                <?php the_content(); ?>
	                <p><?php the_tags(); ?></p>
	            </article>

	            <?php endwhile; ?>
	            <?php else: endif; ?>

				<?php tt_sonnet_pagination(); ?>
	        </section>

	        <section class="sidebar col-1-3">
	           <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
	           <?php endif; ?>
	        </section>


	    </main>

	</div><!-- #primary -->


<?php
get_footer();
