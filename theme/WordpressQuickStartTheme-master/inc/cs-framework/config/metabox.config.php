<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
    'id'        => 'ppm_quickstart_page_options',
    'title'     => 'Custom Page Options',
    'post_type' => 'page',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'ppm_quickstart_page_section_1',
            'fields' => array(
                array(
                    'id'    => 'type',
                    'type'  => 'select',
                    'title' => 'Page Type',
                    'options'  => array(
                        'general'  => 'General Page',
                        'home'   => 'Homepage',
                    ),
                    'default'  => 'general',                    
                ),
                array(
                    'id'    => 'page_alternative_title',
                    'type'  => 'text',
                    'title' => 'Page alternative title',
                    'dependency'   => array( 'type', '==', 'general' ),
                ),
                array(
                    'id'    => 'enable_sidebar',
                    'type'  => 'switcher',
                    'title' => 'Enable Sidebar?',
                    'default' => false,
                    'dependency'   => array( 'type', '==', 'general' ),
                ),
                array(
                    'id'    => 'sidebar_position',
                    'type'  => 'select',
                    'title' => 'Sidebar Position',
                    'options'  => array(
                        'left'  => 'Left',
                        'right'   => 'Right',
                    ),
                    'default'  => 'right',  
                    'dependency'   => array( 'type|enable_sidebar', '==|==', 'general|true' ),
                ),                

            ),
        ),
    ),
);


CSFramework_Metabox::instance( $options );
