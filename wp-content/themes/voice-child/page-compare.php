<?php
/**
* Template Name: Compare Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header(); ?>

<?php get_template_part('template-parts/cover-area'); ?>

<?php get_template_part( 'template-parts/ads/below-header' ); ?>

<?php if ( function_exists('yoast_breadcrumb') ) : ?>
	<?php yoast_breadcrumb('<div id="mks-breadcrumbs" class="container mks-bredcrumbs-container"><p id="breadcrumbs">','</p></div>'); ?>
<?php endif; ?>

<?php global $vce_sidebar_opts; ?>
<style>
	table, th, td {
		border: 1px solid #a9acaa;
		border-collapse: collapse;
		text-align: center;
	}

	td:nth-of-type(1),
	td:nth-of-type(3) {
		width: 40%;
	}

	td:nth-of-type(2) {
		width: 20%;
	}
</style>
<div id="content" class="container site-content vce-sid-<?php echo esc_attr( $vce_sidebar_opts['use_sidebar'] ); ?>">
	
	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>
		
	<div id="primary" class="vce-main-content">

		<main id="main" class="main-box main-box-single">
            <?php
            $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$linkTokens = explode('?', $link);
			if(count($linkTokens) == 2) {
				$comparedProductsSlug = $linkTokens[1];
				$comparedProductsSlugTokens = explode('-vs-', $comparedProductsSlug);

				$firstIttProduct = null;
				$secondIttProduct = null;

				if(count($comparedProductsSlugTokens) >= 2) {
					$productSlug1 = $comparedProductsSlugTokens[0];
					$productSlug2 = $comparedProductsSlugTokens[1];

					$productsBySlug1 = get_posts([
						'name' => $productSlug1,
						'post_type'   => ITT_POST_TYPE,
						'post_status' => 'publish',
						'numberposts' => 1
					]);

					if(count($productsBySlug1) > 0) {
						$firstIttProduct = $productsBySlug1[0];
					}
					else {
						?>
						<div>No Found First Product to compare</div>
						<?php
					}

					$productsBySlug2 = get_posts([
						'name' => $productSlug2,
						'post_type'   => ITT_POST_TYPE,
						'post_status' => 'publish',
						'numberposts' => 1
					]);

					if(count($productsBySlug2) > 0) {
						$secondIttProduct = $productsBySlug2[0];
					}
					else {
						?>
						<div>No Found Second Product to compare</div>
						<?php
					}
				}
				else {
					?>
					<div class="">No Found Products to compare</div>
					<?php
				}

				if($firstIttProduct && $secondIttProduct) {
					$firstIttProductImageURL = '';
					$secondIttProductImageURL = '';
					if(has_post_thumbnail($firstIttProduct->ID)) {
						$ittProductImage = wp_get_attachment_image_src(get_post_thumbnail_id($firstIttProduct->ID));
						$firstIttProductImageURL = $ittProductImage[0];
					}
					
					if(has_post_thumbnail($secondIttProduct->ID)) {
						$secondProductImage = wp_get_attachment_image_src(get_post_thumbnail_id($secondIttProduct->ID));
						$secondIttProductImageURL = $secondProductImage[0];
					}

					?>
					<table>
						<tbody>
							<tr>
								<td><?= get_the_title($firstIttProduct->ID)?></td>
								<td>vs</td>
								<td><?= get_the_title($secondIttProduct->ID)?></td>
							</tr>
							<tr>
								<td>
									<img class="" src="<?= $firstIttProductImageURL?>">
								</td>
								<td></td>
								<td>
									<img class="" src="<?= $secondIttProductImageURL?>">
								</td>
							</tr>
							<?php
							
							$ittProductMetaFields = [
								[
									'name' => 'network',
									'title' => 'Network'
								],
								[
									'name' => 'launch',
									'title' => 'Launch'
								],
								[
									'name' => 'body',
									'title' => 'Body'
								],
								[
									'name' => 'display',
									'title' => 'Display'
								],
								[
									'name' => 'platform',
									'title' => 'Platform'
								],
								[
									'name' => 'memory',
									'title' => 'Memory'
								],
								[
									'name' => 'main_camera',
									'title' => 'Main Camera'
								],
								[
									'name' => 'selfie_camera',
									'title' => 'Selfie Camera'
								],
								[
									'name' => 'camera',
									'title' => 'Camera'
								],
								[
									'name' => 'sound',
									'title' => 'Sound'
								],
								[
									'name' => 'comms',
									'title' => 'Comms'
								],
								[
									'name' => 'features',
									'title' => 'Features'
								],
								[
									'name' => 'battery',
									'title' => 'Battery'
								],
								[
									'name' => 'misc',
									'title' => 'Misc'
								],
								[
									'name' => 'tests',
									'title' => 'Tests'
								],
								// [
								//     'name' => 'type',
								//     'title' => 'Type'
								// ]
								// [
								//     'name' => 'item_url',
								//     'title' => 'Item URL'
								// ]
							];

							foreach($ittProductMetaFields as $metaField) {
								?>
								<tr>
									<td colspan="3" style="text-align: center; padding: 20px 0px;"><b><?= $metaField['title']?></b></td>
								</tr>
								<?php
								$firstIttProductMetaData = get_field($metaField['name'], $firstIttProduct->ID);
								if($firstIttProductMetaData != '-') {
									$firstIttProductMetaData = json_decode(str_replace("'", '"', str_replace('"', '\"', $firstIttProductMetaData)), true);
									$firstIttProductMetaDataKeys = array_keys($firstIttProductMetaData);
								}
								else {
									$firstIttProductMetaDataKeys = [];
								}
								

								$secondIttProductMetaData = get_field($metaField['name'], $secondIttProduct->ID);
								if($secondIttProductMetaData != '-') {
									$secondIttProductMetaData = json_decode(str_replace("'", '"', str_replace('"', '\"', $secondIttProductMetaData)), true);
									$secondIttProductMetaDataKeys = array_keys($secondIttProductMetaData);    
								}
								else {
									$secondIttProductMetaDataKeys = [];
								}
								
								$ittProductMetaDataKeys = [];
								foreach($firstIttProductMetaDataKeys as $metaKeywords) {
									if(!in_array($metaKeywords, $ittProductMetaDataKeys)) {
										$ittProductMetaDataKeys[] = $metaKeywords;
									}
								}

								foreach($secondIttProductNetworkKeys as $metaKeywords) {
									if(!in_array($metaKeywords, $ittProductMetaDataKeys)) {
										$ittProductMetaDataKeys[] = $metaKeywords;
									}
								}

								foreach($ittProductMetaDataKeys as $ittProductMetaDataKey) {
									?>
									<tr>
										<td><?= empty($firstIttProductMetaData[$ittProductMetaDataKey]) ? '' : $firstIttProductMetaData[$ittProductMetaDataKey]?></td>
										<td><?= $ittProductMetaDataKey?></td>
										<td><?= empty($secondIttProductMetaData[$ittProductMetaDataKey]) ? '' : $secondIttProductMetaData[$ittProductMetaDataKey]?></td>
									</tr>
									<?php
								}
							}
							?>
							<tr>
								<td><?= get_field('type', $secondIttProduct->ID) ?></td>
								<td><b>Type</b></td>
								<td><?= get_field('type', $secondIttProduct->ID) ?></td>
							</tr>
						</tbody>
					</table>
					<?php
				}
			}
			else {
				?>
				<div>No available compare</div>
				<?php
			}
            
            ?>
        </main>

	</div>

	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>

</div>

<?php get_template_part('template-parts/pagination/single-infinite-scroll'); ?>

<?php get_footer(); ?>