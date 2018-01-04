<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sonnet
 */

?>

		</div><?php # END content ?>

	</div><?php # END wrapper ?>

<footer class="footer grid" role="contentinfo">
    <div class="col-1-2">

        <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>. Design by <a href="http://tinktank.in">Tink <span class="tinktank">⚒</span> Tank</a>.</p>

        <?php
    		if ( has_nav_menu( 'social' ) ) : ?>
    			<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'sonnet' ); ?>">
    				<?php
    					wp_nav_menu( array(
    						'theme_location' => 'social',
    						'menu_class'     => 'social-menu',
    						'depth'          => 1,
    						'link_before'    => '<span class="screen-reader-text">',
    						'link_after'     => '</span>' . sonnet_get_svg( array( 'icon' => 'chain' ) ),
    					) );
    				?>
    			</nav><!-- .social-navigation -->
    		<?php endif;
    	?>
    </div>

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets')) : else : ?>
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>

</html>
