<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'font-awesome','flexslider','lightslider','jquery-sidr-light' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


function oki_wzi_get_sections() {
    $enabled_section = education_zone_get_sections();
    // $enabled_section = [];
    $sections = array(
            'info-section' => array(
               'id' => 'publication',
               'class' => 'theme'
             ),
            'maps-section' => array(
               'id' => 'maps',
               'class' => 'maps'
             ),

      );
    foreach ( $sections as $section ) {
        if ( esc_attr( get_theme_mod( 'oki_wzi_ed_' . $section['id'] . '_section' ) ) == 1 ){
            $enabled_section[] = array(
                'id'    => $section['id'],
                'class' => $section['class']
            );
        }
    }
    return apply_filters('oki_wzi_get_sections', $enabled_section);
}

add_filter('oki_wzi_get_sections', function($sections) {
    $sections_with_key = array_combine(
        array_map(function ($value) {
            return $value['id'];
        }, $sections),
        $sections
    );
    $sections_position = [
        'slider', 
        'info', 
        'welcome', 
        'extra_info', 
        'courses', 
        'publication',
        'choose', 
        'maps',
        'search', 
        'gallery', 
    ];
    $enabled_sections = [];
    foreach($sections_position as $section_key){
        $enabled_sections[] = $sections_with_key[$section_key];
    }
    
    return $enabled_sections;
});

function oki_wzi_customize_register( $wp_customize ) {
    /* Option list of all post */ 
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'education-zone' );
    foreach ( $options_posts_obj as $posts ) {
        $options_posts[$posts->ID] = $posts->post_title;
    }
     /* Option list of all post */ 
    $options_pages = array();
    $options_pages_obj = get_posts('post_type=page&posts_per_page=-1');
    $options_pages[''] = __( 'Choose Page', 'education-zone' );
    foreach ( $options_pages_obj as $education_pages ) {
        $options_pages[$education_pages->ID] = $education_pages->post_title;
    }

    /** Publication Section Settings */
    $wp_customize->add_section(
        'oki_wzi_publication_section_settings',
        array(
            'title' => __( 'Publication Section', 'education-zone' ),
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'panel' => 'education_zone_home_page_settings'
        )
    );
    
    /** Enable Publication Section */   
    $wp_customize->add_setting(
        'oki_wzi_ed_publication_section',
        array(
            'default' => '',
            'sanitize_callback' => 'education_zone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'oki_wzi_ed_publication_section',
        array(
            'label' => __( 'Enable Extra Info Section', 'education-zone' ),
            'section' => 'oki_wzi_publication_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Section Title */
    $wp_customize->add_setting(
        'oki_wzi_publication_section_title',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_publication_section_title',
        array(
              'label' => __('Select Page','education-zone'),
              'type' => 'select',
              'choices' => $options_pages,
              'section' => 'oki_wzi_publication_section_settings', 
              
            ));
    

    /** CTA First Button */
    $wp_customize->add_setting(
        'oki_wzi_publication_section_button_one',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_publication_section_button_one',
        array(
              'label' => __('CTA First Button','education-zone'),
              'section' => 'oki_wzi_publication_section_settings', 
              'type' => 'text',
            ));

    /** CTA First Button Link */
    $wp_customize->add_setting(
        'oki_wzi_publication_button_one_url',
        array(
            'default'=> '',
            'sanitize_callback'=> 'esc_url_raw'
            )
        );
    
     $wp_customize-> add_control(
        'oki_wzi_publication_button_one_url',
        array(
              'label' => __('CTA First Button Link','education-zone'),
              'section' => 'oki_wzi_publication_section_settings', 
              'type' => 'text',
            ));
     
     /** CTA Second Button */ 
     $wp_customize->add_setting(
        'oki_wzi_publication_section_button_two',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_publication_section_button_two',
        array(
              'label' => __('CTA Second Button','education-zone'),
              'section' => 'oki_wzi_publication_section_settings', 
              'type' => 'text',
            ));

    /** CTA Second Button Link */
    $wp_customize->add_setting(
        'oki_wzi_publication_button_two_url',
        array(
            'default'=> '',
            'sanitize_callback'=> 'esc_url_raw'
            ));
    $wp_customize-> add_control(
        'oki_wzi_publication_button_two_url',
        array(
              'label' => __('CTA Second Button Link','education-zone'),
              'section' => 'oki_wzi_publication_section_settings', 
              'type' => 'text',
            ));

    /** Maps Section Settings */
    $wp_customize->add_section(
        'oki_wzi_maps_section_settings',
        array(
            'title' => __( 'Maps Section', 'education-zone' ),
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'panel' => 'education_zone_home_page_settings'
        )
    );
    
    /** Enable Maps Section */   
    $wp_customize->add_setting(
        'oki_wzi_ed_maps_section',
        array(
            'default' => '',
            'sanitize_callback' => 'education_zone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'oki_wzi_ed_maps_section',
        array(
            'label' => __( 'Enable Maps Section', 'education-zone' ),
            'section' => 'oki_wzi_maps_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Section Title */
    $wp_customize->add_setting(
        'oki_wzi_maps_section_title',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_maps_section_title',
        array(
              'label' => __('Select Page','education-zone'),
              'type' => 'select',
              'choices' => $options_pages,
              'section' => 'oki_wzi_maps_section_settings', 
              
            ));
    

    /** CTA First Button */
    $wp_customize->add_setting(
        'oki_wzi_maps_section_button_one',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_maps_section_button_one',
        array(
              'label' => __('CTA First Button','education-zone'),
              'section' => 'oki_wzi_maps_section_settings', 
              'type' => 'text',
            ));

    /** CTA First Button Link */
    $wp_customize->add_setting(
        'oki_wzi_maps_button_one_url',
        array(
            'default'=> '',
            'sanitize_callback'=> 'esc_url_raw'
            )
        );
    
     $wp_customize-> add_control(
        'oki_wzi_maps_button_one_url',
        array(
              'label' => __('CTA First Button Link','education-zone'),
              'section' => 'oki_wzi_maps_section_settings', 
              'type' => 'text',
            ));
     
     /** CTA Second Button */ 
     $wp_customize->add_setting(
        'oki_wzi_maps_section_button_two',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'oki_wzi_maps_section_button_two',
        array(
              'label' => __('CTA Second Button','education-zone'),
              'section' => 'oki_wzi_maps_section_settings', 
              'type' => 'text',
            ));

    /** CTA Second Button Link */
    $wp_customize->add_setting(
        'oki_wzi_maps_button_two_url',
        array(
            'default'=> '',
            'sanitize_callback'=> 'esc_url_raw'
            ));
    $wp_customize-> add_control(
        'oki_wzi_maps_button_two_url',
        array(
              'label' => __('CTA Second Button Link','education-zone'),
              'section' => 'oki_wzi_maps_section_settings', 
              'type' => 'text',
            ));

}
add_action( 'customize_register', 'oki_wzi_customize_register' );
