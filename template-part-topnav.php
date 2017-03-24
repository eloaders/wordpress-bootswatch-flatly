
<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if(of_get_option('display_navbar_brand') == '1'): ?>
                        <a class="navbar-brand" href="<?php echo of_get_option('navbar_brand_url'); ?>"><?php echo of_get_option('navbar_brand_text'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar-collapse-1" aria-expanded="false" style="height: 1px;">
                    <?php
                        wp_nav_menu( array(
                        'theme_location'    => 'main_menu',
                        'depth'             => 2,
                        'container'         => 'false',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                    <?php dynamic_sidebar( 'Navbar Search' ); ?>
                    <ul class="nav navbar-nav navbar-right">
                    <?php dynamic_sidebar( 'Top Navbar Social Icons' ); ?>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<?php endif; ?>
