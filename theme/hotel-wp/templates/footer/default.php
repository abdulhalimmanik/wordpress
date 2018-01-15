<?php
/**
 * Footer Template: Default
 * 
 */

$class_default = '';
$thim_options = get_theme_mods();

if ( ! thim_plugin_active( 'thim-core' ) ) {
	$class_default = 'no-padding';
}

?>

	<div class="footer <?php echo esc_attr($class_default); ?>">
		<div class="container">
			<div class="row">
				<?php thim_footer_widgets(); ?>
			</div>
		</div>
	</div><!-- .footer -->
<?php if ( get_theme_mod( 'copyright_bar', true ) ) : ?>
	<div class="copyright-area">
		<div class="container">
			<div class="copyright-content">
				<div class="row">
					<div class="<?php if ( get_theme_mod( 'copyright_menu', true ) ) { ?>col-sm-6<?php } else { ?>col-sm-12<?php } ?>">
						<?php thim_copyright_bar(); ?>
					</div>
					<?php if ( get_theme_mod( 'copyright_menu', true ) ) { ?>
					<div class="col-sm-6 text-right">
						<?php thim_copyright_menu(); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div><!-- .copyright-area -->
<?php endif; ?>