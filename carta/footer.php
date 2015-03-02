			</div><!-- /content -->
			<footer role="contentinfo">
				<div class="container">
					<?php
						if(get_field("footer", "option")) {
							foreach(get_field("footer", "option") as $footer) {
								echo '<div class="column column-1">';
									echo $footer['column1'];
								echo '</div>';
								echo '<div class="column column-2">';
									echo $footer['column2'];
								echo '</div>';
								echo '<div class="column column-3">';
									echo $footer['column3'];
								echo '</div>';
							}
						}
					?>
				</div>
			</footer>
		</div><!-- /page -->
		<!-- wordpress footer -->
		<?php wp_footer(); ?>
		<!-- /wordpress footer -->
		<?php if(!is_page('bil') && !is_page('4')) { ?>

		<script src="<?php echo get_template_directory_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
		<?php } ?>

	</body>
</html>
