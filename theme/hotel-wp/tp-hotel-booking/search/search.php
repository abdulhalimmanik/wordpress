<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

$search_page = hb_get_page_permalink( 'search' ); // hb_get_url()
$check_in_date = hb_get_request( 'check_in_date' );
$check_out_date = hb_get_request( 'check_out_date' );
$adults = hb_get_request( 'adults', 0 );
$max_child = hb_get_request( 'max_child', 0 );
$uniqid = uniqid();

?>
<div id="hotel-booking-search-<?php echo uniqid(); ?>" class="hotel-booking-search layout-default">
    <form name="hb-search-form" action="<?php echo esc_attr( $search_page ); ?>" class="hb-search-form-<?php echo esc_attr( $uniqid ) ?>">
        <ul class="hb-form-table">
            <li class="hb-form-field">
                <?php esc_html__( 'Check in', 'hotel-wp' ); ?>
                <div class="hb-form-field-input hb_input_field">
                    <input type="text" name="check_in_date" id="check_in_date_<?php echo esc_attr( $uniqid ); ?>" class="hb_input_date_check" value="<?php echo esc_attr( $check_in_date ); ?>" placeholder="<?php esc_html_e( 'Check in', 'hotel-wp' ); ?>" />
                </div>
            </li>

            <li class="hb-form-field">
                <?php esc_html__( 'Check out', 'hotel-wp' ); ?>
                <div class="hb-form-field-input hb_input_field">
                    <input type="text" name="check_out_date" id="check_out_date_<?php echo esc_attr( $uniqid ) ?>" class="hb_input_date_check" value="<?php echo esc_attr( $check_out_date ); ?>" placeholder="<?php esc_html_e( 'Check out', 'hotel-wp' ); ?>" />
                </div>
            </li>

            <li class="hb-form-field">
                <?php esc_html__( 'Guests', 'hotel-wp' ); ?>
                <div class="hb-form-field-input">
                    <?php
                        hb_dropdown_numbers(
                            array(
                                'name'      => 'adults_capacity',
                                'min'       => 1,
                                'selected'  => 'selected',
                                'max'       => hb_get_max_capacity_of_rooms(),
                                'show_option_none'  => esc_html__( 'Guest', 'hotel-wp' ),
								'selected'  => $adults,
                                'option_none_value' => 0,
                                'options'   => hb_get_capacity_of_rooms()
                            )
                        );
                    ?>
                </div>
            </li>
        </ul>
        <?php wp_nonce_field( 'hb_search_nonce_action', 'nonce' ); ?>
        <input type="hidden" name="hotel-booking" value="results" />
        <input type="hidden" name="action" value="hotel_booking_parse_search_params" />
        <p class="hb-submit">
            <button type="submit"><?php esc_html_e( 'Check Availability', 'hotel-wp' ); ?></button>
        </p>
    </form>
</div>