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
					<h2 class="p-mv__ttl">お探しのページが見つかりませんでした。</h2>
				</div>
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
