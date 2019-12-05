<?php
/*
 Template Name: Contact page
*/
?>

<?php get_header(); ?>
			
			<style>
				h1, h2 {
					color: <?php the_field('header_color'); ?>;
				}
			</style>
			
			<?php if(has_post_thumbnail()) : ?>
			<div id="interior_banner" style="background:url(<?php the_post_thumbnail_url('full'); ?>)" />
			</div>
			<?php endif; ?>

			<div id="interior_header" class="wrap" style="background:url('/vios/wp-content/themes/vios/library/images/dots.png');	background-color:<?php the_field('header_color'); ?>;">
				<h5 class="page-title"><?php the_title(); ?></h5>
				<img src="<?php the_field('header_icon'); ?>" />
			</div>

			<div id="content" class="contact_content interior_page_content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title">&#160; </h1>


								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										echo '<div style="margin-bottom:3em;">';
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
										echo '</div>';
									?>

									<?php if( have_rows('locations') ):
											$anchorNumber = 1;
										
										    while ( have_rows('locations') ) : the_row();
										    	echo '<a name="a'. $anchorNumber .'"></a>';
										    	$anchorNumber++;
										        echo '<div class="contact_card">';
										        	echo '<div class="contact_card__left">';
										        		echo '<div class="contact_card__address">';
										        			if (get_sub_field('name')) {
										        				echo '<h3>'. get_sub_field('name') .'</h3>';
										        			}
										        			if (get_sub_field('address')) {
										        				echo '<p>'. get_sub_field('address') .'</p>';
										        			}
										        			if (get_sub_field('phone')) {
										        				echo '<p>T: '. get_sub_field('phone') .'</p>';
										        			}
										        			if (get_sub_field('fax')) {
										        				echo '<p>F: '. get_sub_field('fax') .'</p>';
										        			}
										        			
										        		echo '</div>';
										        		echo '<div class="contact_card__hours">';
										        			if (get_sub_field('hours_alternate_message')) {
										        				echo '<p>'.get_sub_field('hours_alternate_message').'</p>';
										        			}
										        			else {
											        			echo '<p>'. 'Hours' .'</p>';
											        			if (get_sub_field('monday_hours')) {echo '<p>M: '. get_sub_field('monday_hours') .'</p>';}
											        			if (get_sub_field('tuesday_hours')) {echo '<p>Tu: '. get_sub_field('tuesday_hours') .'</p>';}
											        			if (get_sub_field('wednesday_hours')) {echo '<p>W: '. get_sub_field('wednesday_hours') .'</p>';}
											        			if (get_sub_field('thursday_hours')) {echo '<p>Th: '. get_sub_field('thursday_hours') .'</p>';}
											        			if (get_sub_field('friday_hours')) {echo '<p>F: '. get_sub_field('friday_hours') .'</p>';}
											        		}
										        		echo '</div>';
										        		echo '<p class="appointment-btn"><a href="'. get_sub_field('button_link').'" class="blue-btn">Schedule an Appointment</a></p>';

										        	echo '</div>';
										        	echo '<div class="contact_card__right">';
										        		echo '<div class="headshot">';
										        		if (have_rows('doctors')):
										        			$count = 0;
										        			while( have_rows('doctors') ): the_row();
										        				$count++;
										        				//echo 'count' . $count;
												        		
												        	endwhile;
										        		endif;

										        		if (have_rows('doctors')):
										        			while( have_rows('doctors') ): the_row();

												        		echo '<div class="doctor-single one_of_'. $count .'"><h3>'. get_sub_field('doctor_name') .'</h3>';
												        		echo '<a href="'. get_sub_field('doctor_bio_link') .'"><img src='. get_sub_field('doctor_headshot') .' /></a></div>';
												        	endwhile;
										        		endif;
										        		echo '</div>';
										        	
										        	echo '<div class="map"><iframe
															width="250"
															height="250"
															frameborder="0" style="border:0"
															src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBI0FIxcWZtUH5xRzPNO0Xu9Odgcz5Ihe0
															  &q='. str_replace('<br>', ' ', get_sub_field("address")).'" allowfullscreen>
														</iframe></div>';
													echo '</div>';
										        echo '</div>';
										        
										    endwhile;
										    
										endif;
									?>	
									
								</section>



								<?php comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>


				</div>

			</div>


<?php get_footer(); ?>
