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
						<span><?php echo '“'.$_GET['s'] .'”' ?></span>
					</h1>
				</div>

				<article class="p-main">
					<div class="p-main__inner">
						<?php
						if(have_posts()):
							while( have_posts() ): the_post();
						?>
								<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<figure class="p-card-sec">
										<img class="p-card-sec__img" src="<?php echo my_get_thumbnail(true); ?>" width="677px" height="471px" alt="card" />
										<figcaption class="p-card-sec__figcaption">
											<span><?php the_title(); ?></span>

											<?php the_excerpt('詳しく見る'); ?>
											<a class="c-card-btn" href="<?php the_permalink(); ?>">詳しく見る</a>
										</figcaption>
									</figure>
								</section>
						<?php
							endwhile;
						else :
						?>
							<p><?php echo '"' . $_GET['s'] . '"' ?>に一致する情報は見つかりませんでした。</p>
						<?php
						endif;
						?>
					</div>

					<?php my_pagenation(3); ?>

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
