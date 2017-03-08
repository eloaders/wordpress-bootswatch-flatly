<?php
/**
 * Template Name: Install I-Nex Template
 *
 * Page template for
 *
 * @package Openstrap
 * @since Openstrap 0.1
 */

get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>


	<!-- Main Content -->	

	<!-- End Main Content -->	

<div class="container">

    <!-- Page header -->
    <div class="page-header">
        <p class="text-center"><h2>Install I-Nex in your favorite linux distribution</h2></p>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
    <div class="timeline">
    
        <!-- Line component -->
        <div class="line text-muted"></div>
        <?php dynamic_sidebar( 'Install Page' ); ?>
    </div>
    <!-- /Timeline -->
<?php comments_template(); ?>
</div>
</div>
<?php get_footer(); ?>

