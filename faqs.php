<?php
/*
 Template Name: FAQs Page
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
			<div id="content" class="interior_page_content interior_page_content_single">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
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
									?>
								</section>

								<?php
									if( have_rows('faqs') ):
										echo '<div class="accordion">';

									    while ( have_rows('faqs') ) : the_row();
												echo '<div class="question-box">';
									        echo '<p class="question">';
														echo get_sub_field('question');
														echo '<span class="faq-icon" style="background-color:';
														echo the_field('header_color');
														echo '"> +';
														echo '</span>';
													echo '</p>';
													echo '<p class="answer">';
														echo get_sub_field('answer');
													echo '</p>';

												echo '</div>';
									    endwhile;


									endif;
								?>

								<?php the_field('bottom_text_area'); ?>
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

						<div class="interior_sidebar">
							<?php gravity_form(2); ?>
							<?php the_field('sidebar_content'); ?>
						</div>

				</div>

			</div>

			<div id="interior_tiles">
				<a href="<?php the_field('tile_1_link', 'option'); ?>" class="interior_tile">
					 <div class="tile_inner">
					 	<h3><?php the_field('tile_1_text', 'option'); ?></h3>
					 	<p><?php the_field('tile_1_description', 'option'); ?></p>
					 </div>
					 <button class="btn_white">Schedule Now</button>
					 <!-- <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/library/images/GrayArrow.png" /> -->
				</a>
				<?php $the_query = new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page' => 1,
								)); ?>

								<?php if ( $the_query->have_posts() ) : ?>

									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<a href="<?php the_permalink(); ?>" class="interior_tile">
										<div class="tile_inner">
											<h3>From the Blog</h3>
											<p><?php the_field('homepage_title'); ?></p>
											<?php $trimmed = wp_trim_words( get_the_content(), $num_words = 20, $more = null ); ?>
											<!-- <p class="blog-funnel-content"><?php echo $trimmed; ?></p> -->
											<p class="blog-funnel-content"><?php echo get_the_excerpt(); ?></p>
										</div>
										<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/library/images/GrayArrow.png" />
									</a>

									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>

								<?php endif; ?>
				<?php $the_query = new WP_Query(array(
									'post_type' => 'testimonial',
									'posts_per_page' => 1,
								)); ?>

								<?php if ( $the_query->have_posts() ) : ?>

									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<a href="<?php the_permalink(194); ?>" class="interior_tile">
										<div class="tile_inner">
											<h3>Testimonial / <?php the_title(); ?></h3>
											<p>"<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>"</p>
										</div>
										<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/library/images/GrayArrow.png" />
									</a>

									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>

								<?php endif; ?>



			</div>


<?php get_footer(); ?>
