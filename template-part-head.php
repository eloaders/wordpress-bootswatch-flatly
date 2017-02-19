<?php global $dm_settings; ?>


<?php if ($dm_settings['show_header'] != 0) : ?>

    <div class="container"  style="padding-top: 60px;">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a><small><?php bloginfo( 'description' ); ?></small></h1>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
