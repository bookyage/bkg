<?php $shortname = "slidemag"; ?>
<?php //if (!is_home() && !is_front_page() && !is_archive()) { ?>
<div class="footer_top_cont">
	<div class="container">
		<div class="home_bottom_box_cont">
			<div class="footer_box_col">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col 1') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_box_col -->
			<div class="footer_box_col">
				
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col 2') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_box_col -->
			<div class="footer_box_col">
				
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col 3') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_box_col -->
			<div class="footer_box_col footer_box_col_last">
				
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col 4') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_box_col -->
			<div class="clear"></div>
		</div> <!-- //home_bottom_box_cont -->
	</div> <!-- //container -->
</div> <!-- //footer_top_cont -->
<div class="footer_copyright_cont">
<div class="footer_copyright">
	<div class="container">
		<!-- DELETE THIS -->
					
		<footer>
	 © 2016 All Rights Reserved. Developed by <a href="https://dessign.net">Dessign</a> 
	
	
	</footer>
		<div class="clear"></div>
	</div><!--//container-->
</div><!--//footer_copyright-->
</div><!--//footer_copyright_cont-->
<?php //} ?>
<?php wp_footer(); ?>
</body>
</html>