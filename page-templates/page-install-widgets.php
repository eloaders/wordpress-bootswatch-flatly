<?php
/**
 * Template Name: Widgets Install I-Nex Template
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
    <?php dynamic_sidebar( 'I-Nex Install Page' ); ?>
</div>
<?php get_footer(); ?>

