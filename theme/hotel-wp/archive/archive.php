<?php 
content.php
	thim_feature_image
	function_exists('thim_meta')
	thim_meta( 'thim_link_url' )
	thim_meta( 'thim_quote_author_text' );
	thim_meta( 'thim_quote_author_url' );
	wp_kses
	thim_entry_meta

comments.php
	'0' != get_comments_number()

footer.php
	apply_filters( 'thim_show_footer', true )
	do_action( 'hotel_booking_after_single_product' )		

functions.php
	$GLOBALS['content_width'] = apply_filters('thim_content_width', 640);
	apply_filters('thim_core_list_sidebar', array());
	(!thim_plugin_active('thim-core'))
	wp_dequeue_style('contact-form-7');
header.php
	bloginfo( 'pingback_url' );
	get_post_meta($header_logo_image, '_wp_attachment_image_alt', true);
	'walker' => new headet_top_Navwalker()
customizer-options.php 
	add_action( 'thim_customizer_register', array( $this, 'thim_create_customize_options' ) );
	function thim_create_customize_options( $wp_customize )
blog-general.php
	thim_customizer()->add_section()
index.php
	thim_paging_nav();
content-none.php
	printf( wp_kses( __( )))
searchform.php
	get_search_query()
sidebar-events.php
	thim_sidebar_event_before();
	thim_sidebar_event_after();
sidebar-hotel.php
	thim_sidebar_before();
	thim_sidebar_after();
wrapper.php
	do_action( 'thim_wrapper_init' );
	$file = thim_template_path();
	do_action( 'thim_wrapper_loop_start' );	
	do_action( 'thim_wrapper_loop_end' );	
content-single.php
	get_theme_mod( 'blog_single_feature_image', true );
	do_action( 'thim_entry_top', 'full' );
	thim_entry_meta();
	thim_get_list_group_chat();
	thim_entry_meta_tags();
extra-plugin-settings.php
	add_filter( 'thim_importer_basic_settings', 'thim_extra_import_tp_hotel_settings' );
plugins-require.php
	add_action('thim_core_get_all_plugins_require', 'thim_get_all_plugins_require');
	function thim_get_core_require() {}
	add_filter('thim_envato_item_id', 'thim_envato_item_id');
class-thim-plugin.php
	static 82
	self 83
	$update_plugins 83
	if ( ! count( $plugins_installed ) ) 101
	strpos 106
	public function set_args( array $args ) 124
	$this->args = wp_parse_args( $args, $default ); 129	
	return is_plugin_active( $this->plugin );
	$args = $this->args; 248
	$arg         = $this->args; 302
	$file_plugin = WP_PLUGIN_DIR . '/' . $this->plugin; 363
	public function activate( $silent = null, $network_wide = false ) 439
	$result = activate_plugin( $plugin, $redirect = '', $network_wide, $silent ); 462
	$recent = (array) get_option( 'recently_activated' );
	unset( $recent[ $plugin ] );
	update_option( 'recently_activated', $recent );
	update_option( 'recently_activated', array( $plugin => time() ) + (array) get_option( 'recently_activated' ) ); 486
	$plugin_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . $this->plugin; 530
	if ( $this->info ) 587
	Install plugin by uri or local path. 607
	Update plugin. 634
class_widget_attributes.php
	public static function thim_save_attributes( $instance, $new_instance, $old_instance, $widget ) 87
	public static function thim_insert_attributes( $params ) 120 
installer.php
	private static function put_file( $dir, $file_name, $content ) 130
	private function get_environments() 224
	do_action( 'thim_core_install_enqueue_script' ); 572
	do_action( "thim_core_installer_step_$step" ); 607
theme-wrapper.php
	static function wrap($template)	