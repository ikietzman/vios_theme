<?php
/*
 Template Name: Homepage - China
*/
?>

<?php get_header('cn'); ?>

			<div id="content">
				<div id="homepageSlider">
								<?php if( have_rows('images') ):

									    while ( have_rows('images') ) : the_row();
									        echo '<div><a href="' . get_sub_field('link') . '"><img src="'. get_sub_field('image') . '" /></a></div>';

									    endwhile;

									endif;
								?>
							</div>
				<div id="inner-content" class="">

						<main id="main" class="m-all" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



							<div id="homepageTiles" class="homepage_tiles wrap">
								<a class="homepage_tile" href="<?php the_field('tile_link_1'); ?>">
									<h2><?php the_field('tile_title_1'); ?></h2>
									<p class="tile_city"><?php the_field('tile_subtitle_1'); ?></p>
								</a>
								<a class="homepage_tile" href="<?php the_field('tile_link_2'); ?>">
									<h2><?php the_field('tile_title_2'); ?></h2>
									<p class="tile_city"><?php the_field('tile_subtitle_2'); ?></p>
								</a>
								<a class="homepage_tile" href="<?php the_field('tile_link_3'); ?>">
									<h2><?php the_field('tile_title_3'); ?></h2>
									<p class="tile_city"><?php the_field('tile_subtitle_3'); ?></p>
								</a>
							</div>

							<div id="homepageSection1" class="homepage_section wrap">

								<h2><?php the_field('section_title_1'); ?></h2>
								<p><?php the_field('section_content_1'); ?></p>
								<a href="<?php the_field('section_1_button_link'); ?>" class="blue-btn" />得知更多</a>
							</div>

							<div id="homepageTestimonials" class="homepage_section">
								<div class="">
									<p><span class="testimonial_content">"就我而言，Dr. Beltsos在她所再的領域中是最好的，無人可比。我非常感謝你如此富有同情心，並給予我的妻子尊嚴，隱私和只有父母才能理解的快樂."</span> －S.F.</p>

								</div>

							</div>

							<div id="homepageSection2" class="homepage_section wrap">
								<img class="section_icon" src="<?php the_field('section_icon_2'); ?>" />
								<h2><?php the_field('section_title_2'); ?></h2>
								<p><?php the_field('section_content_2'); ?></p>
								<?php if (get_field('section_2_button_link')) :?>
									<a href="<?php the_field('section_2_button_link'); ?>" class="blue-btn" />Learn more</a>
								<?php endif; ?>
							</div>

							<div id="homepageSection3" class="homepage_section wrap">

								<h2><?php the_field('section_title_3'); ?></h2>
								<p><?php the_field('section_content_3'); ?></p>
								<?php if( have_rows('section_3_icons') ):

									    while ( have_rows('section_3_icons') ) : the_row();
									        echo '<div class="icon"><a href="' . get_sub_field('link') . '" target="_blank"><img src="'. get_sub_field('icon') . '" /></a>';
									        echo '<p><a href="' . get_sub_field('link') . '" target="_blank">'. get_sub_field('caption') .'</a></p></div>';

									    endwhile;

									endif;
								?>

							</div>

							<div id="homepagePosts" class="homepage_section wrap">
								<h2>來自博客</h2>
								<?php $the_query1 = new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page' => 3,
								)); ?>

								<?php if ( $the_query1->have_posts() ) : ?>

									<?php while ( $the_query1->have_posts() ) : $the_query1->the_post(); ?>

									<a href="<?php the_permalink(); ?>" class="thirds" target="_blank">
										<img src="<?php the_post_thumbnail_url('thumbnail'); ?>" />
										<h3><?php the_field('homepage_title'); ?></h3>
										<p><?php echo get_the_excerpt(); ?></p>
										<p class="blue-btn">閱覽更多</p>
									</a>

									<!-- <a href="<?php the_permalink(); ?>" class="thirds">
										<img src="<?php the_post_thumbnail_url('full'); ?>" />
										<h3><?php the_title(); ?></h3>
										<p class="byline">By <?php the_author(); ?> <?php echo get_the_date(); ?></p>
										<p><?php the_excerpt(); ?></p>
										<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/library/images/GrayArrow.png" />
									</a> -->

									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>

								<?php endif; ?>

							</div>


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


<?php get_footer('cn'); ?>
