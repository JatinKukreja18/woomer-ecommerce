<?php
/*
 Template Name: faq template

* This is the template that displays all faqs 
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main ">
	<section class="faq-title wm-bg-accent">
		<div class="wm-site-wrapper">
			<div class="row">
				<h1 class="wm-section-title no-margin col-md-5">
					<?php
					while ( have_posts() ) :
						the_post();
						echo wp_strip_all_tags( get_the_content() );
					endwhile; // End of the loop.
					?>
				</h1>
			</div>
		</div>
	</section>
	
		<?php
		// get all the categories from the database
		$cats = get_terms('type'); 

			// loop through the categries
			foreach ($cats as $cat) {
				// setup the cateogory ID
				$cat_id= $cat->term_id;
				// Make a header for the cateogry?>
				<section class="wm-site-wrapper">
					<div class="row">
						<div class="faq-section-title col-md-3">
							<h1 class="wm-section-title no-margin">	
									<?php echo $cat->name ?>
							</h1>
						</div>
						<div class="faq-section-content col-md-8 offset-1">
							<ul>
								<?php 
								$cpt_query_args = array(
								'post_type' => 'faqs',
								// 'type' => $cat->cat_id,
								'field'=>'slug',
								'type' => $cat->slug,
								'posts_per_page'=>100
								); 
								// create a custom wordpress query
								query_posts($cpt_query_args);
								// start the wordpress loop!
								if (have_posts()) : while (have_posts()) : the_post(); ?>
								
									<li class="wm-accordion">
										<h4 class="wm-accordion-title" onClick="expand(this)">
											<?php the_title(); ?>
											<span class="wm-toggle-icon"></span>
										</h4>
										<div class="wm-accordion-body"><?php echo wp_strip_all_tags( get_the_content() ); ?></div>
									</li>
									<?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
								</ul>
							</div>
						</div>
					</section>
					<?php } // done the foreach statement ?>
				
			

	</main><!-- #main -->
</div><!-- #primary -->
<!-- Scripts -->
<script>
	function expand(el){
		const parent = el.parentElement;
		const sibling = el.nextElementSibling;
		
		parent.classList.toggle('active');
		if(parent.style.height){
			parent.style.height =  null;
		}else{
			parent.style.height = sibling.clientHeight + 70 + 'px';
		}
		

	}
</script>
<?php

// get_sidebar();
get_footer();
