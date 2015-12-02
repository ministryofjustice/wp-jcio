<!-- Main Menu Navigation -->
<div id="mainnav">
  <div id="leftmenu">
    <?php

    if (has_nav_menu('primary_navigation')) {
      wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'container' => false,
        'walker' => new \Roots\Soil\Nav\MainMenuNavWalker()
      ]);
    }

    ?>
  </div><!-- end leftmenu -->
</div><!-- end mainnav -->
