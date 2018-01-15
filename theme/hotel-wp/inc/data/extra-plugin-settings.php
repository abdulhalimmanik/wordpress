<?php

/**
 * Import settings
 */
function thim_extra_import_tp_hotel_settings( $settings ) {

	$settings[] = 'tp_hotel_booking_search_page_id';
	$settings[] = 'tp_hotel_booking_checkout_page_id';
	$settings[] = 'tp_hotel_booking_cart_page_id';
	$settings[] = 'tp_hotel_booking_account_page_id';
	$settings[] = 'tp_hotel_booking_terms_page_id';
	$settings[] = 'tp_hotel_booking_catalog_number_column';
	$settings[] = 'tp_hotel_booking_posts_per_page';
	$settings[] = 'tp_hotel_booking_catalog_image_width';
	$settings[] = 'tp_hotel_booking_catalog_image_height';
	$settings[] = 'tp_hotel_booking_catalog_display_rating';
	$settings[] = 'tp_hotel_booking_room_image_gallery_width';
	$settings[] = 'tp_hotel_booking_room_image_gallery_height';
	$settings[] = 'tp_hotel_booking_room_thumbnail_width';
	$settings[] = 'tp_hotel_booking_room_thumbnail_height';
	$settings[] = 'tp_hotel_booking_display_pricing_plans';
	$settings[] = 'tp_hotel_booking_enable_review_rating';
	$settings[] = 'tp_hotel_booking_review_rating_required';
	$settings[] = 'tp_hotel_booking_enable_gallery_lightbox';
	$settings[] = 'tp_hotel_booking_enable_single_book';
	$settings[] = 'tp_hotel_booking_price_display';
	$settings[] = 'tp_hotel_booking_advance_payment';
	$settings[] = 'tp_hotel_booking_tax';
	$settings[] = 'tp_hotel_booking_price_including_tax';
	$settings[] = 'tp_hotel_booking_price_number_of_decimal';
	$settings[] = 'tp_hotel_booking_price_thousands_separator';
	$settings[] = 'tp_hotel_booking_price_decimals_separator';
	$settings[] = 'tp_hotel_booking_hotel_name';
	$settings[] = 'tp_hotel_booking_hotel_address';
	$settings[] = 'tp_hotel_booking_hotel_city';
	$settings[] = 'tp_hotel_booking_hotel_state';
	$settings[] = 'tp_hotel_booking_hotel_country';
	$settings[] = 'tp_hotel_booking_hotel_zip_code';
	$settings[] = 'tp_hotel_booking_hotel_phone_number';
	$settings[] = 'tp_hotel_booking_email_new_booking_subject';
	$settings[] = 'tp_hotel_booking_email_new_booking_heading';
	$settings[] = 'tp_hotel_booking_email_new_booking_heading_desc';
	$settings[] = 'tp_hotel_booking_hotel_fax_number';
	$settings[] = 'tp_hotel_booking_hotel_email_address';
	$settings[] = 'tp_hotel_booking_email_general_from_name';
	$settings[] = 'tp_hotel_booking_email_general_from_email';
	$settings[] = 'tp_hotel_booking_email_general_subject';
	$settings[] = 'tp_hotel_booking_email_new_booking_enable';
	$settings[] = 'tp_hotel_booking_email_new_booking_recipients';
	$settings[] = 'tp_hotel_booking_email_new_booking_format';
	$settings[] = 'tp_hotel_booking_currency';

	return $settings;
}

add_filter( 'thim_importer_basic_settings', 'thim_extra_import_tp_hotel_settings' );