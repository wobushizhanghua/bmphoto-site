<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product, $pinnacle;
if(isset($pinnacle['product_simg_resize']) && $pinnacle['product_simg_resize'] == 0) {
	$presizeimage = 0;
} else {
	$presizeimage = 1;
	$productimgwidth = 456;
	$productimgheight = $productimgwidth;	
}
?>
<div class="images kad-light-gallery">
	<div class="product_image postclass">
	<?php
		if ( has_post_thumbnail() ) {
			$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$alt = esc_attr( get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) );
			if( !empty($alt) ) {
					$alttag	= $alt;
				} else {
					$alttag	= $image_title;
				}
			$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
			if($presizeimage == 1){
					$image_id = get_post_thumbnail_id( $post->ID );
					$product_image = wp_get_attachment_image_src( $image_id, 'full' ); 
					$product_image_url = $product_image[0]; 
					$image_url = aq_resize($product_image_url, $productimgwidth, $productimgheight, true);
					if(empty($image_url)) {$image_url = $product_image_url;} 

					// Get srcset
			        $img_srcset_output = kt_get_srcset_output( $productimgwidth, $productimgheight, $product_image_url, $image_id); 

					$image = '<img width="'.esc_attr($productimgwidth).'" height="'.esc_attr($productimgheight).'" src="'.esc_attr($image_url).'" '.$img_srcset_output.' class="attachment-shop_single wp-post-image" title="'.esc_attr($alttag).'">';
			} else {
				$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
					'title' => $image_title,
						'alt' => $alttag
					) );
			}
			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  data-rel="lightbox">%s</a>', esc_url($image_link), $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.__('Placeholder', 'pinnacle').'" />', woocommerce_placeholder_img_src() ), $post->ID );

		}
	?>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
