<?php
/*
 Template Name: Static Page Template

* This is the template that displays all faqs 
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main ">
	<section class="wm-bg-accent">
		<div class="wm-site-wrapper">
			<div class="row">
				<h1 class="wm-section-title no-margin col-md-5">
					<?php
					while ( have_posts() ) :
						the_post();
						the_title();
					endwhile; // End of the loop.
					?>
				</h1>
			</div>
		</div>
	</section>
	<section class="wm-site-wrapper top-40">
			<div class="row">
				<h1 class="wm-body-text-blue no-margin col-md-7">
					<?php
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile; // End of the loop.
					?>
				</h1>
			</div>
	</section>
	
		

	</main><!-- #main -->
</div><!-- #primary -->
<?php

// get_sidebar();
get_footer();
