<?php get_header(); ?>


    <div id="primary" class="content-area">

		<main id="main" class="main group" role="main">

	        <section class="tagline col-1-2">
                <?php
                    the_archive_title( '<h2 class="page-title">', '</h2>' );
                ?>
	        </section>

	        <section class="portfolio group">


                <?php if (have_posts()) : ?>
                <?php $i    = null; ?>
                <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                <?php while (have_posts()) : the_post(); ?>

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

                <?php else: endif; ?>

				</section>

				<?php tt_sonnet_pagination(); ?>

		    </main>

	</div><!-- #primary -->


<?php get_footer(); ?>
