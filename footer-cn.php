			<footer class="footer footer-cn" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<div class="footer_top">
						<div class="footer_top_left">
							<div class="footer_top_left__left">
								<h6><?php the_field('china_contact_us_title', 'option'); ?></h6>
								<p><?php the_field('china_contact_us_email', 'option'); ?></p>
								<p><a href="<?php the_field('china_contact_us_wechat_link', 'option'); ?>"><?php the_field('china_contact_us_wechat', 'option'); ?></a></p>
								<p><a href="<?php the_field('china_contact_us_line', 'option'); ?>">Line: <?php the_field('china_contact_us_line_link', 'option'); ?></a></p>
							</div>
							<div class="footer_top_left__right">
								<h6><?php the_field('china_widget_title_1', 'option'); ?></h6>
								<p><?php the_field('china_widget_content_1', 'option'); ?></p>
							</div>
						</div>
						<div class="footer_top_right">
							<h6>跟著我們</h6>
							<?php
								if( have_rows('china_social_media_icons', 'option') ):
									echo '<div class="social_media_menu">';
								    while ( have_rows('china_social_media_icons', 'option') ) : the_row();
								        echo '<a href="' . get_sub_field('link') . '"><img src="'. get_sub_field('icon') . '" /></a>';

								    endwhile;
								    echo '</div>';
								endif;
							?>
						</div>
					</div>

					<div class="footer-left">
						<div class="footer_box" id="footer_box__2">
							<h6><?php the_field('china_widget_title_2', 'option'); ?></h6>
							<p><?php the_field('china_widget_content_2', 'option'); ?></p>
						</div>
						<div class="footer_box" id="footer_box__3">
							<h6><?php the_field('china_widget_title_3', 'option'); ?></h6>
							<p><?php the_field('china_widget_content_3', 'option'); ?></p>
						</div>
						<div class="footer_box" id="footer_box__4">
							<h6><?php the_field('china_widget_title_4', 'option'); ?></h6>
							<p><?php the_field('china_widget_content_4', 'option'); ?></p>
						</div>
						<div class="footer_box" id="footer_box__5">
							<h6><?php the_field('china_widget_title_5', 'option'); ?></h6>
							<p><?php the_field('china_widget_content_5', 'option'); ?></p>
						</div>
					</div>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<!-- Google Code for Remarketing Tag -->

		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 931740869;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/931740869/?guid=ON&amp;script=0"/>
		</div>
		</noscript>

	</body>

</html> <!-- end of site. what a ride! -->
