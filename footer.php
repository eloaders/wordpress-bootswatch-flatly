
    <div class="footer-bottom">
        <?php
            global $dm_settings;
            if ($dm_settings['author_credits'] != 0) : ?>
                <div class="container">
                    <p class="pull-left"><a href="<?php global $developer_uri; echo esc_url($developer_uri); ?>">wordpress_bootstrap_flatly <?php _e('created by','wordpress_bootstrap_flatly') ?> Danny Machal</a></p>
                </div>
        <?php endif; ?>

        <?php get_template_part('template-part', 'footernav'); ?>
    </div>
<!-- end main container -->

<?php wp_footer(); ?>
</body>
</html>
