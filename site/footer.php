<?php global $theme_options; ?>

<?php if($theme_options['footer-enabled']) : ?>
<div class="clearfix"></div>
<footer>
	<div class="container">
		<div class="row">

			<?php
				switch ($theme_options['footer-layout']){
					case '2':
				?>

						<div class="col-xs-12 col-sm-6 col-md-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-1'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-2'); ?>
						<?php } ?>
						</div>
				<?php
					break;
				
					case '3':
				?>

						<div class="col-xs-12 col-sm-4 col-md-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-1'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-4 col-md-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-2'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-4 col-md-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-3'); ?>
						<?php } ?>
						</div>
				<?php
					break;

					case '4':
				?>

						<div class="col-xs-12 col-sm-3 col-md-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-1'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-2'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-3'); ?>
						<?php } ?>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-area-4'); ?>
						<?php } ?>
						</div>
				<?php
					break;
				}
			?>
		</div>
	</div>
</footer>
<?php endif; ?>


<?php if($theme_options['copyright-enabled']) : ?>
<div class="clearfix"></div>
<div id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div id="credits">
				<?php echo $theme_options['copyright-text']; ?>
				</div>
			</div>
			<div class="col-md-8">
				
				<nav id="menu-footer">
					<ul>
						<?php 
						if(has_nav_menu('footer_menu')) {
						wp_nav_menu( array('theme_location' => 'footer_menu', 'menu' => 'Footer Menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
						}
						else {
						echo '<li><a href="#">No menu assigned!</a></li>';
						}
						?>	
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

</div>

<?php if($theme_options['back-top']){ ?>
<a href="#" id="md-back-top"><i class="icon-angle-up"></i></a>
<?php } ?>



<?php
	if(isset($theme_options['tracking-code'])){
		echo $theme_options['tracking-code'];
	}
?>

<?php wp_footer(); ?>
</body>
</html>