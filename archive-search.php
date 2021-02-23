<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<!-- head start -->
	<head>
		<?php get_header(); ?>
	</head>
	<!-- head end -->

	<!-- body start -->
	<body class="archive-search" <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<div id="js-contents" class="l-contents c-container">
			<div class="l-contents__main">
				<header class="p-header">
					<?php get_template_part('./includes/header'); ?>
				</header>

				<div class="p-mv">
					<div class="c-mask__mv"></div>
					<h1 class="p-mv__ttl">
						Search:<br />
						<span>チーズバーガー</span>
					</h1>
				</div>

				<article class="p-main">
					<div class="p-main__inner">
						<div class="p-main__top">
							<h2>小見出しが入ります</h2>
							<p>
								テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
							</p>
						</div>

						<section>
							<figure class="p-card-sec">
								<img class="p-card-sec__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/image/card_archive@2x.jpg" alt="card" />
								<figcaption class="p-card-sec__figcaption">
									<h2>チーズバーガー</h2>
									<h3>小見出しが入ります</h3>
									<p>
										テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
									</p>
									<a class="c-card-btn" href="#">詳しく見る</a>
								</figcaption>
							</figure>

							<figure class="p-card-sec">
								<img class="p-card-sec__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/image/card_archive@2x.jpg" alt="card" />
								<figcaption class="p-card-sec__figcaption">
									<h2>ダブルチーズバーガー</h2>
									<h3>小見出しが入ります</h3>
									<p>
										テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
									</p>
									<a class="c-card-btn" href="#">詳しく見る</a>
								</figcaption>
							</figure>

							<figure class="p-card-sec">
								<img class="p-card-sec__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/image/card_archive@2x.jpg" alt="card" />
								<figcaption class="p-card-sec__figcaption">
									<h2>スペシャルチーズバーガー</h2>
									<h3>小見出しが入ります</h3>
									<p>
										テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
									</p>
									<a class="c-card-btn" href="#">詳しく見る</a>
								</figcaption>
							</figure>

							<figure class="p-card-sec">
								<img class="p-card-sec__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/image/card_archive@2x.jpg" alt="card" />
								<figcaption class="p-card-sec__figcaption">
									<h2>ダブルチーズバーガー</h2>
									<h3>小見出しが入ります</h3>
									<p>
										テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
									</p>
									<a class="c-card-btn" href="#">詳しく見る</a>
								</figcaption>
							</figure>

							<figure class="p-card-sec">
								<img class="p-card-sec__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/image/card_archive@2x.jpg" alt="card" />
								<figcaption class="p-card-sec__figcaption">
									<h2>ダブルチーズバーガー</h2>
									<h3>小見出しが入ります</h3>
									<p>
										テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
									</p>
									<a class="c-card-btn" href="#">詳しく見る</a>
								</figcaption>
							</figure>
						</section>
					</div>

					<div class="p-pagenation">
						<span class="p-pagenation__num">page 1/10</span>
						<span class="p-pagenation__pre"
							><a href="#">&#8810;<span>前へ</span></a></span
						>
						<ul class="p-pagenation__list">
							<li><a class="c-current" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li><a href="#">9</a></li>
						</ul>
						<span class="p-pagenation__next"
							><a href="#"><span>次へ</span>&#8811;</a></span
						>
					</div>
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
