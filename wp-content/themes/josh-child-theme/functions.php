

<?php
/*
 function my_child_theme_enqueue_styles() {
     // Enqueue parent style
     wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
 
     // Enqueue child style
     wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/my_styles.css', ['parent-style'], wp_get_theme()->get('Version'));
 }
 add_action('wp_enqueue_scripts', 'my_child_theme_enqueue_styles');
 */



 function my_child_theme_enqueue_styles() {
     // Enqueue parent theme's CSS
     wp_enqueue_style(
         'parent-style',
         get_template_directory_uri() . '/assets/css/footer.min.css'
     );
 
     // Enqueue child theme's CSS and make it dependent on the parent
     wp_enqueue_style(
         'child-style',
         get_stylesheet_directory_uri() . '/css/my_styles.css',
         array('parent-style'), // <-- Ensures child loads after parent
         wp_get_theme()->get('Version') // Optional: adds theme version for cache busting
     );
 }
 add_action('wp_enqueue_scripts', 'my_child_theme_enqueue_styles' , 20);


 // Script for adding my child theme's custom javascript file

function my_custom_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );


// Trying to override the site branding hook with my own custon action hook 

add_action( 'after_setup_theme', function() {
    remove_all_actions( 'kadence_site_branding' );
    add_action( 'kadence_site_branding', 'my_custom_site_branding' );
});

function my_custom_site_branding() {
    ?>
    <div class="site-branding">
        <?php
        // Show the logo
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }

        // Display site title on homepage
        if ( is_front_page() || is_home() ) {
            echo '<div class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></div>';
        } else {
            // Display current page or post title
            echo '<div class="site-title">' . 'My Work -' . esc_html( get_the_title() ) . '</div>';
        }
        ?>
    </div>
 

  <?php
}
?>
