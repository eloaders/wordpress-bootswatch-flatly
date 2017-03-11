<?php
/**
 * Template Name: Youtube I-Nex Template
 *
 * Page template for
 *
 * @package Openstrap
 * @since Openstrap 0.1
 */

get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div class="container">
    <div class="page-header">
        <p class="text-center"><h2><?php the_title() ;?></h2></p>
    </div>
    <div class="timeline">
        <div class="line text-muted"></div>
        <?php dynamic_sidebar( 'Youtube Page' ); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
