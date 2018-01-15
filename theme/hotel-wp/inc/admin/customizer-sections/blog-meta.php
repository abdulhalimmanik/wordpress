<?php
/**
 * Section Blog Archive
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'blog_meta',
        'panel'    => 'blog',
        'title'    => esc_html__( 'Meta Tags', 'hotel-wp' ),
        'priority' => 20,
    )
);

// Enable or Disable Author Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'show_author_meta_tags',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Author', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to show author meta tags to display at all blog page.', 'hotel-wp' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 30,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'hotel-wp' ),
            false	  => esc_html__( 'Hide', 'hotel-wp' ),
        ),
    )
);

// Enable or Disable Date Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'show_date_meta_tags',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Date', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to show date meta tags to display at all blog page.', 'hotel-wp' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 31,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'hotel-wp' ),
            false	  => esc_html__( 'Hide', 'hotel-wp' ),
        ),
    )
);

// Enable or Disable Category Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'show_category_meta_tags',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Category', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to show category meta tags to display at single post page.', 'hotel-wp' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 32,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'hotel-wp' ),
            false	  => esc_html__( 'Hide', 'hotel-wp' ),
        ),
    )
);

// Enable or Disable Tags Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'show_tags_meta_tags',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Tags', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to show tags meta tags to display at single post page.', 'hotel-wp' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 33,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'hotel-wp' ),
            false	  => esc_html__( 'Hide', 'hotel-wp' ),
        ),
    )
);

// Enable or Disable Comments Meta Tags
thim_customizer()->add_field(
    array(
        'id'       => 'show_comment_meta_tags',
        'type'     => 'switch',
        'label'    => esc_html__( 'Show Comment Number', 'hotel-wp' ),
        'tooltip'  => esc_html__( 'Allows you to show comment meta tags to display at single post page.', 'hotel-wp' ),
        'section'  => 'blog_meta',
        'default'  => true,
        'priority' => 33,
        'choices'  => array(
            true  	  => esc_html__( 'Show', 'hotel-wp' ),
            false	  => esc_html__( 'Hide', 'hotel-wp' ),
        ),
    )
);