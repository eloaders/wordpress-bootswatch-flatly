<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-2-collapse">
        <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if(of_get_option('display_footer_navbar_brand') == '1'): ?>
      <a class="navbar-brand" href="<?php echo of_get_option('navbar_footer_brand_url'); ?>"><?php echo of_get_option('navbar_footer_brand_text'); ?></a>
      <?php endif; ?>
    </div>
                    <?php
                    wp_nav_menu( array(
                            'theme_location'    => 'footer_menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse navbar-2-collapse',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
  </div>
</nav>
</div>
<?php endif; ?>
