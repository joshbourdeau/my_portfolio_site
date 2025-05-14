

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

?> 

