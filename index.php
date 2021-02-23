<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<!-- head start -->
	<head>
		<?php get_header(); ?>
	</head>
	<!-- head end -->

	<!-- body start -->
	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<div id="js-contents" class="l-contents c-container">
			<div class="l-contents__main">
				<header class="p-header">
					<?php get_template_part('./includes/header'); ?>
				</header>


				<div class="p-mv">
					<h2 class="p-mv__ttl">ダミーサイト</h2>
				</div>

				<article class="p-main">
					<div class="p-main__inner">
						<div class="p-sec">
							<section class="p-sec01">
								<h2 class="c-ttl_under"><a href="<?php echo get_permalink(); ?>">Take Out</a></h2>

								<div class="p-sec01__wrapper">
									<div class="p-sec01__contents">
										<h3>小見出しが入ります</h3>

										<p>
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>

									<div class="p-sec01__contents">
										<h3>小見出しが入ります</h3>

										<p>
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</div>
							</section>
							<section class="p-sec02">
								<h2 class="c-ttl_under"><a href="<?php echo get_permalink(); ?>">Eat In</a></h2>

								<div class="p-sec02__wrapper">
									<div class="p-sec02__contents">
										<h3>小見出しが入ります</h3>

										<p>
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>

									<div class="p-sec02__contents">
										<h3>小見出しが入ります</h3>

										<p>
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</div>
							</section>
						</div>
					</div>

					<section class="p-map-sec">
						<iframe
							class="p-map-sec__map"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1620.8830772761723!2d139.74424435626514!3d35.65813265390666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1613140415190!5m2!1sja!2sjp"
							frameborder="0"
							style="border: 0"
							allowfullscreen=""
							aria-hidden="false"
							tabindex="0"
						></iframe>

						<div class="p-map-sec__contents">
							<h2>見出しが入ります</h2>

							<p>
								テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
							</p>
						</div>
					</section>
				</article>
			</div>

			<div id="js-sidebar" class="l-contents__sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>

		<footer class="p-footer">
			<?php get_template_part('includes/footer'); ?>
		</footer>

		<div id="js-mask" class="c-mask"></div>

		<?php get_footer(); ?>
	</body>
	<!-- body end -->

</html>

<!-- /************************************************************************/ -->
<!-- /*  END OF FILE                                       									 */ -->
<!-- /************************************************************************/ -->
