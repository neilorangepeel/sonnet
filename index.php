<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sonnet
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="main group" role="main">

	        <?php if(get_bloginfo('description') <> '') { ?>

	        <section class="tagline col-1-2">

	            <h2><?php bloginfo('description'); ?></h2>

	        </section>

	        <?php } ?>

	        <section class="portfolio group">


				<?php
					$i    = null;
					$exclude  = get_cat_id('blog');
					$args = array(
						'category__not_in' => $exclude,
						'paged' 		   => $paged
					);
					$wp_query = new WP_Query(); $wp_query->query($args); if ( $wp_query->have_posts() ) :

					// Start the Loop
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
				?>

				<div class="entry">

					<?php if($i%5 == 0) : ?>
		                <?php the_post_thumbnail('5x4'); ?>

		            <?php elseif($i%5 == 1) : ?>
		                <?php the_post_thumbnail('5x4'); ?>

		            <?php else: ?>
		                <?php the_post_thumbnail('1x1'); ?>

		            <?php endif; ?>

		            <?php $i++; ?>

	                <a href="<?php the_permalink(); ?>">
	                    <h2><?php the_title(); ?></h2>
	                </a>

	            </div>

		        <?php endwhile; ?>

				<!--------->

				<?php if($i%2 == 0) : ?>
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>

							<style>
								.post-<?php the_ID(); ?> .parallax__layer--back {
									background-image: url('<?php echo $image[0]; ?>');
								}
							</style>
						<?php endif; ?>
						<div <?php post_class('parallax__group'); ?>>
							<div class="parallax__layer parallax__layer--base">
								<?php the_title( '<h2 class="parallax-title teacher-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
							</div>
							<div class="parallax__layer parallax__layer--back"></div>
						</div><!-- parallax__group -->

				 <?php else: ?>
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>

						<style>
							.post-<?php the_ID(); ?> .parallax__layer--base {
								background-image: url('<?php echo $image[0]; ?>');
							}
						</style>
					<?php endif; ?>
					<div <?php post_class('parallax__group'); ?>>
						<div class="parallax__layer parallax__layer--fore">
							<?php the_title( '<h2 class="parallax-title teacher-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						</div>
						<div class="parallax__layer parallax__layer--base"></div>
					</div><!-- .parallax__group -->

				 <?php endif; ?>


				<?php $i++; ?>
				<!--------->



		        <?php wp_reset_postdata(); ?>

		        <?php else: endif; ?>

				</section>

				<?php tt_sonnet_pagination(); ?>

		    </main>

	</div><!-- #primary -->

<?php
get_footer();
