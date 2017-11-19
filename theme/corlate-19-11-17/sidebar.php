    <div class="widget search">
        <?php dynamic_sidebar('right_sidebar'); ?>
        <?php if ( !dynamic_sidebar('right_sidebar') ) : ?><?php endif ; ?>
        <form role="form">
                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
        </form>
    </div><!--/.search-->

    <div class="widget categories">
        <h3>Recent Comments</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="single_comments">
    				<img src="images/blog/avatar3.png" alt=""  />
    				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                    <div class="entry-meta small muted">
                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                    </div>
    			</div>
    			<div class="single_comments">
    				<img src="images/blog/avatar3.png" alt=""  />
    				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
    				<div class="entry-meta small muted">
                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                    </div>
    			</div>
    			<div class="single_comments">
    				<img src="images/blog/avatar3.png" alt=""  />
    				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
    				<div class="entry-meta small muted">
                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                    </div>
    			</div>
    			
            </div>
        </div>                     
    </div><!--/.recent comments-->
<div class="widget categories">
    <h3>Categories</h3>
    <div class="row">
    <div class="col-sm-6">
        <ul class="blog_category">
            <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ) );
                foreach ($categories as $category)  {
            ?>
                <li>
                    <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?> 
                        <span class="badge"><?php echo $category->count; ?></span>
                    </a>
                </li>
            <?php }  ?>
        </ul>
    </div>
    </div>                     
</div>

<div class="widget archieve">
    <h3>Archieve</h3>
    <div class="row">
        <div class="col-sm-12">
            <ul class="blog_archieve">
                <?php 
                    $html = wp_get_archives( array(
                        'type'=>'monthly', 
                        'show_post_count' => true,
                        'echo' => false,
                    ) );
                    $html = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="count">$2</span>', $html );
                    echo $html;
                ?>
                
            </ul>
        </div>
    </div>                     
</div><!--/.archieve-->

<?php
    $tags = get_tags();
    $html = '<div class="widget tags">
            <h3>Tag Cloud</h3>
            <ul class="tag-cloud">';
            foreach ( $tags as $tag ) {
                $tag_link = get_tag_link( $tag->term_id );
                        
                $html .= "<li  style='margin-right: 10px;'><a class='btn btn-xs btn-primary'  href='{$tag_link}' title='{$tag->name} Tag' >";
                $html .= "{$tag->name}</a></li>";
            }
    $html .= '</ul>
        </div>';
    echo $html;
?>

    <div class="widget blog_gallery">
        <h3>Our Gallery</h3>
        <ul class="sidebar-gallery">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery1.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery2.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery3.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery4.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery5.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/gallery6.png" alt="" /></a></li>
        </ul>
    </div><!--/.blog_gallery-->
    	
