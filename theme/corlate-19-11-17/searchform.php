<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 */

?>

<div class="widget search">
    <form role="form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" id="txt" class="form-control search_box" autocomplete="off" placeholder="Search Here">
    </form>
</div>