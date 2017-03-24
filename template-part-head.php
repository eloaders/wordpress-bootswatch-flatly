<?php global $dm_settings; ?>


<?php if ($dm_settings['show_header'] != 0) : ?>

    <div class="container"  style="padding-top: 60px;">
        <div class="row clearfix">

                <div class="col-lg-8">
                    <div class="page-header">
                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                        <small><?php bloginfo( 'description' ); ?></small></h1>
                    </div>
                </div>
                <div class="col-lg-4">
                    

                </div>

        </div>
    </div>

<?php endif; ?>
