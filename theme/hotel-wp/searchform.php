<div class="thim-search-box">
    <div class="toggle-form"><i class="fa fa-search"></i></div><!-- .toggle-form -->
    <div class="form-search-wrapper">
        <div class="background-toggle"></div>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search...', 'hotel-wp' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div><!-- .form-search-wrapper -->
</div><!-- .thim-search-box -->

