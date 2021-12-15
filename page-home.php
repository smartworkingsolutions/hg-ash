<?php
/**
 * Template Name: Home Page
 * The template for displaying HomePage
 *
 * @package HGAsh
 */

get_header();

/**
 * Banner
 * Process
 * About us
 * Services
 * Why choose us
 * Team
 * Testimonials
 * Blog
 * Get in touch
 * Client
 */
$acfp = new acf_flexible_content_to_partials( get_the_ID(), 'templates' );
$acfp->render();

get_footer();
