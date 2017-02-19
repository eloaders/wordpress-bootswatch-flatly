
    <div class="footer-bottom">
        <?php
            global $dm_settings;
            if ($dm_settings['author_credits'] != 0) : ?>
                <div class="container">
                    <p class="pull-left"><a href="<?php global $developer_uri; echo esc_url($developer_uri); ?>">DevDmBootstrap3 <?php _e('created by','devdmbootstrap3') ?> Danny Machal</a></p>
                </div>
        <?php endif; ?>

        <?php get_template_part('template-part', 'footernav'); ?>
    </div>
<!-- end main container -->

<?php wp_footer(); ?>
</body>
</html>
