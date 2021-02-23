<aside class="p-sidebar">
  <h2 class="p-sidebar__ttl"><a href="#">Menu</a></h2>
  <div class="p-sidebar__btn c-side-btn">
    <span></span>
    <span></span>
  </div>

  <nav class="p-sidebar__menu">

    <?php
    $menu_name = 'categorymenu';
    $locations = get_nav_menu_locations();

    if( ($locations != false) && isset($locations[$menu_name]) ) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $cnt = 0;
        $ul = true;

        foreach($menu_items as $item){
          if(!$item->menu_item_parent){
            $parent_id = $item->ID;
            echo '<h3 class="p-sidebar__menu--ttl"><a href="' . $item->url . '">' . $item->title . '</a></h3>';
          }

          if($parent_id == $item->menu_item_parent){
            if($ul == true){
              $ul = false;
              echo '<ul class="p-sidebar__menu--item">';
            }

            echo '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';

            if(($menu_items[$cnt + 1]->menu_item_parent != $parent_id)
            && ($ul == false)){
              echo '</ul>';
              $ul = true;
            }
          }

          $cnt++;
        }
    }
    ?>
  </nav>
</aside>