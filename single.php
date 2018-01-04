<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sonnet
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			if($post->post_excerpt) : ?>
			<section class="excerpt col-1-2">

				<h2><?php the_excerpt(); ?></h2>

			</section>
			<?php endif;

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
