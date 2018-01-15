<?php
/**
 * Section Blog General
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'             => 'blog_general',
        'panel'			 => 'blog',
        'title'          => esc_html__( 'Settings', 'hotel-wp' ),
        'priority'       => 10,
    )
);

// Blog Archive Group
thim_customizer()->add_group( array(
    'id'       => 'blog_archive_setting_group',
    'section'  => 'blog_general',
    'priority' => 10,
    'groups'   => array(
        array(
            'id'     => 'blog_archive_page_group',
            'label'  => esc_html__( 'Archive Page', 'hotel-wp' ),
            'fields' => array(
                //Blog Layouts
                array(
                    'type'        => 'select',
                    'id'          => 'archive_post_layout',
                    'label'       => esc_html__( 'Blog Layouts', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Choose a layout to display for archive post.', 'hotel-wp' ),
                    'default'     => 'masonry_layout',
                    'priority'    => 5,
                    'multiple'    => 0,
                    'choices'     => array(
                        'masonry_layout' => esc_html__( 'Masonry', 'hotel-wp' ),
                        'grid_layout'    => esc_html__( 'Grid', 'hotel-wp' ),
                    ),
                ),
                //Blog Columns
                array(
                    'type'        => 'select',
                    'id'          => 'archive_post_column',
                    'label'       => esc_html__( 'Blog Columns', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Choose the number of columns for archive post.', 'hotel-wp' ),
                    'default'     => '2',
                    'priority'    => 10,
                    'multiple'    => 0,
                    'choices'     => array(
                        '2' => esc_html__( '2', 'hotel-wp' ),
                        '3' => esc_html__( '3', 'hotel-wp' ),
                        '4' => esc_html__( '4', 'hotel-wp' ),
                    ),
                ),
                // Excerpt Content
                array(
                    'id'          => 'excerpt_archive_content',
                    'type'        => 'slider',
                    'label'       => esc_html__( 'Excerpt Length', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Choose the number of words you want to cut from the content to be the excerpt of search and archive', 'hotel-wp' ),
                    'priority'    => 20,
                    'default'     => 20,
                    'choices'     => array(
                        'min'  => '10',
                        'max'  => '100',
                        'step' => '5',
                    ),
                )
            ),
        ),
    )
) );

// Blog Single Group
thim_customizer()->add_group( array(
    'id'       => 'blog_single_setting_group',
    'section'  => 'blog_general',
    'priority' => 20,
    'groups'   => array(
        array(
            'id'     => 'blog_single_page_group',
            'label'  => esc_html__( 'Single Page', 'hotel-wp' ),
            'fields' => array(
                // Show Feature Image
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_feature_image',
                    'label'    => esc_html__( 'Featured Image', 'hotel-wp' ),
                    'tooltip'  => esc_html__( 'Turn on to display featured images on single blog posts..', 'hotel-wp' ),
                    'default'  => true,
                    'priority' => 10,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'hotel-wp' ),
                        false => esc_html__( 'Off', 'hotel-wp' ),
                    ),
                ),
                // Turn On Comments
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_comment',
                    'label'    => esc_html__( 'Comments', 'hotel-wp' ),
                    'tooltip'  => esc_html__( 'Turn on to display comments.', 'hotel-wp' ),
                    'default'  => true,
                    'priority' => 20,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'hotel-wp' ),
                        false => esc_html__( 'Off', 'hotel-wp' ),
                    ),
                ),
                // Turn On Related Post
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_related_post',
                    'label'    => esc_html__( 'Related Posts', 'hotel-wp' ),
                    'tooltip'  => esc_html__( 'Turn on to display related posts.', 'hotel-wp' ),
                    'default'  => true,
                    'priority' => 30,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'hotel-wp' ),
                        false => esc_html__( 'Off', 'hotel-wp' ),
                    ),
                ),
                // Select Post Numbers For Related Post
                array(
                    'type'            => 'slider',
                    'id'              => 'blog_single_related_post_number',
                    'label'           => esc_html__( 'Numbers of Related Post', 'hotel-wp' ),
                    'default'         => 3,
                    'priority'        => 40,
                    'choices'         => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'blog_single_related_post',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                // Select Post Column Numbers For Related Post
                array(
                    'type'            => 'slider',
                    'id'              => 'blog_single_related_post_column',
                    'label'           => esc_html__( 'Columns of Related Post', 'hotel-wp' ),
                    'default'         => 3,
                    'priority'        => 50,
                    'choices'         => array(
                        'min'  => 1,
                        'max'  => 12,
                        'step' => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'blog_single_related_post',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                )
                
            ),
        ),
    )
) );
