<?php
/**
 * @Author: ducnvtt
 * @Date:   2016-04-21 08:44:34
 * @Last Modified by:   ducnvtt
 * @Last Modified time: 2016-04-21 15:57:25
 */
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

global $post;
if ( ! $post ) {
    return;
}

$post_id = '{{data._room_id}}';
$post_name = '{{data._room_name}}';
?>

<div id="hotel_booking_room_hidden"></div>
<!--Single search form-->
<script type="text/html" id="tmpl-hb-room-load-form">
    <form action="POST" name="hb-search-single-room" class="hb-search-room-results hotel-booking-search hotel-booking-single-room-action">
        <div class="hb-booking-room-form-head">
            <h2>{{data._room_name}}</h2>
            <p class="description"><?php esc_html_e( 'Please set arrival date and departure date before check available.', 'hotel-wp' ); ?></p>
        </div>

        <div class="hb-search-results-form-container">
            <div class="hb-booking-room-form-group">
                <div class="hb-booking-room-form-field hb-form-field-input">
                    <input type="text" name="check_in_date" value="{{ data.check_in_date }}" placeholder="<?php esc_html_e( 'Arrival Date', 'hotel-wp' ); ?>" />
                </div>
            </div>
            <div class="hb-booking-room-form-group">
                <div class="hb-booking-room-form-field hb-form-field-input">
                    <input type="text" name="check_out_date" value="{{ data.check_out_date }}" placeholder="<?php esc_html_e( 'Departure Date', 'hotel-wp' ); ?>" />
                </div>
            </div>
            <div class="hb-booking-room-form-group">
                <input type="hidden" name="room-id" value="{{data._room_id}}" />
                <input type="hidden" name="room-name" value="{{data._room_name}}" />
                <input type="hidden" name="action" value="hotel_booking_single_check_room_available"/>
                <?php wp_nonce_field( 'hb_booking_single_room_check_nonce_action', 'hb-booking-single-room-check-nonce-action' ); ?>
                <button type="submit" class="hb_button"><?php esc_html_e( 'Check Available', 'hotel-wp' ); ?></button>
            </div>
        </div>
    </form>
</script>

<!--Quanity select-->
<script type="text/html" id="tmpl-hb-room-load-qty">
    <div class="hb-booking-room-form-group">
        <label><?php _e( 'Quantity Available', 'hotel-wp' ); ?></label>
        <div class="hb-booking-room-form-field hb-form-field-input">
            <select name="hb-num-of-rooms" id="hotel_booking_room_qty" class="number_room_select">
                <option value=""><?php _e( '--- Quantity ---', 'hotel-wp' ); ?></option>
                <# for( var i = 1; i <= data.qty; i++ ) { #>
                <option value="{{ i }}">{{ i }}</option>
                <# } #>
            </select>
        </div>
    </div>
</script>
