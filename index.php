<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="container">
  <div class="row">
    <?php if(of_get_option('display_left_sidebar_in_blog') == '1'): ?>
    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>
    <?php endif; ?>
    <div class="col-md-<?php echo $dm_settings['blog_posts_size']; ?>">
        <?php

            //if this was a search we display a page header with the results count. If there were no results we display the search form.
            if (is_search()) :

                 $total_results = $wp_query->found_posts;

                 echo "<div class='alert alert-dismissible alert-info'>";
                 echo "". sprintf( __('<strong>%s Search Results for</strong>"%s"','wordpress_bootstrap_flatly'),  $total_results, get_search_query() ) . "</a>";
                 echo "</div>";
                 if ($total_results == 0) :
                     get_search_form(true);
                 endif;

            endif;

        ?>

            <?php // theloop
                if ( have_posts() ) : while ( have_posts() ) : the_post();

                    // single post
                    if ( is_single() ) : ?>
                    <article class="panel panel-warning">
                        <div class="thumbnail">
                            <img alt="" border="0" src="<?php the_post_thumbnail_url(); ?>" title=""  class="img-responsive center-block">
                        </div>
                        <div class="panel-body">
                            <div class="post">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title() ;?></a></h2>
                                <div class="post-header well well-sm">
                                    <span class="glyphicon glyphicon-user"></span> <?php the_author_posts_link(); ?>
                                    <span class="glyphicon glyphicon-time"></span> <?php the_time('F jS, Y'); ?>
                                    <span class="glyphicon glyphicon-edit"></span> <?php edit_post_link(__('Edit','wordpress_bootstrap_flatly')); ?>
                                    <p class="text-right">
                                    <span class="glyphicon glyphicon-circle-arrow-right"></span> <?php _e('Posted In','wordpress_bootstrap_flatly'); ?>: <?php the_category(', '); ?></p>
                                    <?php if( has_tag() ) : ?>
                                        <p class="text-right"><span class="glyphicon glyphicon-tags"></span>
                                            <?php the_tags(); ?>
                                        </p>
                                    <?php endif; ?>
                                    </span>
                                </div>
                            <div>
                            <?php the_content(); ?>
                        </div>
                        <hr>
                        <?php comments_template(); ?>
                    </article>
                    <?php
                    // list of posts
                    else : ?>
                    <?php
                        if ( has_tag( 'success', $post->ID ) ) {
                            echo "<article class='panel panel-success'>";
                        } else if ( has_tag( 'warning', $post->ID ) ) {
                            echo "<article class='panel panel-warning'>";
                        } else {
                            echo "<article class='panel panel-default'>";
                        }
                    ?>
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="post">
                                <div class="post-header well well-sm">
                                    <span class="glyphicon glyphicon-user"></span> <?php the_author_posts_link(); ?>
                                    <span class="glyphicon glyphicon-time"></span> <?php the_time('F jS, Y'); ?>
                                    <span class="glyphicon glyphicon-edit"></span> <?php edit_post_link(__('Edit','wordpress_bootstrap_flatly')); ?>
                                    <p class="text-right">
                                        <span class="glyphicon glyphicon-circle-arrow-right"></span> <?php _e('Posted In','wordpress_bootstrap_flatly'); ?>: <?php the_category(', '); ?>
                                    </p>
                                    <?php if( has_tag() ) : ?>
                                        <p class="text-right"><span class="glyphicon glyphicon-tags"></span>
                                        <?php the_tags(); ?>
                                        </p>
                                    <?php endif; ?>
                                    </span>
                                </div>
                                <div>
                                    <span class="thumbnail" style="float:left; margin-right: 10px;"><img alt="" border="0" src="<?php the_post_thumbnail_url(); ?>" title=""  class="img-responsive" width="300px" height="200px"></span>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <?php  if ( comments_open() ) : ?>
                        <div class="panel-footer clearfix">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm pull-right" role="button"><?php comments_number(__('Leave a Comment','wordpress_bootstrap_flatly'), __('One Comment','wordpress_bootstrap_flatly'), '%' . __(' Comments','wordpress_bootstrap_flatly') );?><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <?php endif; ?>
                    </article>

                     <?php  endif; ?>

                <?php endwhile; ?>
                <?php if (show_posts_nav()) : ?>
                <ul class="pager">
                    <li class="previous"><?php previous_posts_link('&laquo; Newer Entries'); ?></li>
                    <li class="next"><?php next_posts_link('Older Entries &raquo;'); ?></li>
                </ul>
                <?php endif; ?>
                <?php else: ?>

                    <?php get_404_template(); ?>

            <?php endif; ?>

   </div>   
   <?php if(of_get_option('display_right_sidebar_in_blog') == '1'): ?>
   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>
   <?php endif; ?>
</div>


</div>
<!-- end content container -->

<?php get_footer(); ?>

