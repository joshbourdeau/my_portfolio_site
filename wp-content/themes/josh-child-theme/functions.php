

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
    <div class="josh-site-branding-container">
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
            echo '<div class="site-title">' . 'My Work - ' . esc_html( get_the_title() ) . '</div>';
        }
        ?>
    </div>

    
    

<?php

  

?>
</div>

<?php
    }
?>


<?php 


function add_my_role_section_inside_inner_wrap() {
    if ( is_front_page() || is_home() ) {
        echo "";
    } else {
        $post_id = get_the_ID();

        $PM_field         = get_field( 'project_management', $post_id );
        $web_design_field = get_field( 'web_design', $post_id );
        $uiux_field       = get_field( 'uiux', $post_id );

        echo '<div class="site-container project-banner-container"><div class="my-role-container">';
        echo '<span class="my-role-title">My role </span> <span class="dash-line"></span>';

        if ( $PM_field || $web_design_field || $uiux_field ) {
            echo '<div class="my-role-fields-container">';
            if ( $PM_field ) {
                echo '<span class="role-item">' . '<span class="hashtag">' . '#' . '</span>' . esc_html( $PM_field ) . '</span> ';
            }
            if ( $web_design_field ) {
                echo '<span class="role-item">' . '<span class="hashtag">' . '#' . '</span>' . esc_html( $web_design_field ) . '</span> ';
            }
            if ( $uiux_field ) {
                echo '<span class="role-item">' . '<span class="hashtag">' . '#' . '</span>' . esc_html( $uiux_field ) . '</span>';
            }
            echo '</div>';
        } else {
            echo '<span class="no-role-data">No role information available.</span>';
        }

        echo '</div>';
    }
}
add_action( 'kadence_main_header', 'add_my_role_section_inside_inner_wrap', 20 );


// Attemping my own tools section 

function add_my_tools_section_inside_inner_wrap() {
    if ( is_front_page() || is_home() ) {
        echo "";
    } else {
        $post_id = get_the_ID();

        // Get each image field
        $tools = [
            get_field( 'asana', $post_id ),
            get_field( 'figma', $post_id ),
            get_field( 'wordpress', $post_id )
        ];

        echo '<div class="new-tools">';
        echo '<span class="my-tools-title">Tools </span> <span class="dash-line"></span>';

        // Filter out empty fields
        $tools = array_filter( $tools );

        if ( !empty( $tools ) ) {
            echo '<div class="my-tools-fields-container">';

            foreach ( $tools as $tool ) {
                echo '<span class="role-item">';
                echo '<img src="' . esc_url( $tool['url'] ) . '" alt="' . esc_attr( $tool['alt'] ) . '" class="tool-icon" />';
                echo '</span>';
            }

            echo '</div>';
        } else {
            echo '<span class="no-role-data">No role information available.</span>';
        }

        echo '</div></div>';
    }
}
add_action( 'kadence_main_header', 'add_my_tools_section_inside_inner_wrap', 20 );


?>