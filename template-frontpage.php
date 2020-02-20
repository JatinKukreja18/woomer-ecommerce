<?php
/*
 Template Name: Home Page Template

* This is the template that displays all faqs 
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main ">

	<div class="wm-banner-products">
    <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 6,
            'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
		);
		$fq = new WP_Query( $args );
		// check featured products
        if ( $fq->have_posts() ) {
			while ( $fq->have_posts() ) : $fq->the_post();
				// get product ID
				$product = get_product( get_the_ID() );

			   	if ( $product->has_child() ) {
					// Check variations
					$variations = $product->get_children();
					$colorArr = [];
					foreach ( $variations as $variation ) {
				
						if ( has_post_thumbnail( $variation ) ) {
								// Here $vp is variable product
								$vp= new WC_Product_Variation( $variation );
								$color = $vp ->attributes["pa_color_code"] ;
								array_push($colorArr,$color);
								?>
								<div class="wm-banner-product" id="id-<?php echo $color; ?>" style="background: #<?php echo $color; ?>">
									<?php // var_dump($vp);
									$regular_price = $vp ->regular_price;
									$sales_price = $vp ->sale_price;
									?>
									<div class="wm-banner-info">
										<h1 class="wm-bi-title"><?php echo $vp ->description;?></h1>
										<?php
										if($sales_price > 0){
											?>
											<p class="wm-bi-price has-sale">
											INR.
											<span class="reg-price">
												 <?php echo $regular_price ?>
											</span>
											<span class="sales-price">
												<?php echo $sales_price ?>
											</span>
										</p>
										<?php } 
										else{?>
											<p class="wm-bi-price">
											INR.
											<span class="reg-price">
													<?php echo $regular_price ?>
												</span>
											</p>
										
										<?php } ?>
										<button class="wm-btn outlined wm-btn-sm">know more</button>
									</div>
									<img src="<?php echo wp_get_attachment_url($vp ->image_id); ?>" alt=""/>
								</div>
								<?php
						}
					}?>
					<ul class="wm-banner-color-options">
						<?php foreach($colorArr as $col){?>
							<li class="wm-banner-color-option">
								<a style="color:#<?php echo $col?>" onclick="changeSlide(this,'<?php echo $col?>')"></a>
							</li>
						<?php 
						}?>
					</ul>
				<?php 
			}
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    ?>
</div>
	<!-- <section class="wm-bg-accent">
		<div class="wm-site-wrapper">
			<div class="row">
				<h1 class="wm-section-title no-margin col-md-5">
					<php
					while ( have_posts() ) :
						the_post();
						the_title();
					endwhile; // End of the loop.
					>
				</h1>
			</div>
		</div>
	</section> -->
	<?php
	while ( have_posts() ) :
		the_post();?>
		<section class="home-section ">
			<div class=" first-half">
				<div class="title">
					<h1 class="cm-heading noMargin"><?php the_field('top_section_heading'); ?></h1>
				</div>				
			</div>
			<div class="second-half">
				<div class=" content ">
					<p class="wm-text"><?php the_field('top_section_description'); ?></p>
					<div>
						<?php $link = get_field('top_cta');?>
						<a class="wm-link  caps with-arrow" href="<?php echo $link['top_cta_url'] ?>"><?php echo $link['top_cta_text'] ?></a>
					</div>
				</div>
			</div>
		</section>
		<section class="home-section less-spaced is-full-coloured">
			<div class=" first-half">
				<div class="title">
					<h1 class="cm-heading noMargin"><?php the_field('bottom_section_heading'); ?></h1>
				</div>				
			</div>
			<div class="second-half">
				<div class=" content ">
					<p class="wm-text"><?php the_field('bottom_section_description'); ?></p>
					<div>
						<?php $bottomlink = get_field('bottom_cta');?>
						<a class=" wm-link caps with-arrow" href="<?php echo $bottomlink['bottom_cta_url'] ?>"><?php echo $bottomlink['bottom_cta_text'] ?></a>
					</div>
				</div>
			</div>
			<div class="full container">
				<div class="row">

				<?php $bottomProducts =  get_field('bottom_connected_products');

					foreach ($bottomProducts  as $bottomProduct )
					{ $product   = wc_get_product( $bottomProduct->ID );?>			
					<div class="col-md-6 home-product-box">
						<img src="<?php echo wp_get_attachment_url($product->image_id); ?>" alt=""/>
						<a href="product/<?php echo $product->slug ?>" class="wm-link with-arrow caps">Shop Now</a>
					</div>
				<?php	
								}?>

				</div>
			</div>
		</section>
		<section class="home-section less-spaced is-full-coloured">
			<div class=" first-half">
				<div class="title">
					<h1 class="cm-heading noMargin"><?php the_field('bottom_section_heading'); ?></h1>
				</div>				
			</div>
			<div class="second-half">
				<div class=" content ">
					<p class="wm-text"><?php the_field('bottom_section_description'); ?></p>
					<div>
						<?php $bottomlink = get_field('bottom_cta');?>
						<a class=" wm-link caps with-arrow" href="<?php echo $bottomlink['bottom_cta_url'] ?>"><?php echo $bottomlink['bottom_cta_text'] ?></a>
					</div>
				</div>
			</div>
			</div>
		</section>
	<?php endwhile; // end of the loop. ?>
	

	</main><!-- #main -->
</div><!-- #primary -->
<?php

// get_sidebar();
get_footer();
