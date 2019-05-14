<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<?php do_action( 'woocommerce_before_single_product' );
?>
	<section class="wm-shop-section">
		
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
		<div class="row">

	<?php

		$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 2,'product_cat' => 'main-product', 'orderby' =>'date','order' => 'ASC' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		global $product; 
		?>
			<div class="col-md-4">
				<div class="wm-product-card">
					<?php $postID =  get_the_ID();?>
					<a href="<?php echo $product->slug ?>">
						<?php echo the_post_thumbnail( 'thumbnail' ); ?>
					</a>
					<div class="content">
						<h4 class="title">
							<?php echo $product->name ?>
						</h4>
						<span class="wish-icon">*</span>
						<p class="description"><?php echo $product->description ?></p>
						
						<div class="price-container">
							<span class="price">INR <?php echo $product->price ?></span>
							<a class="add-to-cart" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" >Add to Bag</a>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile;wp_reset_query(); ?>
		</div>

		</section>
		<section class="wm-shop-section">
			<h2 class="wm-shop-section-title">
				Enhance your Woomer experience
			</h2>
			<div class="row">
			<?php

				$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 2,'product_cat' => 'accessories', 'orderby' =>'date','order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				global $product; 
				?>
					<div class="col-md-4">
						<div class="wm-product-card">
							<?php $postID =  get_the_ID();?>
							<a href="<?php echo $product->slug ?>">
							<?php echo the_post_thumbnail( 'thumbnail' ); ?>
							</a>
							<div class="content">
								<h4 class="title">
									<?php echo $product->name ?>
								</h4>
								<span class="wish-icon">*</span>
								<p class="description"><?php echo $product->description ?></p>
								
								<div class="price-container">
									<span class="price">INR <?php echo $product->price ?></span>
									<a class="add-to-cart" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" >Add to Bag</a>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile;wp_reset_query(); ?>
				</div>
		</section>
		<section class="wm-shop-section">
			<h2 class="wm-shop-section-title">
				Woomer Care and Maintainance
			</h2>
			<div class="row">
			<?php

				$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 2,'product_cat' => 'care', 'orderby' =>'date','order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				global $product; 
				?>
					<div class="col-md-4">
						<div class="wm-product-card">
							<?php $postID =  get_the_ID();?>
							<a href="<?php echo $product->slug ?>">
							<?php echo the_post_thumbnail( 'thumbnail' ); ?>
							</a>
							<div class="content">
								<h4 class="title">
									<?php echo $product->name ?>
								</h4>
								<span class="wish-icon">*</span>
								<p class="description"><?php echo $product->description ?></p>
								
								<div class="price-container">
									<span class="price">INR <?php echo $product->price ?></span>
									<a class="add-to-cart" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" >Add to Bag</a>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile;wp_reset_query(); ?>
				</div>
			</div>
		</section>
		</div>

<?php
get_footer( 'shop' );
