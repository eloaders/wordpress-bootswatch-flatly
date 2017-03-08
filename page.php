<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="container">
    <div class="row">
        <?php get_sidebar( 'left' ); ?>
            <div class="col-lg-<?php wordpress_bootstrap_flatly_main_content_width(); ?>">
                <?php // theloop
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="well well-sm">
                    <h3 class="page-header"><?php the_title() ;?></h3>
                </div>
                
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php comments_template(); ?>

                <?php endwhile; ?>
                <?php else: ?>
                    <?php get_404_template(); ?>
                <?php endif; ?>
            </div>
        <?php get_sidebar( 'right' ); ?>
    </div>
</div>
<!-- end content container -->


<?php get_footer(); ?>
