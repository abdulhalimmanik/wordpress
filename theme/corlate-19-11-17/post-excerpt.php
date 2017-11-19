<?php 
    if(have_posts()) : 
    while(have_posts()) : the_post();
?>

    <div class="blog-item">
        <div class="row">
            <div class="col-xs-12 col-sm-2 text-center">
                <div class="entry-meta">
                    <span id="publish_date"><?php the_date();?></span>
                    <span><i class="fa fa-user"></i> <a href="#"><?php the_author_posts_link(); ?></a></span>
                    <span><i class="fa fa-comment"></i> <?php comments_popup_link('no cpmments', 'one comment', '% comments', '', 'comment is disable'); ?></span>
                    <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-10 blog-content">
                <a href="<?php the_permalink(); ?>"><img class="img-responsive img-blog" src="<?php echo get_template_directory_uri();?>/images/blog/blog1.jpg" width="100%" alt="" /></a>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h3><?php the_excerpt(); ?></h3>
                <a class="btn btn-primary readmore" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-right"></i></a>
            </div>
        </div>    
    </div><!--/.blog-item-->

<?php endwhile ;?>
<?php endif ;?>
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { include('navigation.php'); } ?>