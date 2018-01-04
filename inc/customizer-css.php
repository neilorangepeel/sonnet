<?php

// CUSTOMIZER CSS TO <head>
function tt_sonnet_customizer_css() {
    ?>
    <style>
        a,
        .logo a:hover,
        .logo a:focus,
        .blogroll .post-title a:hover,
        .blogroll .post-title a:focus,
        .sidebar a:hover, .sidebar a:focus,
        .social-navigation a:hover,
        .social-navigation a:focus {
            color: <?php echo get_theme_mod( 'tt_sonnet_site_color' )?>;
        }
        .nav ul ul a:hover,
        .nav ul ul a:focus,
        .btn, .wpcf7-submit,
        #submit,
        #searchsubmit {
            background: <?php echo get_theme_mod( 'tt_sonnet_site_color' )?>;        }
    </style>
    <?php
}
add_action( 'wp_head', 'tt_sonnet_customizer_css' );

?>
