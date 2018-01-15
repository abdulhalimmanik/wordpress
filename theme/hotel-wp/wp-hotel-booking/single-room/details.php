<?php
if (!defined('ABSPATH')) {
    exit();
}

$room = WPHB_Room::instance(get_the_ID());
ob_start();
the_content();
$content = ob_get_clean();
$tabsInfo = array();
$tabsInfo[] = array(
    'id' => 'hb_room_description',
    'content' => $content
);
$tabsInfo[] = array(
    'id' => 'hb_room_additinal',
    'title' => esc_html__('AMENITIES AND SERVICES', 'hotel-wp'),
    'content' => $room->addition_information
);
$tabs = apply_filters('hotel_booking_single_room_infomation_tabs', $tabsInfo);

if (isset($tabs[2])) {
    $review = $tabs[2];
    unset($tabs[2]);
    $tabs[] = $review;
}

// prepend after li tabs single
do_action('hotel_booking_before_single_room_infomation');
?>
<div class="hb_single_room_details tp-hotel-booking">
    <?php
    // append after li tabs single
    do_action('hotel_booking_after_single_room_infomation'); ?>

    <div class="hb_single_room_tabs_content">

        <?php foreach ($tabs as $key => $tab):
            if (!$tab['content']) {
                $tab['title'] = '';
            }
            if (isset($tab['id'])) {
                //var_dump($tab['id']);
                ?>

                <div id="<?php echo esc_attr($tab['id']) ?>" class="hb_single_room_tab_details">
                    <?php do_action('hotel_booking_single_room_before_tabs_content_' . $tab['id']); ?>

                    <?php if (isset($tab['title']) && $tab['title'] != '') {
                        printf('<h3 class="heading-title">%s</h3>', $tab['title']);
                    } ?>

                    <?php if ($tab['content']) {
                        printf('<div class="tab-content">%s</div>', $tab['content']);
                    } ?>

                    <?php do_action('hotel_booking_single_room_after_tabs_content_' . $tab['id']); ?>
                </div>

            <?php } endforeach; ?>
    </div>

</div>