<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<!-- head start -->
	<head>
		<?php get_header(); ?>
	</head>
	<!-- head end -->

	<!-- body start -->
	<body class="single" <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<div id="js-contents" class="l-contents c-container">
			<div class="l-contents__main">
			<?php
			if(have_posts()):
				while( have_posts() ): the_post();
			?>
				<header class="p-header">
					<?php get_template_part('./includes/header'); ?>
				</header>

				<div class="p-mv" style="background-image:url('<?php echo my_get_thumbnail(false); ?>');">
					<div class="c-mask__mv"></div>
					<h1 class="p-mv__ttl"><?php the_title(); ?></h1>
				</div>

				<article class="p-main">
					<div class="p-main__inner">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
					endwhile;
				else :
				?>
					<p>表示する記事がありません</p>
				<?php
				endif;
				?>
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
