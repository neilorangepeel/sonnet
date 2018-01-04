<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sonnet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post grid'); ?>>

	<?php the_post_thumbnail('fullWidth', array('class' => 'featIMG')); ?>

	<div class="col-1-2 page-title">
		<h1><?php the_title(); ?></h1>
		<?php if (in_category('blog')): ?>
		<h3><time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('jS F Y'); ?></time></h3>
		<?php endif; ?>
	</div>

	<div class="col-1-2">
		<?php the_content(); ?>

		<?php if (in_category('blog')): ?>
		<p><?php the_tags(); ?></p>
		<?php endif; ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</div>
</article>
