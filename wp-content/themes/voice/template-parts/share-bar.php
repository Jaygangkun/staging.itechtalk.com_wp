<?php
if ( is_page() ) {
	$share_platforms = vce_get_option( 'page_social_share' );
} else {
	$share_platforms = vce_get_option( 'social_share' );
}
	$share_platforms = array_keys( array_filter( $share_platforms ) );
?>

<?php if ( ! empty( $share_platforms ) && function_exists( 'meks_ess_share' ) ) : ?>

	<div class="vce-share-bar">
		<ul class="vce-share-items">
			<?php
				$share_settings = get_option( 'meks_ess_settings' );
				$share_class    = voice_share_bar_classes( $share_settings );
				meks_ess_share( $share_platforms, true, '<div class="meks_ess ' . $share_class . ' ">', '</div>' );
			?>
		</ul>
	</div>

<?php endif; ?>