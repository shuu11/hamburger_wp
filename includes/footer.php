<div class="c-container">
  <div class="p-footer__menu">

  <?php
    $menu_name = 'footermenu';
    $locations = get_nav_menu_locations();

    if( ($locations != false) && isset($locations[$menu_name]) ) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach($menu_items as $item){
          echo '<a href="' . $item->url . '">' . $item->title . '</a>';
        }
    }
    ?>
  </div>

  <small class="p-footer__copy">Copyright: <?php echo get_the_author_meta('display_name',1); ?></small>
</div>