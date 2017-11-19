<?php
//01. wp_list_categories
// Display or retrieve the HTML list of categories.
wp_list_categories( string|array $args = '' );
$defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( 'Categories' ),
        'use_desc_for_title'  => 1,
    );
// 02. get_transient()
// 03.  set_transient( 
//You do not need to serialize values. If the value needs to be serialized, then it will be serialized before it is set
 set_transient( $transient, $value, $expiration );

// 04. esc_html__ 
// 05. esc_html_e
// 06. The Loop
 if ( have_posts() ) : while ( have_posts() ) : the_post();
    endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; 
// 07. the_permalink()
// 08. the_title_attribute()
// 09. the_title()
// 10. the_time()
// 11. the_author_posts_link() // a link to other posts by this posts author
// 12. the_content()
// 13. the_category( ', ' )
// 14. esc_html_e()
// 15. Exclude Posts From Some Category
    $query = new WP_Query( 'cat=-3,-8' );
// 16. is_home()
// 17. wp_reset_postdata(); //problem
// 18. query_posts()    
