<div class="p-header__inner">
  <?php if(is_front_page()): ?>
    <h1 class="p-header__inner--ttl"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
  <?php else: ?>
    <h2 class="p-header__inner--ttl"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h2>
  <?php endif; ?>

  <form id="searchform" class="p-search" method="get" action="<?php echo home_url('/'); ?>">
    <?php get_search_form(); ?>
  </form>
</div>

<button id="js-header__btn" class="p-header__btn"><a href="#">Menu</a></button>