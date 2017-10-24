<?php if ( ! defined( 'ABSPATH' ) ) { die; }

$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'menu',
  'menu_slug'       => 'ppm-theme-options',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Theme Options',
);

$options        = array();


$options[]      = array(
  'name'        => 'general',
  'title'       => 'General Settings',
  'icon'        => 'fa fa-diamond',
  'fields'      => array(
    array(
      'id'      => 'favicon',
      'type'    => 'image',
      'title'   => 'Favicon',
    ),
  ),
);

$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Backup',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

CSFramework::instance( $settings, $options );