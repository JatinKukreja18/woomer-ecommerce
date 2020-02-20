<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woomer_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="wm-footer-top ">
			<div class="row full">
			<div class="write-to-us col-md-6">
				<span>Have questions about Woomer?</span>
				<button class="wm-btn wm-btn-fit wm-btn-inverse btn-primary modal-link" data-target="#write-to-us-modal" id="write-to-us-cta">Write to us</span>
			</div>
				<div id="footer-sidebar1 " class="wm-footer-widgets col-md-2 ">
					<?php
					if (is_active_sidebar('footer-sidebar-1')) {
						dynamic_sidebar('footer-sidebar-1');
					}
					?>
				</div>
				<div id="footer-sidebar2" class="wm-footer-widgets col-md-2 ">
					<?php
					if (is_active_sidebar('footer-sidebar-2')) {
						dynamic_sidebar('footer-sidebar-2');
					}
					?>
				</div>
				<div id="footer-sidebar3" class="wm-footer-widgets col-md-2 ">
					<?php
					if (is_active_sidebar('footer-sidebar-3')) {
						dynamic_sidebar('footer-sidebar-3');
					}
				?>
				</div>
				</div>
		</div>
		<div class="wm-footer-bottom">
			<span class="site-ifo"> © Woomer EnterPrise <?php echo date("Y");?></span>
			<?php
				wp_nav_menu( array( 'menu' => 'social-menu' ) );
				?>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->



<div class="wm-modal" id="write-to-us-modal">
	<div class="wm-modal-backdrop modal-close"></div>
	<div class="wm-width-wrapper wts-wrapper">
		<div class="row">
			<div class="modal-body wts-modal-body col-md-10 offset-1 ">
				<div class="wm-modal-section left">
					<h1 class="title">We love to hear from you!</h1>
					<p class="description">Feel free to write to us on <a>connect@woomer.in</a> for any query or suggestion.</p>
				</div>
				<div class="wm-modal-section right">
					<div class="form">
						<?php echo do_shortcode( '[contact-form-7 id="105" title="Write to Us form"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script>
	// below function replaces the icon from fontawesome in social menu
	(function(){
		socailEl = document.querySelectorAll("#menu-social-menu > li");
		socailEl.forEach(el => {
			let icon = document.createElement("span");
				icon.className = el.firstChild.innerText;
				el.appendChild(icon);
				el.firstChild.style.display = 'none';
		});
	}())
	// below function is generic for toggling modal

		const allModalLinks = document.querySelectorAll(".modal-link");

		for (let i = 0; i < allModalLinks.length; i++) {
			console.log('here');
			
			allModalLinks[i].addEventListener("click", function(){
				document.querySelector(this.dataset.target).classList.add('collapsing')
				setTimeout(() => {
					document.querySelector(this.dataset.target).classList.remove('collapsing')
					document.querySelector(this.dataset.target).classList.add('in')				
				}, 0);
			});;
		}
		// document.querySelector(".modal-link").addEventListener("click", function(){
		// 	document.querySelector(this.dataset.target).classList.add('collapsing')
		// 	setTimeout(() => {
		// 		document.querySelector(this.dataset.target).classList.remove('collapsing')
		// 		document.querySelector(this.dataset.target).classList.add('in')				
		// 	}, 0);
		// });
		document.querySelector('.modal-close').addEventListener("click", function(){
			this.parentElement.classList.add('collapsing')
			this.parentElement.classList.remove('in')
			setTimeout(() => {
				this.parentElement.classList.remove('collapsing')			
			}, 300);
		});
		document.addEventListener('keyup', function(event){
			if (event.keyCode == 27 && document.querySelector('.wm-modal')){
				if(document.querySelector('.wm-modal').classList.contains('in')){
					document.querySelector('.wm-modal').classList.remove('in');
				}
			}
		})
</script>
<?php wp_footer();?>

</body>
</html>
