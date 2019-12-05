<?php get_header(); ?>
<style>
	.entry-content img {
		display:none !important;
	}
</style>

			<div id="interior_header" class="wrap" style="background:url('/vios/wp-content/themes/vios/library/images/dots.png');	background-color:#326cac;">
				<h5 class="page-title">Blog</h5>
				<img src="http://viosfertility.com/wp-content/uploads/2016/12/2_FamilyPlanning_326CAC.png" />
			</div>


			<div id="content" class="interior_page_content main-blog-page">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img style="float:left;margin-right:1em;" src="<?php the_post_thumbnail_url('thumbnail'); ?>" /></a>
									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>


								</header>

								<section class="entry-content cf">

									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="byline byline_desktop entry-meta vcard">
                                                                        <?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>
									<div class="byline byline_mobile  entry-meta vcard">
										<?php printf(
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
                    							); ?>

                    					<?php printf(
                       								/* the author of the post */
                       								'<p><span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">Posted By: ' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span></p>'
                    							); ?>
                    					<?php printf( '<p class="footer-category">' . __('', 'bonestheme' ) . '%1$s</p>' , get_the_category_list(', ') ); ?>


									</div>



                 	<?php printf( '<p class="footer-category footer-category_desktop">' . __('Categories', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
