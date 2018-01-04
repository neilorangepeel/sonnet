<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sonnet
 */


/**
 * Flush out the transients used in tt_sonnet_categorized_blog.
 */
function tt_sonnet_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tt_sonnet_categories' );
}
add_action( 'edit_category', 'tt_sonnet_category_transient_flusher' );
add_action( 'save_post',     'tt_sonnet_category_transient_flusher' );


if ( ! function_exists( 'tt_sonnet_pagination' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tt_sonnet_pagination() {

    the_posts_navigation( array(
        'prev_text' => __( '&laquo; Older', 'tt-sonnet' ),
        'next_text' => __( 'Newer &raquo;', 'tt-sonnet' ),
    ) );

}
endif;
