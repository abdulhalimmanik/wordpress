<style type="text/css">
	.nav-previous, 
	.nav-next {
	    display: inline-block;
	}

	.nav-next {
	    margin-left: 10px;
	}
</style>
<div class="navigation-wrap">
	<div class="row">
		<div class="col-xs-12 col-sm-offset-2 col-sm-10">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</div>
	</div>
</div>