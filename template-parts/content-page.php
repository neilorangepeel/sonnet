<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sonnet
 */

?>

<?php if($post->post_excerpt) : ?>
<section class="excerpt col-1-2">

	<h2><?php the_excerpt(); ?></h2>

</section>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-page grid'); ?>>

	<?php the_post_thumbnail('fullWidth', array('class' => 'featIMG')); ?>

	<div class="col-1-2 page-title">
		<h1><?php the_title(); ?></h1>
	</div>

	<div class="col-1-2">
		<?php the_content(); ?>
	</div>

</article>
